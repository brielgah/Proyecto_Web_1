<?php
//datos
$nombre = $_POST["nombre"];
$ap_paterno = $_POST["ap_paterno"];
$ap_materno = $_POST["ap_materno"];
$boleta = $_POST["boleta"];
$fecha_nac = $_POST["fecha_nac"];
$curp = $_POST["curp"];
$entidad = $_POST["entidad"];
$mail = $_POST["mail"];
$telefono = $_POST["telefono"];
$cel = $_POST["cel"];
$direccion = $_POST["direccion"];
$municipio = $_POST["municipio"];
$cp = $_POST["codigo_postal"];
$escuela = $_POST["esc-proc"];
$prom = $_POST["prom"];


echo "Entra";
//conexion a la BD
$conexion = mysqli_connect("localhost","root","57425595","usuarios");
if(!conexion)
{
	mysqli_close($conexion);
	echo "<script>
			alert('Error al conectarse a la Base de Datos');
			window.location='./index.html';
			</script>";
}
else
{
	if($consulta = mysqli_prepare($conexion,"SELECT * FROM datos where curp=? or boleta=? or email=?"))
	{
		mysqli_stmt_bind_param($consulta,'ss',$curp,$boleta,$email);
		if(mysqli_execute($consulta))
		{
			mysqli_stmt_bind_result($consulta,$curp_temp,$boleta_temp,$email_temp);
			mysqli_stmt_fetch($consulta);
			if($curp == $curp_temp)
			{	
				mysqli_stmt_close($conexion);
				mysqli_close($conexion);
				echo "<script
						alert('Hay un usuario registrado con la misma CURP');
						window.location='./index.html';
						<script>";
			}
			else if($boleta == $boleta_temp)
			{
				mysqli_stmt_close($conexion);
				mysqli_close($conexion);
				echo "<script
						alert('Hay un usuario registrado con la misma boleta');
						window.location='./index.html';
						<script>";	
			}	
			else if($email == $email_temp)
			{
				mysqli_stmt_close($conexion);
				mysqli_close($conexion);
				echo "<script
						alert('Hay un usuario registrado con el mismo email');
						window.location='./index.html';
						<script>";
			}
			else
			{
				mysqli_stmt_close($conexion);
				mysqli_close($conexion);
				echo "entra";
				header('Location: ./index.html');
			}
		}
		else
		{
			mysqli_stmt_close($conexion);
			mysqli_close($conexion);
			echo "<script>
					alert('Hubo un error al verificar tus datos');
					window.location='./index.html';
					</script>";	
		}
	}
	else
	{
		mysqli_stmt_close($conexion);
		mysqli_close($conexion);
		echo "<script>
				alert('Hubo un error al verificar tus datos');
				window.location='./index.html';
				</script>";
	}
}

?>