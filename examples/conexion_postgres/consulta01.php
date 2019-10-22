<?php
// se realiza un query para la consulta a la base 
function consulta($query){
    include('conexion01.php');
    $resultado = pg_query($query) or die('Error: ' . pg_last_error());
    $data = array();
    
    //pg_fetch_assoc returna un array asociativo que corresponde a la fina recuperada 
    while ($row = pg_fetch_assoc($resultado)) {
        
        $data[] = $row;
        
    }

    // convierte al arrayy en json 
    echo json_encode($data);
}

?>