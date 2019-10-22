<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>General !</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="./jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>


</head>

<body>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            background-color: #ffffff;
            overflow: hidden;
            margin: 0;
        }

        div {
            width: 100%;
            max-height: 600px;
            height: 100vh;
        }

        #scroll {
            border: 1px solid;
            width: 100%;
            max-height: 600px;
            height: 100vh;
            overflow-y: scroll;
            overflow-x: hidden;
        }
    </style>
    <div class="row" id="scroll">
        <div class="col-sm-6" id="chartdiv1"></div>
        <div class="col-sm-6" id="chartdiv2"></div>
        <div class="col-sm-6" id="chartdiv3"></div>
        <div class="col-sm-6" id="chartdiv4"></div>
        <div class="col-sm-6" id="chartdiv5"></div>
        <div class="col-sm-6" id="chartdiv6"></div>
        <div class="col-sm-6" id="chartdiv7"></div>
        <div class="col-sm-6" id="chartdiv8"></div>
        <div class="col-sm-6" id="chartdiv9"></div>
    </div>
    <script src="./core.js"></script>
    <script src="./charts.js"></script>
    <script src="./themes/animated.js"></script>

    <script src="./examples/javascript/amcharts3/index.js"></script>
    <script src="./examples/javascript/column-chart-with-axis-break/index.js"></script>
    <script src="./examples/javascript/cylinder-chart/index.js"></script>
    <script src="./examples/javascript/donut-chart/index.js"></script>
    <script src="./examples/javascript/semi-circle-donut-chart/index.js"></script>
    <script src="./examples/javascript/simple-3D-pie-chart/index.js"></script>
    <script src="./examples/javascript/simple-bar-chart/index.js"></script>
    <script src="./examples/javascript/simple-pie-chart/index.js"></script>
    <script src="./examples/javascript/stacked-3D-column-chart/index.js"></script>

    <script type="text/javascript">
        $.amcharts3({
            am4charts: {
                data: <?php
                        include('./examples/conexion_postgres/consulta01.php');
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
                position: 'chartdiv1'
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
                position: 'chartdiv2'

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
                position: 'chartdiv3'

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
                position: 'chartdiv4'
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
                position: 'chartdiv5'

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
                position: 'chartdiv6'

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
                position: 'chartdiv7'

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
                position: 'chartdiv8'

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
                position: 'chartdiv9'
            }
        });
    </script>
</body>

</html>