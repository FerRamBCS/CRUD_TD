<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MODIFICACION DE DATOS</title>
</head>
<body>
	<?php
        $id = $_POST["id"];
		$nombre = $_POST["nombre"];
		$edad = $_POST["edad"];
		$estatura = $_POST["estatura"];
		$peso = $_POST["peso"];

	if (isset($_POST["editar2"])) 
	{
		include("conexion.php");
		$getmysql = new mysqlconex();
		$getconex = $getmysql->conex();

		$query = "UPDATE datospersonales set nombre = ?, edad = ?, estatura = ?, peso = ? WHERE id = ?";
		$sentencia = mysqli_prepare($getconex,$query);
		mysqli_stmt_bind_param($sentencia,"siddi",$nombre,$edad,$estatura,$peso,$id);
		mysqli_stmt_execute($sentencia);
		$afectado = mysqli_stmt_affected_rows($sentencia);


		if ($afectado == 1) 
		{
			echo "<script>alert('El pedido de [$nombre] ha sido modificado'); location.href='../index.php';</script>";
		}else 
		{
			echo "<script>alert('El pedido de [$nombre] no pudo ser modificado'); location.href='../index.php';</script>";
		}
		mysqli_stmt_close($sentencia);
		mysqli_close($getconex);
	}


	?>
	<form action="editar.php" class="formulario" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>">
        <label for="nombre"></label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                <label for="edad"></label>
                <input type="text" name="edad" id="edad" placeholder="Edad" required>
                <label for="estatura"></label>
                <input type="text" name="estatura" id="estatur" placeholder="Estatura" required>
                <label for="peso"></label>
                <input type="text" name="peso" id="peso" placeholder="Peso" required>
				<input type="submit" name="editar2" value="Registrar">
	</form>
</body>
</html>