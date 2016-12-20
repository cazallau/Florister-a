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
    $id_pedido = $_GET["id"];
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");
    $consulta1 = "SELECT * FROM pedido WHERE id = '$id_pedido'";
    $resultado1 = mysqli_query($conexion, $consulta1);
    $num_rows = mysqli_num_rows($resultado1);
    $pedido = mysqli_fetch_array($resultado1);
    $consulta1 = "SELECT * FROM linea_pedido WHERE linea_pedido.id_pedido = '$id_pedido'";
    $resultado1 = mysqli_query($conexion, $consulta1);
    $num_rows = mysqli_num_rows($resultado1);
    $linea_pedido = mysqli_fetch_array($resultado1);
    
    if ($linea_pedido["id_mensaje"] == 0){
        $l = $linea_pedido["id"];
        $consulta1 = "SELECT * FROM mensaje_personalizado WHERE mensaje_personalizado.id_linea_pedido = '$l'";
        $resultado1 = mysqli_query($conexion, $consulta1);
        $num_rows = mysqli_num_rows($resultado1);
        $mensaje = mysqli_fetch_array($resultado1);
        $d = "";
        $idp = $mensaje["id"];
    }else{
        $l = $linea_pedido["id_mensaje"];
        $consulta1 = "SELECT * FROM mensajes WHERE id= '$l'";
        $resultado1 = mysqli_query($conexion, $consulta1);
        $num_rows = mysqli_num_rows($resultado1);
        $mensaje = mysqli_fetch_array($resultado1);
        $d = "disabled";
        $idp = 0;
    }

    mysqli_close($conexion);
        
    
    ?>
        
        <div class="container">
            <div class="col-xs-1 col-md-3"></div>
            <div class="col-xs-1 col-md-6" >
            <div class="col-md-12" style="padding:0px">
            <div class="col-md-12" style="padding:50px">
            <fieldset >
                <legend><center>Editar Mensaje</center></legend>
                <form id="registro" action="modificarpedido.php" method="POST">
                        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id_pedido;?>">
                        </br>
                        <input type="hidden" id="d" name="d" class="form-control" value="<?php echo $d; ?>">
                        </br>
                        <input type="hidden" id="idp" name="idp" class="form-control" value="<?php echo $idp; ?>">
                        </br>

                        <label for="nombre" class="control-label">Nombre </label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $pedido['nombre'];?>">
                        </br>
                        <label for="apellidos" class="control-label">Apellidos </label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo $pedido['apellidos'];?>">
                        </br>
                        <label for="dni" class="control-label">DNI </label>
                        <input type="text" id="dni" name="dni" class="form-control" value="<?php echo $pedido['dni'];?>">
                        </br>
                        <label for="direccion" class="control-label">Dirección </label>
                        <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $pedido['direccion'];?>">
                        </br>
                        <label for="ciudad" class="control-label">Ciudad </label>
                        <input type="text" id="ciudad" name="ciudad" class="form-control" value="<?php echo $pedido['ciudad'];?>">
                        </br>
                        <label for="cp" class="control-label">Codigo Postal </label>
                        <input type="text" id="cp" name="cp" maxlength="5" class="form-control" value="<?php echo $pedido['cp'];?>">
                        </br>
                        <label for="provincia" class="control-label">Provincia </label>
                        <input type="text" id="provincia" name="provincia" maxlength="100" class="form-control" value="<?php echo $pedido['provincia']; ?>" >
                        </br>
                        <label for="mensa" class="control-label">Mensaje </label>
                        <input type="text" id="mensa" name="mensa" class="form-control" value="<?php echo $mensaje['mensaje'];?>" <?php echo $d;?>>
                        </br>
                        <label for="fecha_envio" class="control-label">Fecha Envio </label>
                        <input type="text" id="fecha_envio" name="fecha_envio" class="form-control" value="<?php echo $pedido['fecha_envio'];?>">
                        </br>
                        <label for="fecha_pedido" class="control-label">Fecha Pedido </label>
                        <input type="text" id="fecha_pedido" name="fecha_pedido" class="form-control" value="<?php echo $pedido['fecha_pedido'];?>">
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