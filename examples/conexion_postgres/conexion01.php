
<?php

    //pone todo la informacion de la base de datos 
    $conn_string = "host=localhost port=5432 dbname=contactvox3 user=postgres password=paradise ";

    $dbconn = pg_connect($conn_string);
    if(!$dbconn) {
        echo "imposible conectarse: ";
    }
    if (pg_last_error())
    {
        echo "Connect failed ";
    }
?>