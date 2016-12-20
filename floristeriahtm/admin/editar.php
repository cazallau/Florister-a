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
    $id_user = $_SESSION["userId"];
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");
    $consulta1 = "SELECT * FROM usuarios WHERE id = '$id_user'";
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
                <legend><center>Editar Perfil de <?php echo$_SESSION['nombre'];?></center></legend>
                <form id="registro" action="modificar.php" method="POST">
                        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $_SESSION['userId'];?>">
                        </br>
                        <label for="nombre" class="control-label">Nombre </label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $fila['nombre'];?>">
                        </br>
                        <label for="apellidos" class="control-label">Apellidos </label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo $fila['apellidos'];?>">
                        </br>
                        <label for="dni" class="control-label">DNI </label>
                        <input type="text" id="dni" name="dni" class="form-control" value="<?php echo $fila['dni'];?>">
                        </br>
                        <label for="direccion" class="control-label">Dirección </label>
                        <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $fila['direccion'];?>">
                        </br>
                        <label for="ciudad" class="control-label">Ciudad </label>
                        <input type="text" id="ciudad" name="ciudad" class="form-control" value="<?php echo $fila['ciudad'];?>">
                        </br>
                        <label for="cp" class="control-label">Codigo Postal </label>
                        <input type="text" id="cp" name="cp" maxlength="5" class="form-control" value="<?php echo $fila['cp'];?>">
                        </br>
                        <label for="provincia" class="control-label">Provincia </label>
                        <input type="text" id="provincia" name="provincia" maxlength="100" class="form-control" value="<?php echo $fila['provincia'];?>">
                        </br>
                        <label for="telefono" class="control-label">Telefono </label>
                        <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $fila['telefono'];?>">
                        </br>
                        <label for="mail" class="control-label">E-mail </label>
                        <input type="text" id="mail" name="mail" class="form-control" value="<?php echo $fila['email'];?>">
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