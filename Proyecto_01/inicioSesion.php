<?php
//Parametros recibidos del formulario
$user = $_POST["user"];
$password = $_POST["password"];
//Conectandose a la BD
if(empty($user))
{
	echo "entra";
	echo "<script>
		alert('Debes ingresar un usuario y contraseña');
		window.location='./inicioSesion.html';
		</script>";	
}

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
<<<<<<< HEAD
		if(mysqli_stmt_execute($consulta))
		{
			mysqli_stmt_bind_result($consulta,$usuario,$contraseña,$id);
			mysqli_stmt_fetch($consulta);			
			//Existe el usuario
			if($usuario == $user)
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
					alert('El usuario o la contraseña son incorrectos');
					window.location='./inicioSesion.html';
					</script>";			
=======
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

>>>>>>> 80fc4df7c94730bc0838af9419336228fc42afa1
			}
		}
		else
		{
<<<<<<< HEAD
			mysqli_stmt_close($conexion);
			mysqli_close($conexion);
			echo "<script>
				alert('Hubo un error al realizar la consulta');
=======
			//No existe el usuario, regresa a pagina de inicio
			mysqli_stmt_close($conexion);
			mysqli_close($conexion);
			echo "<script>
				alert('El usuario ingresado no existe,verifica tus datos');
>>>>>>> 80fc4df7c94730bc0838af9419336228fc42afa1
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
<<<<<<< HEAD
?>
=======
?>

>>>>>>> 80fc4df7c94730bc0838af9419336228fc42afa1
