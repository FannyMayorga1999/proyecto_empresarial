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

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            background-color: #ffffff;
            overflow: hidden;
            max-width: 500px;
            margin: auto;
        }

        #center {
            position: absolute;
            height: 50px;
            width: 50px;
            background: red;
            top: calc(50% - 50px/2);
            /* height divided by 2*/
            left: calc(50% - 50px/2);
            /* width divided by 2*/
            width: 100%;
            max-height: 600px;
            height: 100vh;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $.modal({

                modal: {

                    size: 'modal-dialog modal-xl',
                    title: 'reporte de llamadas entrantes',
                    class: 'text-danger',

                }

            });
            $('#modal').modal('toggle');
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            //ponemos los valores que vamos a evaluar en los jquery 
            $.amcharts3({
                am4charts: {
                    // lee la data que se va disponer en la libreria de los graficos 
                    data: <?php
                            include('./examples/conexion_postgres/consulta01.php');
                            //$fecha1 = $_GET["fecha1"];
                            //$fecha2 =  $_GET["fecha2"];
                            $fecha1 = '01-02-2018';
                            $fecha2 = '01-02-2019';
                            $consulta = "select tel_registry_incoming_calls.group, count(*) from tel_registry_incoming_calls('$fecha1', '$fecha2', '', '', '','' , '',0 ) where disposition= 'ANSWERED' group by tel_registry_incoming_calls.group";
                            consulta($consulta); ?>,
                    // ponen un limite en el grafico   
                    value_max: 300,
                    //evalua la categoria en el grafico 
                    category: 'group',
                    //evalua los valores para la representacion 
                    value: 'count',
                    // se realiza un titulo en los graficos 
                    title: 'Agentes por llamadas entrantes ',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    // se realiza la posicion del grafico 
                    position: 'div0'
                }
            });
            $.column_chart_with_axis_break({
                am4charts: {
                    data: <?php
                            file_get_contents('./examples/conexion_postgres/consulta01.php');
                            //$fecha1 = $_GET["fecha1"];
                            //$fecha2 =  $_GET["fecha2"];
                            $fecha1 = '01-02-2018';
                            $fecha2 = '01-02-2019';
                            $consulta = "select tel_registry_incoming_calls.group, count(*) from tel_registry_incoming_calls('$fecha1', '$fecha2', '', '', '','' , '',0 ) where disposition= 'ANSWERED' group by tel_registry_incoming_calls.group";
                            consulta($consulta); ?>,
                    value_max: 300,
                    axis_min: 50,
                    axis_max: 100,
                    category: 'group',
                    value: 'count',
                    title: 'Agentes por llamadas entrantes ',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    position: 'div1'

                }
            });
            $.cylinder_chart({
                am4charts: {
                    data: <?php
                            file_get_contents('./examples/conexion_postgres/consulta01.php');
                            //$fecha1 = $_GET["fecha1"];
                            //$fecha2 =  $_GET["fecha2"];
                            $fecha1 = '01-02-2018';
                            $fecha2 = '01-02-2019';
                            $consulta = "select tel_registry_incoming_calls.group, count(*) from tel_registry_incoming_calls('$fecha1', '$fecha2', '', '', '','' , '',0 ) where disposition= 'ANSWERED' group by tel_registry_incoming_calls.group";
                            consulta($consulta); ?>,
                    value_max: 300,
                    category: 'group',
                    value: 'count',
                    title: 'Agentes por llamadas entrantes ',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    position: 'div2'

                }
            });
            $.donut_chart({
                am4charts: {
                    data: <?php
                            file_get_contents('./examples/conexion_postgres/consulta01.php');
                            //$fecha1 = $_GET["fecha1"];
                            //$fecha2 =  $_GET["fecha2"];
                            $fecha1 = '01-02-2018';
                            $fecha2 = '01-02-2019';
                            $consulta = "select tel_registry_incoming_calls.group, count(*) from tel_registry_incoming_calls('$fecha1', '$fecha2', '', '', '','' , '',0 ) where disposition= 'ANSWERED' group by tel_registry_incoming_calls.group";
                            consulta($consulta); ?>,
                    value_max: 300,
                    category: 'group',
                    value: 'count',
                    title: 'Agentes por llamadas entrantes ',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    position: 'div3'
                }
            });
            $.semi_circle_donut_chart({
                am4charts: {
                    data: <?php
                            file_get_contents('./examples/conexion_postgres/consulta01.php');
                            //$fecha1 = $_GET["fecha1"];
                            //$fecha2 =  $_GET["fecha2"];
                            $fecha1 = '01-02-2018';
                            $fecha2 = '01-02-2019';
                            $consulta = "select tel_registry_incoming_calls.group, count(*) from tel_registry_incoming_calls('$fecha1', '$fecha2', '', '', '','' , '',0 ) where disposition= 'ANSWERED' group by tel_registry_incoming_calls.group";
                            consulta($consulta); ?>,
                    value_max: 300,
                    category: 'group',
                    value: 'count',
                    title: 'Agentes por llamadas entrantes ',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    position: 'div4'

                }
            });
            $.simple_3D_pie_chart({
                am4charts: {
                    data: <?php
                            file_get_contents('./examples/conexion_postgres/consulta01.php');
                            //$fecha1 = $_GET["fecha1"];
                            //$fecha2 =  $_GET["fecha2"];
                            $fecha1 = '01-02-2018';
                            $fecha2 = '01-02-2019';
                            $consulta = "select tel_registry_incoming_calls.group, count(*) from tel_registry_incoming_calls('$fecha1', '$fecha2', '', '', '','' , '',0 ) where disposition= 'ANSWERED' group by tel_registry_incoming_calls.group";
                            consulta($consulta); ?>,
                    value_max: 300,
                    category: 'group',
                    value: 'count',
                    title: 'Agentes por llamadas entrantes ',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    position: 'div5'

                }
            });
            $.simple_bar_chart({
                am4charts: {
                    data: <?php
                            file_get_contents('./examples/conexion_postgres/consulta01.php');
                            //$fecha1 = $_GET["fecha1"];
                            //$fecha2 =  $_GET["fecha2"];
                            $fecha1 = '01-02-2018';
                            $fecha2 = '01-02-2019';
                            $consulta = "select tel_registry_incoming_calls.group, count(*) from tel_registry_incoming_calls('$fecha1', '$fecha2', '', '', '','' , '',0 ) where disposition= 'ANSWERED' group by tel_registry_incoming_calls.group";
                            consulta($consulta); ?>,
                    value_max: 300,
                    category: 'group',
                    value: 'count',
                    title: 'Agentes por llamadas entrantes ',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    position: 'div6'

                }
            });
            $.simple_pie_chart({
                am4charts: {
                    data: <?php
                            file_get_contents('./examples/conexion_postgres/consulta01.php');
                            //$fecha1 = $_GET["fecha1"];
                            //$fecha2 =  $_GET["fecha2"];
                            $fecha1 = '01-02-2018';
                            $fecha2 = '01-02-2019';
                            $consulta = "select tel_registry_incoming_calls.group, count(*) from tel_registry_incoming_calls('$fecha1', '$fecha2', '', '', '','' , '',0 ) where disposition= 'ANSWERED' group by tel_registry_incoming_calls.group";
                            consulta($consulta); ?>,
                    value_max: 300,
                    category: 'group',
                    value: 'count',
                    title: 'Agentes por llamadas entrantes ',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    position: 'div7'

                }
            });
            $.stacked_3D_column_chart({
                am4charts: {
                    data: <?php
                            include('../../conexion_postgres/consulta01.php');
                            //$fecha1 = $_GET["fecha1"];
                            //$fecha2 =  $_GET["fecha2"];
                            $fecha1 = '01-02-2018';
                            $fecha2 = '01-02-2019';
                            $consulta = "select accountname, answered, (avgcalltime::TIME-avganswertime::TIME) as tiempotimbrado ,avgcalltime,avganswertime as tiempohablado  from coc_queue_report_agent_general('$fecha1', ' $fecha2',0,0) order by avgcalltime desc";
                            consulta($consulta); ?>,
                    value_max: 3500,
                    category: 'accountname',
                    value1: 'tiempotimbrado',
                    value2: 'avgcalltime',
                    value3: '',
                    value4: '',
                    title: 'Agentes por llamadas entrantes ',
                    title_fontSize: 20,
                    title_marginBottom: 50,
                    position: 'div8'
                }
            });
        });
    </script>
</head>

<body>
</body>

</html>