<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
   <center>
      <?php

      /*******************/ ////////////*******DIBUJO DE TABLA ********//////////////*********************

      function ayer($query)
      {
         include('../examples/conexion_postgres/conexion01.php');

         $result = pg_query($query); // ejecuta la consulta dada por query en la conexión a la base de datos especificada por connection.
         $i = 0;
         echo '<div class="table-responsive" >';
         echo '<table border="1" class="table" style =" width: 30%; height: 30%" id ="tabla_consulta">';
         echo '<thead class ="thead-dark"><tr>';

         while ($i < pg_num_fields($result)) //el numero de columnas tiene que ser mayor a cero 
         {
            $fieldName = pg_field_name($result, $i); //devuelve el nombre del campo asociado debe empezar desde cero 
            echo '<th>' . $fieldName .  '</th>'; //dibujamos el nombre del campo
            $i = $i + 1;
         }
         echo '</tr></thead>';
         $i = 0;
         while ($row = pg_fetch_row($result)) // obtiene una fila de datos a partir del resultado asociado con el identificador de resultado especificado y lo pone en variable row 
         {
            echo '<tr>';
            $count = count($row); //cuecomo poner condiciones en tablas cuando esta muy larga en htmlnta el numero de elementos de un array y lo asignamos en una variabl 
            $y = 0;
            while ($y < $count) //el numero de elementos de un array debe ser mayor a cero 
            {
               $c_row = current($row); //Devuelve el elemento actual en un array
               echo '<td>' . $c_row . '</td>'; //dibujamos el elemento actual del array 
               next($row); //Avanza el puntero interno un lugar a delante antes de devolver el valor del elemento. //devuelve el siguiente valor del array y avanza el puntero interno del array un lugar.
               $y = $y + 1; //aumentamos en uno 
            }
            echo '</tr>';
            $i = $i + 1;
         }
         pg_free_result($result); //libera la memoria y los datos asociados con el recurso de resultado de consulta PostgreSQL especificado
         echo '</table>';
         echo '</div>';
      }
      $fecha_incial = $_GET["fecha1"];
      $fecha_final = $_GET["fecha2"];
      //$fecha1 = '01-02-2018';
      //$fecha2 = '01-02-2019';
      $consulta = "select * from tel_registry_incoming_calls('$fecha_incial', '$fecha_final', '', '', '','' , '',0 ) ";      
      ayer($consulta);

      ?>
   </center>
   <script>
        $(document).ready(function () {
            $('#tabla_consulta').DataTable();
        });
    </script>
</body>

</html>