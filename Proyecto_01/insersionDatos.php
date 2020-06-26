<?php
	$ap_paterno=$_POST["ap-paterno"];	
	$ap_materno=$_POST['ap-materno'];
	$nombre=$_POST['nombre'];
	$escuela=$_POST[];
	$direccion=$_POST["direccion"];
	$municipio=$_POST["municipio"];
	$cp=$_POST["codigo_postal"];
	$email=$_POST["mail"];
	$fechaNacimiento=$_POST["fecha-nac"];
	$telefono=$_POST["telefono"];
	$celular=$_POST["cel"];
	$promedio=$_POST["prom"];
	$curp=$_POST["curp"];
	$boleta=$_POST["boleta"];
	$estado=$_POST["entidad"]; 

	$query1="INSERT INTO datos VALUES('$nombre','$ap_paterno','$ap_materno','$escuela','$estado','$direccion','$municipio','$cp','$email','$fechaNacimiento','$telefono','$celular','$promedio','$curp','$boleta')"
	$query2="INSERT INTO alumno VALUES('$curp','$boleta')";
	$query3="DELETE FROM alumno WHERE curp='$curp'";
	$query4="INSERT INTO usuario VALUES('$curp','$boleta',false)"

	$conexion=mysqli_connect("localhost","root","57425595","alumnos");
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
		$result=mysqli_query($conexion,$query2);
		if($result)
		{
			$result=mysqli_query($conexion,$query1);
			if($result)
			{
				mysqli_select_db($conexion,"usuarios");
				mysqli_query($conexion,$query4);
				mysqli_close($conexion);
				echo "<script>
					alert('Los datos se han ingresado correctamente');
					window.location='./index.html';
					</script>";
			}
			else
			{
				$result=mysqli_query($conexion,$query3);
				mysqli_close($conexion);
				echo "<script>
					alert('Error en la BD');
					window.location='./index.html';
					</script>";
			}
		}
		else
		{
			mysqli_close($conexion);
			echo "<script>
				alert('Error en la BD');
				window.location='./index.html';
				</script>";
		}
	}
?>