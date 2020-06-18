<?php

//Parametros recibidos del formulario
$user = $_POST["user"];
$password = $_POST["password"];
$id

//Conectandose a la BD
$conexion = mysqli_connect("localhost","usuario","contraseña","usuarios");
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
	//Haciendo la query
	if($consulta = mysqli_prepare($conexion,"SELECT * FROM usuario where user=? and passwd=?"))
	{	
		mysqli_stmt_bind_param($consulta,'ss',$user,$password);
		mysqli_stmt_execute($consulta);
		if(mysqli_stmt_bind_result($consulta,$user,$password,$id))
		{
			mysqli_stmt_fetch($consulta);
			//Existe el usuario
			if($id != 0)
			{
				//El usuario es administrador
				header("");
			}
			else
			{
				//El usuario es no es administrador
				header("");

			}
		}
		else
		{
			//No existe el usuario, regresa a pagina de inicio
			mysqli_stmt_close($conexion);
			mysqli_close($conexion);
			echo "<script>
				alert('El usuario ingresado no existe,verifica tus datos');
				window.location='./index.html';
				</script>";	
		}
	}
	else
	{
		//Hubo un error
		mysqli_stmt_close($conexion);
		mysqli_close($conexion);
		echo "<script>
			alert('Hubo un error al realizar la consulta');
			window.location='./index.html';
			</script>";				
	}
}
?>

