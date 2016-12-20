<?php
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["mail"];
    $ciudad = $_POST["ciudad"];
    $cp = $_POST["cp"];
    $provincia = $_POST["provincia"];
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");
    $consulta1 = "UPDATE usuarios SET nombre= '$nombre', apellidos = '$apellidos', dni = '$dni', direccion = '$direccion', telefono = '$telefono', email = '$email', ciudad = '$ciudad', cp = '$cp', provincia = '$provincia' where id = '$id'";
    $resultado1 = mysqli_query($conexion, $consulta1);
    
    if ($resultado1){
        mysqli_close($conexion);
        
        header('location: ../pedidos.php');
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