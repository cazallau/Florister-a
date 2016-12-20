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
                <legend><center>Mensajes</center></legend>
                </fieldset>
               <table>
                   <thead>
                       <tr>
                       <th>Id</th>
                       <th>Mensaje</th>
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
     $consulta1 = "SELECT * FROM mensajes";
    $resultado1 = mysqli_query($conexion, $consulta1);
    $num_rows = mysqli_num_rows($resultado1);
    if($num_rows>0){
        while($fila = mysqli_fetch_array($resultado1)){
          if ($fila["usuario"]!="admin"){
            echo"<tr>";
            echo"<td width='80'>". $fila['id']."</td>";
                echo"<td width='200'>". $fila['mensaje']."</td>";
                echo"<td width='200'><a href='editarmensaje.php?id=".$fila['id']."'>Editar </a></td>";
                echo"<td width='200'><a href='borrarmensaje.php?id=".$fila['id']."'>Borrar </a></td>";
                echo"</tr>";
            }
        }
    }
        mysqli_close($conexion);
        ?>
                </tbody>
               </table>
                        
             
             </div>
             <div class="col-xs-1 col-md-2" style="padding:20px">
            <h8><a href="../administrar.html"> Ir al Panel de Control</a></h8>
            </br>
            </br>
            <button class="btn" style="color:Black" ><a style="color:Black" href="../anadirmensaje.html">Añadir Mensaje</a></button>
            </div>  
           
            </div>
             <link href="../css/bootstrap.min.css" rel="stylesheet">
             <link href="../css/estilotable.css" rel="stylesheet">
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
             
        
    </body>
</html>