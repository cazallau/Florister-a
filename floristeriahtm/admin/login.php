<?php
    
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    session_start();
    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");
    $consulta1 = "SELECT id, usuario, contraseña, nombre FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
    $resultado1 = mysqli_query($conexion, $consulta1);
    $num_rows = mysqli_num_rows($resultado1);
    if($num_rows>0){
        $fila = mysqli_fetch_array($resultado1);
        $_SESSION["user"] = $usuario;
        $_SESSION["userId"] = $fila["id"];
        $_SESSION["nombre"] = $fila["nombre"];
        mysqli_close($conexion);
        if ($fila["usuario"] == "admin"){
            header('location:../administrar.html');
        }else{
        header('location: ../pedidos.php');
        }   
    }else{
        mysqli_close($conexion);
        header('location: ../index.html');
    }
    
    ?>