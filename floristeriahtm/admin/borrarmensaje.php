<?php
    
    $id = $_GET["id"];
    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");

    $consulta1 = "Delete from mensajes where mensajes.id = '$id'";
    $resultado1 = mysqli_query($conexion, $consulta1);
    if($resultado1){
        
        mysqli_close($conexion);

    }else{
       
    }
    header('location:mostrarmensaje.php');
    
    ?>