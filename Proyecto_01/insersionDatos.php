<?php
	$nombre=".$_POST["ap-paterno"]." ".$_POST["ap-materno"]." ".$_POST["nombre"].";	
	$escuela=".$_POST[].";
	$direccion=".$_POST["direccion"]." ".$_POST["municipio"]." CP:".$_POST["codigo_postal"]".;
	$email=".$_POST["mail"].";
	$fechaNacimiento=".$_POST["fecha-nac"].";
	$telefono=$_POST["telefono"];
	$celular=$_POST["cel"];
	$promedio=$_POST["prom"];
	$curp=".$_POST["curp"].";
	$boleta=".$_POST["boleta"].";
	$estado=".$_POST["entidad"]."; 

	$query1="INSERT INTO datos VALUES('$nombre','$escuela','$direccion','$email','$fechaNacimiento',$telefono,$celular,$promedio,'curp','boleta','estado')"
	$query2="INSERT INTO alumno VALUES('$curp','$boleta')";
	$query3="DELETE FROM alumno WHERE curp=$curp"


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
				mysqli_close($conexion);
				echo "<script>
					alert('Tus datos se han ingresado correctamente');
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