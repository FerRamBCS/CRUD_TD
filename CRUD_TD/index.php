<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RAMIREZ BRAVO EQUIPOS VENTAS</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos.css">
</head>
<script>
    function confirmacion() {
        var respuesta = confirm("¡ALERTA!, Estas a punto de realizar esta accion, ¿Seguro que quieres continuar?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }

    }
</script>
<body>
	<div class="contenedor">
		<header>
			<h1>Datos personales</h1>
			<div class="contenedor">

			</div>
		</header>
		<main>
			<form action="php/insertar.php" method="POST"class="formulario">
				<label for="nombre"></label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                <label for="edad"></label>
                <input type="text" name="edad" id="edad" placeholder="Edad" required>
                <label for="estatura"></label>
                <input type="text" name="estatura" id="estatur" placeholder="Estatura" required>
                <label for="peso"></label>
                <input type="text" name="peso" id="peso" placeholder="Peso" required>
				<input type="submit" name="registrar" value="Registrar">
			</form>
			<div class="error_box" id="error_box">
				<p>Se ha producido un error.</p>
			</div>
			<table id="tabla" class="tabla">
				<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Estatura</th>
					<th>Peso</th>
					<th>Eliminar</th>
					<th>Editar</th>
				</tr> 
				</thead>
				<tbody>
					<?php
						include("php/conexion.php");
						$getmysql = new mysqlconex();
						$getconex = $getmysql->conex();
						
						$consulta = "SELECT * FROM datospersonales";
						$resultado = mysqli_query($getconex,$consulta);
						while ($fila = mysqli_fetch_row($resultado)) 
							{
								echo "<tr>";
								echo "<td>".$fila[0]."</td>";
								echo "<td>".$fila[1]."</td>";
								echo "<td>".$fila[2]."</td>";
								echo "<td>".$fila[3]."</td>";
								echo "<td>".$fila[4]."</td>";
								echo "<td> 
                        			<form action='php/eliminar.php' method='POST'>
                        				<input type='hidden' name='id' value='".$fila["0"]."'>
                        				<input type='hidden' name='nombre' value='".$fila["1"]."'>
                        				<input type='submit' name='eliminar' value='Eliminar' onclick= 'return confirmacion ()'>
                        			</form>
									</td>";
								echo "</tr>";
								echo "<td> 
                        			<form action='php/editar.php' method='POST'>
                        				<input type='hidden' name='id' value='".$fila["0"]."'>
                        				<input type='hidden' name='nombre' value='".$fila["1"]."'>
                        				<input type='hidden' name='edad' value='".$fila["2"]."'>
                        				<input type='hidden' name='estatura' value='".$fila["3"]."'>
                        				<input type='hidden' name='peso' value='".$fila["4"]."'>
                        				<input type='submit' name='modificar' value='Modificar'>
                        			</form>
									</td>";
								echo "</tr>";
							}
							mysqli_close($getconex);
					?>
				</tbody>
			</table>
			<div class="loader" id="loader"></div>
		</main>
	</div>
</body>
</html>