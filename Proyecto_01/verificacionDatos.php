<?php
//datos
$ap_paterno=$_POST["ap-paterno"];	
$ap_materno=$_POST['ap-materno'];
$nombre=$_POST['nombre'];
if(!isset($_POST['esc-proc']) || $_POST['esc-proc']=="otra")
{
	$escuela=$_POST['otra-esc'];
}
else
{
	$escuela=$_POST['esc-proc'];
}
$direccion=$_POST["direccion"];
$municipio=$_POST["municipio"];
$cp=$_POST["codigo_postal"];
$email=$_POST["mail"];
$fechaNacimiento=$_POST["fech-nac"];
$telefono=$_POST["telefono"];
$celular=$_POST["cel"];
$promedio=$_POST["prom"];
$curp=$_POST["curp"];
$boleta=$_POST["boleta"];
$estado=$_POST["entidad"];
//conexion a la BD

$conexion = mysqli_connect("localhost","root","57425595","alumnos");
if(!$conexion)
{
	mysqli_close($conexion);
	echo "<script>
			alert('Error al conectarse a la Base de Datos');
			window.location='./index.html';
			</script>";
}
else
{
	if($consulta = mysqli_prepare($conexion,"SELECT curp,boleta,email FROM datos where curp=? or boleta=? or email=?"))
	{
		mysqli_stmt_bind_param($consulta,'sss',$curp,$boleta,$email);
		if(mysqli_execute($consulta))
		{
			mysqli_stmt_bind_result($consulta,$curp_temp,$boleta_temp,$email_temp);
			mysqli_stmt_fetch($consulta);
			if($curp == $curp_temp)
			{	
				mysqli_stmt_close($consulta);
				mysqli_close($conexion);
				echo "<script>
						alert('Hay un usuario registrado con la misma CURP');
						window.location='./index.html';
						</script>";
			}
			else if($boleta == $boleta_temp)
			{
				mysqli_stmt_close($consulta);
				mysqli_close($conexion);
				echo "<script>
						alert('Hay un usuario registrado con la misma boleta');
						window.location='./index.html';
						</script>";	
			}	
			else if($email == $email_temp)
			{
				mysqli_stmt_close($consulta);
				mysqli_close($conexion);
				echo "<script>
						alert('Hay un usuario registrado con el mismo email');
						window.location='./index.html';
						</script>";
			}
			else
			{
				mysqli_stmt_close($consulta);
				mysqli_close($conexion);
				session_start();
				$_SESSION["ap_paterno"]=$ap_paterno;
				$_SESSION["ap_materno"]=$ap_materno;
				$_SESSION["nombre"]=$nombre;
				$_SESSION["escuela"]=$escuela;
				$_SESSION["direccion"]=$direccion;
				$_SESSION["municipio"]=$municipio;
				$_SESSION["cp"]=$cp;
				$_SESSION["email"]=$email;
				$_SESSION["fechaNacimiento"]=$fechaNacimiento;
				$_SESSION["telefono"]=$telefono;
				$_SESSION["celular"]=$celular;
				$_SESSION["promedio"]=$promedio;
				$_SESSION["curp"]=$curp;
				$_SESSION["boleta"]=$boleta;
				$_SESSION["estado"]=$estado;
				header("Location:./insersionDatos.php");

			}
		}
		else
		{
			mysqli_stmt_close($consulta);
			mysqli_close($conexion);
			echo "<script>
					alert('Hubo un error al verificar tus datos');
					</script>";	
		}
	}
	else
	{
		mysqli_close($conexion);
		echo "<script>
				alert('Hubo un error al verificar tus datos');
				window.location='./index.html';
				</script>";
	}
}
?>