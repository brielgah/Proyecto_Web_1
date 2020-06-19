<?php
//Parametros recibidos del formulario
$user = $_POST["user"];
$password = $_POST["password"];
//Conectandose a la BD
$conexion = mysqli_connect("localhost","root","57425595","usuarios");
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
		if(mysqli_stmt_execute($consulta))
		{
			mysqli_stmt_bind_result($consulta,$user,$password,$id);
			mysqli_stmt_fetch($consulta);
			//Existe el usuario
			if(!mysqli_stmt_num_rows($consulta))
			{
				if($id != 0)
				{	
					//El usuario es administrador
					echo "administrador";
				}
				else
				{
					//El usuario es no es administrador
					echo "usuario";

				}
			}
			else
			{
				//No existe el usuario, regresa a pagina de inicio sesion
				mysqli_stmt_close($conexion);
				mysqli_close($conexion);
				echo "<script>
					alert('No existe el usuario o los datos ingresados son incorrectos');
					window.location='./inicioSesion.html';
					</script>";				
			}
		}
		else
		{
			mysqli_stmt_close($conexion);
			mysqli_close($conexion);
			echo "<script>
				alert('Hubo un error al realizar la consulta');
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