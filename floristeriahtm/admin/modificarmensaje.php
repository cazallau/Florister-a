<?php
    $id = $_POST["id"];
    $mensaje = $_POST["mensaje"];
    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");
    $consulta1 = "UPDATE mensajes SET mensaje = '$mensaje' where id = '$id'";
    $resultado1 = mysqli_query($conexion, $consulta1);
    
    if ($resultado1){
        mysqli_close($conexion);
        
        header('location: mostrarmensaje.php');
    }else{
        echo("Usuarios incorrecto </br>");
    }
    /*$consulta = "INSERT INTO pedido(nombre, apellidos, direccion, cp, ciudad, provincia, fecha_envio, numero_tarjeta, tipo_tarjeta, mes_caducidad, año_caducidad, ccv) VALUES ('$nombre', '$apellidos', '$direccion', '$cp', '$ciudad', '$provincia', Now(), '$numeroTarjeta', '$tarjeta', '$mesCaducidad', '$añoCaducidad', '$ccv')";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado){
        mysqli_close($conexion);
        echo("Pedido correcto</br>");
    }else{
        echo("Pedido incorrecto</br>");
    }*/
    
    ?>