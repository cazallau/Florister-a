<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
    session_start();
    require("conexion.php");
    $id = $_GET["id"];
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");
    $consulta1 = "SELECT * FROM mensajes WHERE id = '$id'";
    $resultado1 = mysqli_query($conexion, $consulta1);
    $num_rows = mysqli_num_rows($resultado1);
    if($num_rows>0){
        $fila = mysqli_fetch_array($resultado1);
        mysqli_close($conexion);
        
    }else{
        mysqli_close($conexion);
        
    }
    
    ?>
        
        <div class="container">
            <div class="col-xs-1 col-md-3"></div>
            <div class="col-xs-1 col-md-6" >
            <div class="col-md-12" style="padding:0px">
            <div class="col-md-12" style="padding:50px">
            <fieldset >
                <legend><center>Editar Mensaje</center></legend>
                <form id="registro" action="modificarmensaje.php" method="POST">
                        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id;?>">
                        </br>
                        <label for="nombre" class="control-label">Mensaje</label>
                        <input type="text" id="mensaje" name="mensaje" class="form-control" value="<?php echo $fila['mensaje'];?>">
                        </br>
                        <input type="submit" id="guardar" name="guardar" value="Guardar" class="btn btn-group-justified" >
                        
                        </form>
            </fieldset>
            </div>
            </div>
                
                
            </div>
            <div class="col-xs-1 col-md-3"></div>
            </div>
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
             <script src="cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css"></script>
        
    </body>
</html>