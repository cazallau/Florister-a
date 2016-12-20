<?php
    $id = $_POST["id"];
    $mensaje = $_POST["mensaje"];
    $check1 = $_POST["check1"];
    $txtMensaje = $_POST["txMensaje"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $cp = $_POST["cp"];
    $ciudad = $_POST["ciudad"];
    $provincia = $_POST["provincia"];
    $rellenar = $_POST["rellenar"];
    $nombre1 = $_POST["nombre1"];
    $apellidos1 = $_POST["apellidos1"];
    $direccion1 = $_POST["direccion1"];
    $cp1 = $_POST["cp1"];
    $ciudad1 = $_POST["ciudad1"];
    $provincia1 = $_POST["provincia1"];
    $tarjeta = $_POST["tarjeta"];
    $numeroTarjeta = $_POST["numeroTarjeta"];
    $mesCaducidad = $_POST["mesCaducidad"];
    $añoCaducidad = $_POST["añoCaducidad"];
    $ccv = $_POST["ccv"];
    $fecha_envio = $_POST["fecha_envio"];
    $usuario = $_POST["usuario"];
    $password1 = $_POST["password1"];
    if ($tarjeta == 1){
        $tarjeta = "Visa";
    }else if ($tarjeta == 2){
        $tarjeta = "Master Card";
    }else if ($tarjeta == 3){
        $tarjeta = "American Express";
    }
    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");
    
    $consulta = "INSERT INTO pedido(id_usuario, nombre, apellidos, direccion, cp, ciudad, provincia, fecha_pedido, numero_tarjeta, tipo_tarjeta, mes_caducidad, año_caducidad, ccv, fecha_envio) VALUES ('$id', '$nombre', '$apellidos', '$direccion', '$cp', '$ciudad', '$provincia', Now(), '$numeroTarjeta', '$tarjeta', '$mesCaducidad', '$añoCaducidad', '$ccv', '$fecha_envio')";
    
    $resultado = mysqli_query($conexion, $consulta);
    $id_pedido = mysqli_insert_id($conexion);
    if ($rellenar != 1){
        $consulta1 = "INSERT INTO direccion_envio(id_pedido, nombre, apellidos, direccion, cp, ciudad, provincia) VALUES ('$id_pedido', '$nombre1', '$apellidos1', '$direccion1', '$cp1', '$ciudad1', '$provincia1')";
        $resultado1 = mysqli_query($conexion, $consulta1); 
    } 
    if ($check1 == '0'){
        $consulta4 = "INSERT INTO linea_pedido(id_pedido, id_mensaje) VALUES ('$id_pedido', 0)";
        $resultado4 = mysqli_query($conexion, $consulta4);
        $id_linea_pedido = mysqli_insert_id($conexion);
        $consulta3 = "INSERT INTO mensaje_personalizado (id_linea_pedido, mensaje) VALUES ('$id_linea_pedido', '$txtMensaje')";
        
        $resultado3 = mysqli_query($conexion, $consulta3);
        echo $txtMensaje;
    }else{
        $consulta2 = "INSERT INTO linea_pedido(id_pedido, id_mensaje) VALUES ('$id_pedido', '$mensaje')";
        $resultado2 = mysqli_query($conexion, $consulta2);
    }
   
        mysqli_close($conexion);
        
    
    header('location: ../pedidocorrecto.html');
    ?>