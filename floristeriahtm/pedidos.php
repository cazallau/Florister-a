<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <?php 
            session_start();
           
           
            ?>
        <script>
            if(window.addEventListener){
			window.addEventListener("load", setUpPagina, false);
	    	} else if (window.attachEvent){
			window.attachEvent("onload", setUpPagina);	
		    }
            function rellenarCampos(){
                var dirFactura = document.getElementById('rellenar').checked;
			if(dirFactura)
			{
				document.getElementById('nombre1').value = document.getElementById('nombre').value;
				document.getElementById('apellidos1').value = document.getElementById('apellidos').value;
				document.getElementById('direccion1').value = document.getElementById('direccion').value;
				document.getElementById('cp1').value = document.getElementById('cp').value;
				document.getElementById('provincia1').selectedIndex = document.getElementById('provincia').selectedIndex;
				document.getElementById('ciudad1').value = document.getElementById('ciudad').value;

				document.getElementById('nombre1').disabled=true;
				document.getElementById('apellidos1').disabled=true;
				document.getElementById('direccion1').disabled=true;
				document.getElementById('cp1').disabled=true;
				document.getElementById('provincia1').disabled=true;
				document.getElementById('ciudad1').disabled=true;
				
			} else
			{
				document.getElementById('nombre1').disabled=false;
				document.getElementById('apellidos1').disabled=false;
				document.getElementById('ciudad1').disabled=false;
				document.getElementById('cp1').disabled=false;
				document.getElementById('provincia1').disabled=false;
				document.getElementById('ciudad1').disabled=false;
				
			}
            }
            function personalizado(){
		    var mensaje = document.getElementById('check1').checked;
		    if(mensaje)
		    {
			    document.getElementById('txMensaje').disabled=false;
			    document.getElementById('mensajes1').disabled=true;
				 document.getElementById('mensajes1').checked=false;
			    document.getElementById('mensajes2').disabled=true;
			    document.getElementById('mensajes2').checked=false;
			    document.getElementById('mensajes3').disabled=true;
			    document.getElementById('mensajes3').checked=false;
			    document.getElementById('mensajes4').disabled=true;
			    document.getElementById('mensajes4').checked=false;
		    }
		    else
		    {
			    document.getElementById('txMensaje').disabled=true;
			    document.getElementById('txMensaje').value = "";
			    document.getElementById('mensajes1').disabled=false;
			    document.getElementById('mensajes2').disabled=false;
			    document.getElementById('mensajes3').disabled=false;
			    document.getElementById('mensajes4').disabled=false;			    
		    }
	    }
        function cargarDias() {
	    	for (i=1; i<29; i++) {
	    		var option = document.createElement("option");
				option.text = i;
				option.value = i;
				var select = document.getElementById("dia");
				select.appendChild(option);
	    	}
	    }
        function actualizarDias() {
	    	var diaEntrega = document.getElementById("dia");
	    	var mesEntrega = document.getElementById("mes");
	    	var yearEntrega = document.getElementById("año");
	    	var mesSeleccion = mesEntrega.options[mesEntrega.selectedIndex].value;
	    	var fechas = diaEntrega.getElementsByTagName("option");
	    	while (fechas[28])
			{
				diaEntrega.removeChild(fechas[28]);
			}
			if (yearEntrega.selectedIndex === -1) {
				yearEntrega.selectedIndex = 0;
			}
	    	if (mesSeleccion === "2" && yearEntrega.options[yearEntrega.selectedIndex].value === "2018") {
	    		var option = document.createElement("option");
				option.text = 29;
				option.value = 29;
				var select = document.getElementById("dia");
				select.appendChild(option);
	    	} else if (mesSeleccion === "1" || mesSeleccion === "3" || mesSeleccion === "5" || mesSeleccion === "7" || mesSeleccion === "8" || mesSeleccion === "10" || mesSeleccion === "12") {
	    		var option = document.createElement("option");
				option.text = 29;
				option.value = 29;
				var select = document.getElementById("dia");
				select.appendChild(option);
				option = document.createElement("option");
				option.text = 30;
				option.value = 30;
				select = document.getElementById("dia");
				select.appendChild(option);
				option = document.createElement("option");
				option.text = 31;
				option.value = 31;
				select = document.getElementById("dia");
				select.appendChild(option);
	    	} else if (mesSeleccion === "4" || mesSeleccion === "6" || mesSeleccion === "9" || mesSeleccion === "11") {
	    		var option = document.createElement("option");
				option.text = 29;
				option.value = 29;
				var select = document.getElementById("dia");
				select.appendChild(option);
				option = document.createElement("option");
				option.text = 30;
				option.value = 30;
				select = document.getElementById("dia");
				select.appendChild(option);
                
	    	}
	    }
	    
	    function removerValoresSelected() {
			var selectVacias = document.getElementsByTagName("select");
			for(var i=0; i < selectVacias.length; i++){
				selectVacias[i].selectedIndex = -1;	
			}
		}
        function comprobarContraseñas(){
                if (document.getElementById("password1").value != document.getElementById("password2").value){
                document.getElementById("comprobadas").innerHTML = "Las contraseñas no son iguales";
                }
        }
		
		function setUpPagina() {
			removerValoresSelected();
			cargarDias();
		}	
            </script>
            <?php 
            require("admin/conexion.php");
            $id = $_SESSION['userId'];
            $conexion = mysqli_connect($db_host, $db_user, $db_password);
            mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
            mysqli_set_charset($conexion,"utf8");
             $consulta1 = "SELECT * FROM usuarios where id = '$id'";
            $resultado1 = mysqli_query($conexion, $consulta1);
            $num_rows = mysqli_num_rows($resultado1);
            $fila = mysqli_fetch_array($resultado1);
            mysqli_close($conexion);
            
            ?>
        <div class="container">
           
            <div class=" col-md-3">
             
            </div>
            <div class=" col-md-6" >
        <form action="admin/pedido.php" method="POST">
            <div class="col-md-12" style="padding:10px">
            
            <fieldset >
            
            <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $_SESSION['userId'];?>">
             </br>
                <legend> 1-Elija su Mensaje</legend>
                
                 <?php
                    require("admin/conexion.php");
                    $conexion = mysqli_connect($db_host, $db_user, $db_password);
                    mysqli_select_db($conexion, $db_database) or die ("imposible conectar");
                    mysqli_set_charset($conexion,"utf8");
                    $consulta1 = "SELECT * FROM mensajes";
                    $resultado1 = mysqli_query($conexion, $consulta1);
                    $num_rows = mysqli_num_rows($resultado1);
                    if($num_rows>0){
                        while($fila1 = mysqli_fetch_array($resultado1)){
                            $value = $fila1['id'];
                            echo"<div class='radio'>";
                            echo "<label><input type='radio' name='mensaje' value='$value'>". $fila1['mensaje']."</label>";
                            echo "</div>";
                        }
                    }
                    mysqli_close($conexion);
                ?>
                <div class="checkbox">
                <label><input type="checkbox" name="check1" id="check1" value="0" onclick="personalizado()" > Mensaje personalizado</label>
                </div>
                <textarea rows="10" cols="50" id="txMensaje" name="txMensaje" maxlength="200" disabled> </textarea></br></br>
            </fieldset>
            </div>
            <div class="col-md-12" style="padding:10px" ></div>
            <div class="col-md-12" style="background-color:" >
            <fieldset name="direccion de facturacion">
                <legend>2-Dirección de Facturacion</legend>
                <div class="form-group">
                <label for="nombre" class="control-label">Nombre </label>
                <input type="text" id="nombre" name="nombre" maxlength="100" class="form-control" value="<?php echo $fila['nombre'];?>"></br></br>
                </div>
                <div class="form-group">
                <label for="apellidos" class="control-label">Apellidos </label>
                <input type="text" id="apellidos" name="apellidos" maxlength="100" class="form-control" value="<?php echo $fila['apellidos'];?>"></br></br>
                </div>
                <div class="form-group">
                <label for="direccion" class="control-label">Dirección </label>
                <input type="text" id="direccion" name="direccion" maxlength="150" class="form-control" value="<?php echo $fila['direccion'];?>"></br></br>
                </div>
                <div class="form-group">
                <label for="cp" class="control-label">Codigo Postal </label>
                <input type="text" id="cp" name="cp" maxlength="5" class="form-control" value="<?php echo $fila['cp'];?>"></br></br>
                </div>
                <div class="form-group">
                <label for="ciudad" class="control-label">Ciudad </label>
                <input type="text" id="ciudad" name="ciudad" maxlength="10" class="form-control" value="<?php echo $fila['ciudad'];?>"></br></br>
                </div>
                <div class="form-group">
                <label for="provincia" class="control-label">Provincia</label>
                <select id="provincia" name="provincia" class="form-control" value="<?php echo $fila['provincia'];?>">
		            <option value="jaen">Jaen </option>
		            <option value="cordoba">Cordoba </option>
		            <option value="sevilla">Sevilla </option>
                    <option value="huelva">Huelva </option>
		            <option value="cadiz">Cadiz </option>
		            <option value="malaga">Malaga </option>
                    <option value="granada">Granada </option>
		            <option value="almeria">almeria </option>
	            </select></br></br>
                </div>
                </div>
            </fieldset>
            <div class="col-md-12" style="padding:10px" ></div>
            <div class="col-md-12" style="background-color:" >
            <fieldset id="direcion de envio">
                <legend>3-Dirección de Envio </legend>
                <div class="checkbox">
                <label><input type="checkbox" id="rellenar" name="rellenar" onclick="rellenarCampos()" value="1">Misma direccion que facturacion</label>
                </div>
                </br></br>
                <div class="form-group">
                <label for="nombre1" class="control-label">Nombre </label>
                <input type="text" id="nombre1" name="nombre1" class="form-control"></br></br>
                </div>
                <div class="form-group">
                <label for="apellidos1" class="control-label">Apellidos </label>
                <input type="text" id="apellidos1" name="apellidos1" class="form-control"></br></br>
                </div>
                <div class="form-group">
                <label for="direccion1"class="control-label">Dirección </label>
                <input type="text" id="direccion1" name="direccion1" class="form-control"></br></br>
                </div>
                <div class="form-group">
                <label for="cp1" class="control-label">Codigo Postal </label>
                <input type="text" id="cp1" name="cp1" class="form-control"></br></br>
                </div>
                <div class="form-group">
                <label for="ciudad1" class="control-label">Ciudad </label>
                <input type="text" id="ciudad1" name="ciudad1" class="form-control"></br></br>
                </div>
                <div class="form-group">
                <label for="provincia1" class="control-label">Provincia</label>
                <select id="provincia1" name="provincia1" class="form-control">
		            <option value="jaen">Jaen </option>
		            <option value="cordoba">Cordoba </option>
		            <option value="sevilla">Sevilla </option>
                    <option value="huelva">Huelva </option>
		            <option value="cadiz">Cadiz </option>
		            <option value="malaga">Malaga </option>
                    <option value="granada">Granada </option>
		            <option value="almeria">almeria </option>
                </select></br></br>
                </div>
        
            </fieldset>
                </div>
                <div class="col-md-12" style="padding:10px" ></div>
                <div class="col-md-12" style="background-color:" >
            <fieldset id="fecha de envio">

                <legend> 4-Fecha de Envio </legend>
                
                <div class="form-group">
                    <input type="date" name="fecha_envio">
                </div>
                
            </fieldset>
                </div>
                <div class="col-md-12" style="padding:10px" ></div>
                <div class="col-md-12" style="background-color:" >
            <fieldset id="forma de pago">
                <legend>5-Forma de Pago</legend>
                <div class="radio">
                <label><input type="radio" name="tarjeta" value="1"> Visa </label>
                </div>
                <div class="radio">
                <label><input type="radio" name="tarjeta" value="2"> Master Card</label>
                </div>
                <div class="radio">
                <label><input type="radio" name="tarjeta" value="3"> American Express</label>
                </div>
                <div class="form-group">
                <label for="numeroTarjeta" class="control-label">Numero Tarjeta</label>
                <input type="text" id="numeroTarjeta" name="numeroTarjeta" class="form-control">
                </div>
                <h4>Caducidad</h4>
                <div class="col-md-6" style="padding-left:0px">
                <div class="form-group">
                <label for="mesCaducidad" class="control-label">Mes</label>
                <select id="mesCaducidad" name="mesCaducidad" class="form-control">
		            <option value="1">Enero </option>
		            <option value="2">Febrero </option>
		            <option value="3">Marzo </option>
                    <option value="4">Abril </option>
		            <option value="5">Mayo </option>
		            <option value="6">Junio </option>
                    <option value="7">Julio </option>
		            <option value="8">Agosto </option>
                    <option value="9">Septiembre </option>
                    <option value="10">Octubre </option>
                    <option value="11">Noviembre </option>
                    <option value="12">Diciembre </option>
                </select>
                </div>
                </div>
                <div class="col-md-6" style="padding-right:0px">
                <div class="form-group">
                <label for="añoCaducidad" class="control-label">Año</label>
                <select id="añoCaducidad" name="añoCaducidad" class="form-control">
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
                </div>
                </div>
                <div class="form-group">
                <label for="ccv" class="control-label">CCV</label>
                <input type="text" id="ccv" name="ccv" class="form-control">
                </div>
            </fieldset>
                </div>
                <div class="col-md-12" style="padding:10px" ></div>
                <div class="col-md-12" style="background-color:" >
                <input type="submit" id="enviar" name="enviar" value="Enviar" class="btn btn-group-justified" onclick="comprobarContraseñas()" >
                
            </div>
            </div>
            <div class="col-xs-1 col-md-3">
        
           <h4 align="right"> Bienvenido 
                 <?php 
            session_start();
           
            echo $_SESSION["nombre"];
            ?></h4>
    
            <a href="admin/editar.php"><h4 align="right">Editar mi Perfil</h4></a>
             <a href="index.html"><h4 align="right">Salir</h4></a>
            </div>
            
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
             <script src="cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>