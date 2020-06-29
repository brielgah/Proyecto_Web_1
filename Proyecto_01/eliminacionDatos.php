<?php
	$bol=$_GET['boleta'];
	$query1="DELETE FROM datos WHERE boleta='$bol'";
	$query2="DELETE FROM alumno WHERE boleta='$bol'";
	$query3="DELETE FROM usuario WHERE passwd='$bol'";

	$conexion=mysqli_connect("localhost","root","57425595","alumnos");
	if(!$conexion)
	{
		mysqli_close($conexion);
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
				mysqli_select_db($conexion,"usuarios");
				$result=mysqli_query($conexion,$query3);
				if($result)
				{
					mysqli_close($conexion);
					echo "<script>
					alert('Se ha eliminado correctamente el alumno');
					location.href='./sesionAdmin.php'
					</script>";
				}
				else
				{
					mysqli_close($conexion);
					echo "<script>
					alert('Error en la BD');
					location.href='./sesionAdmin.php'
					</script>";		
				}
				
			}
			else
			{
				mysqli_close($conexion);
				echo "<script>
					alert('Error en la BD');
					location.href='./sesionAdmin.php'
					</script>";
			}
		}
		else
		{
			mysqli_close($conexion);
			echo "<script>
				alert('Error en la BD');
				location.href='./sesionAdmin.php'
				</script>";
		}
	}
	session_destroy();
?>