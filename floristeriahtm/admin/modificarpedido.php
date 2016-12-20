<?php
    $id = $_POST["id"];
    $idp = $_POST["idp"];
    $d = $_POST["d"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $mensa = $_POST["mensa"];
    $cp = $_POST["cp"];
    $provincia = $_POST["provincia"];
    $fecha_envio = $_POST["fecha_envio"];
    $fecha_pedido = $_POST["fecha_pedido"];
    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");
    $consulta1 = "UPDATE pedido SET nombre= '$nombre', apellidos = '$apellidos', direccion = '$direccion', ciudad = '$ciudad', cp = '$cp', provincia = '$provincia', fecha_pedido = '$fecha_pedido', fecha_envio = '$fecha_envio' where id = '$id'";
    $resultado1 = mysqli_query($conexion, $consulta1);
    
    if (d != "disabled"){
        $consulta1 = "UPDATE mensaje_personalizado SET mensaje = '$mensa' where id = '$idp'";
        $resultado1 = mysqli_query($conexion, $consulta1);
        
    }
    
    if ($resultado1){
        mysqli_close($conexion);
        
        header('location:mostrarpedido.php');
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