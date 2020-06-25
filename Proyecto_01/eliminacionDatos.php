<?php
	$bol=$_GET['boleta'];
	$query1="DELETE FROM datos WHERE boleta='$bol'";
	$query2="DELETE FROM alumno WHERE boleta='$bol'";

	$conexion=mysqli_connect("localhost","root","57425595","alumnos");
	if(!$conexion)
	{
		echo "<script>
				alert('Error al conectarse a la Base de Datos');
				location.href='./sesionAdmin.php'
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
				echo "<script>
					alert('Se ha eliminado correctamente el alumno');
					location.href='./sesionAdmin.php'
					</script>";
			}
			else
			{
				echo "<script>
					alert('Error en la BD');
					location.href='./sesionAdmin.php'
					</script>";
			}
		}
		else
		{
			echo "<script>
				alert('Error en la BD');
				location.href='./sesionAdmin.php'
				</script>";
		}
	}
	mysqli_close($conexion);

?>