<?php
	session_start();
	$ap_paterno=$_SESSION["ap_paterno"];	
	$ap_materno=$_SESSION['ap_materno'];
	$nombre=$_SESSION['nombre'];
	$escuela=$_SESSION["escuela"];
	$direccion=$_SESSION["direccion"];
	$municipio=$_SESSION["municipio"];
	$cp=$_SESSION["cp"];
	$email=$_SESSION["email"];
	$fechaNacimiento=$_SESSION["fechaNacimiento"];
	$telefono=$_SESSION["telefono"];
	$celular=$_SESSION["celular"];
	$promedio=$_SESSION["promedio"];
	$curp=$_SESSION["curp"];
	$boleta=$_SESSION["boleta"];
	$estado=$_SESSION["estado"]; 
	$query1="INSERT INTO alumno VALUES('$curp','$boleta')";
	$query2="INSERT INTO datos VALUES('$nombre','$ap_paterno','$ap_materno','$escuela','$estado','$direccion','$municipio',$cp,'$email','$fechaNacimiento',$telefono,$celular,$promedio,'$curp','$boleta')";
	$query3="INSERT INTO usuario VALUES('$curp','$boleta',false)";
	$query4="DELETE FROM usuario WHERE user='$curp'";
	$query5="DELETE FROM alumno WHERE curp='$curp'";
	session_destroy();
	$conexion=mysqli_connect("localhost","root","57425595","alumnos");
	if(!$conexion)
	{
		mysqli_close($conexion);
		echo "<script>
				alert('Error al conectarse a la Base de Datos');
				</script>";
	}
	else
	{	
		$result=mysqli_query($conexion,$query1);
		if($result)
		{
			$result=mysqli_query($conexion,$query2);
			if($result)
			{
				mysqli_select_db($conexion,"usuarios");
				mysqli_query($conexion,$query3);
				mysqli_close($conexion);
				echo "<script>
					alert('Los datos se han ingresado correctamente');
					location.href='./inicioSesion.html';
					</script>";
			}
			else
			{
				$result=mysqli_query($conexion,$query4);
				mysqli_select_db($conexion,"alumnos");
				$result=mysqli_query($conexion,$query5);
				mysqli_close($conexion);
				echo "<script>
					alert('Error en la BD');
					location.href='./inicioSesion.html';
					</script>";
			}
		}
		else
		{
			mysqli_close($conexion);
			echo "<script>
				alert('Error en la BD');
				location.href='./inicioSesion.html';
				</script>";
		}
	}
?>