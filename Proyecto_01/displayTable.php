<?php
$con=mysqli_connect("localhost", "root", "57425595", "alumnos");
$consulta="SELECT * FROM datos ORDER BY boleta";    
if(!$con){
    mysqli_close($con);
		echo "<script>
				alert('Error al conectarse a la Base de Datos');
				window.location='./index.html';
				</script>";
}
else{
    $result=mysqli_query($con,$consulta);
    if(!$result){
        mysqli_close($con);
		echo "<script>
				alert('Error al conectarse a la Base de Datos');
				window.location='./index.html';
				</script>";
    }
}
mysqli_close($con);
?>