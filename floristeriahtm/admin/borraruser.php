<?php
    
    $id = $_GET["id"];
    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");
    $consulta1 = "Delete from usuarios where usuarios.id = '$id'";
    $consulta2 = "Delete from pedido, linea_pedido, direccion_envio using pedido join linea_pedido join direccion_envio where pedido.id_usuario= '$id' and pedido.id = linea_pedido.id_pedido and pedido.id = direccion_envio.id_pedido";
    $resultado1 = mysqli_query($conexion, $consulta1);
    $resultado1 = mysqli_query($conexion, $consulta2);
    $num_rows = mysqli_num_rows($resultado1);
    if($num_rows>0){
        
        mysqli_close($conexion);

    }else{
       
    }
    header('location:../administrar.html');
    
    ?>