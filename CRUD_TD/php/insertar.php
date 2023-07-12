<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

	if (isset($_POST["registrar"])) 
	{
		$nombre = $_POST["nombre"];
		$edad = $_POST["edad"];
		$estatura = $_POST["estatura"];
		$peso = $_POST["peso"];

		$query = "INSERT INTO  datospersonales (Nombre,Edad,Estatura,Peso) VALUES(?,?,?,?)";
		$sentencia = mysqli_prepare($getconex,$query);
		mysqli_stmt_bind_param($sentencia,"siddi",$nombre,$edad,$estatura,$peso,);
		mysqli_stmt_execute($sentencia);
		$afectado = mysqli_stmt_affected_rows($sentencia);
		if ($afectado == 1) 
		{
			echo "<script>alert('El pedido de [$nombre] ha sido registrado'); location.href='../index.php';</script>";
		}else 
		{
			echo "<script>alert('El pedido de [$nombre] no pudo ser registrado'); location.href='../index.php';</script>";
		}
		mysqli_stmt_close($sentencia);
		mysqli_close($getconex);

	}

?>