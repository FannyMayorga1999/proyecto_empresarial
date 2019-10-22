<!DOCTYPE HTML>
<html lang="es">

<head>
    <title>Blog Post</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>

    <script src="./core.js"></script>
    <script src="./charts.js"></script>
    <script src="./themes/animated.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/jspdf@1.5.3/dist/jspdf.min.js"></script>
    <script src="html2canvas.min.js"></script>
    <script type="text/javascript" src="graficos.js"></script>

    <script src="./examples/javascript/amcharts3/index.js"></script>
    <script src="./examples/javascript/column-chart-with-axis-break/index.js"></script>
    <script src="./examples/javascript/cylinder-chart/index.js"></script>
    <script src="./examples/javascript/donut-chart/index.js"></script>
    <script src="./examples/javascript/semi-circle-donut-chart/index.js"></script>
    <script src="./examples/javascript/simple-3D-pie-chart/index.js"></script>
    <script src="./examples/javascript/simple-bar-chart/index.js"></script>
    <script src="./examples/javascript/simple-pie-chart/index.js"></script>
    <script src="./examples/javascript/stacked-3D-column-chart/index.js"></script>
    <script src="./examples/javascript/column-chart-with-images-as-bullets/index.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $.modal({
                modal: {
                    size: 'modal-dialog modal-xl',
                    title: 'Reporte de llamadas entrantes',
                    class: 'text-danger',
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.amcharts3({

                //ponemos los valores que vamos a evaluar en los jquery 
                am4charts: {
                    // lee la data que se va disponer en la libreria de los graficos
                    data: <?php
                            include('./examples/conexion_postgres/consulta01.php');
                            $fecha_incial = $_GET["fecha1"];
                            $fecha_final = $_GET["fecha2"];
                            $consulta = "select tel_registry_incoming_calls.group, count(*) from tel_registry_incoming_calls('$fecha_incial', '$fecha_final', '', '', '','' , '',0 ) where disposition= 'ANSWERED' group by tel_registry_incoming_calls.group";
                            consulta($consulta); ?>,
                    // ponen un limite en el grafico                       
                    value_max: 300,
                    //evalua la categoria en el grafico 
                    category: 'group',
                    //evalua los valores para la representacion 
                    value: 'count',
                    // se realiza un titulo en los graficos 
                    title: 'grupos por llamadas entrantes',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    // se realiza la posicion del grafico
                    position: 'div0'
                }
            });
            $.simple_pie_chart({
                am4charts: {
                    data: <?php
                            file_get_contents('./examples/conexion_postgres/consulta01.php');
                            $fecha_incial = $_GET["fecha1"];
                            $fecha_final = $_GET["fecha2"];
                            $consulta = "select tel_registry_incoming_calls.group, count(*) from tel_registry_incoming_calls('$fecha_incial', '$fecha_final', '', '', '','' , '',0 ) where disposition= 'ANSWERED' group by tel_registry_incoming_calls.group";
                            consulta($consulta); ?>,
                    value_max: 300,
                    category: 'group',
                    value: 'count',
                    title: 'grupos por llamadas entrantes',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    position: 'div1'
                }
            });
            $.stacked_3D_column_chart({
                am4charts: {
                    data: <?php
                            file_get_contents('./examples/conexion_postgres/consulta01.php');
                            $fecha_incial = $_GET["fecha1"];
                            $fecha_final = $_GET["fecha2"];
                            $limite = $_GET["limite"];
                            $consulta = "select accountname, answered, (avgcalltime::TIME-avganswertime::TIME) as tiempotimbrado ,avgcalltime,avganswertime as tiempohablado  from coc_queue_report_agent_general('$fecha_incial', ' $fecha_final',0,0) order by avgcalltime desc ";
                            consulta($consulta); ?>,
                    value_max: 300,
                    category: 'accountname',
                    value1: 'tiempotimbrado',
                    value2: 'avgcalltime',
                    value3: '',
                    value4: '',
                    title: 'agentes por llamadas entrantes ',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    position: 'div2'
                }
            })
        });
    </script>
</head>

<body>
    <center>
        <div class="content">
            <nav class="navbar navbar-light d-flex justify-content-center" style=" background-color:#4872b7; weigth:200;height: 70px; text-align: center; border-radius: 10px;">
                <h2 style="color:#FFFFFF; padding-top: 13px;">RESUMEN DE COLAS</h2>
            </nav>
            </br>
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: rgb(204, 204, 204); height: 50px; text-align: center; border-radius: 10px;">
                <form class="form-inline my-2 my-lg-0" action="modal_graficos.php" method="get">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Fecha Inicial</label>
                        <input class="custom-select" style="width:200px" type="date" name="fecha1" value="fecha_inicial" id="fecha_inicial">
                        <label class="input-group-text" for="inputGroupSelect01">Fecha Final</label>
                        <input class="custom-select" style="width:200px" type="date" name="fecha2" value="fecha_final" id="fecha_final">
                        <input class="btn btn-success" type="submit" value="consultar">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                            graficos
                        </button>
                    </div>
                </form>
            </nav>
            </br>
        </div>
        </br>
        <div class="d-flex justify-content-center">
            <iframe frameborder="0" name="principal" width="100%" height="500" src="./tabla/index.php?fecha1=<?php print $_GET["fecha1"] ?>&fecha2=<?php print $_GET["fecha2"] ?>"></iframe>
        </div>
    </center>
</body>

</html>