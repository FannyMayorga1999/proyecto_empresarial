<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Graficos</title>
</head>

<body>
    <center>
        <div class="content">
            <nav class="navbar navbar-light d-flex justify-content-center" style=" background-color:#4872b7; weigth:200;height: 70px; text-align: center; border-radius: 10px;">
                <h2 style="color:#FFFFFF; padding-top: 13px;">RESUMEN DE COLAS</h2>
            </nav>
            </br>
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: rgb(204, 204, 204); height: 50px; text-align: center; border-radius: 10px;">
                <form class="form-inline my-2 my-lg-0" action="tabla.php" method="get">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Fecha Inicial</label>
                        <input class="custom-select" style="width:200px" type="date" name="fecha1" value="fecha_inicial" id="fecha_inicial">
                        <label class="input-group-text" for="inputGroupSelect01">Fecha Final</label>
                        <input class="custom-select" style="width:200px" type="date" name="fecha2" value="fecha_final" id="fecha_final">
                        <input class="btn btn-success" type="submit" value="Enviar">
                    </div>
                </form>
            </nav>
            </br>
        </div>
        </br>
        <div class="d-flex justify-content-center">
            <iframe frameborder="0" name="principal" width="35%" height="500" src="./tabla/index.php?fecha1=<?php print $_GET["fecha1"] ?>&fecha2=<?php print $_GET["fecha2"] ?>"></iframe>
        </div>
    </center>
</body>

</html>