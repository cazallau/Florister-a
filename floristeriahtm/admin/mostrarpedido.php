<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
        
        <div class="container">
            <div class="col-xs-1 col-md-10" style="padding:20px">
            <fieldset >
                <legend><center>Pedidos</center></legend>
               <table>
                   <thead>
                       <tr>
                       <th>Id Pedido</th>
                       <th>Usuario</th>
                       <th>Nombre</th>
                       <th>Apellidos</th>
                       <th>Fecha de Pedido</th>
                       <th>Fecha de Envio</th>
                       <th></th>
                       <th></th>
                   </tr>
                   </thead>
                   <tbody>
    <?php
    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
    mysqli_set_charset($conexion,"utf8");
     $consulta1 = "SELECT pedido.*, usuarios.usuario, usuarios.nombre, usuarios.apellidos FROM pedido join usuarios on pedido.id_usuario=usuarios.id";
    $resultado1 = mysqli_query($conexion, $consulta1);
    $num_rows = mysqli_num_rows($resultado1);
    if($num_rows>0){
        while($fila = mysqli_fetch_array($resultado1)){
            
            echo"<tr>";
            echo"<td>". $fila['id']."</td>";
                echo"<td>". $fila['usuario']."</td>";
                echo"<td>". $fila['nombre']."</td>";
                echo"<td>". $fila['apellidos']."</td>";
                echo"<td>". $fila['fecha_pedido']."</td>";
                echo"<td>". $fila['fecha_envio']."</td>";
                echo"<td><a href='editarpedido.php?id=".$fila['id']."'>Editar Pedido</a></td>";
                echo"<td><a href='borrarpedido.php?id=".$fila['id']."'>Borrar Pedido</a></td>";
                echo"</tr>";
            
          
        }
    }
        mysqli_close($conexion);
        ?>
                </tbody>
               </table>
                        
                       
                        
            </fieldset>
           </div>
           <div class="col-xs-1 col-md-2" style="padding:20px">
            <h8><a href="../administrar.html"> Ir al Panel de Control</a></h8>
            </div>  
           
            </div>

             <link href="../css/bootstrap.min.css" rel="stylesheet">
             <link href="../css/estilotable.css" rel="stylesheet">
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
    </body>
</html>