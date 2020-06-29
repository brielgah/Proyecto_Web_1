<?php
require_once('./LatexTemplate.php');
// Conexión con la BD, la info del alumno debe ser guardada en data
/*

try{
    LatexTemplate::download($data,'template.tex',$data['boleta'] . ".pdf");
}catch(Exception $e){
    echo $e -> getMessage();
}*/
if(isset($_GET["boleta"]))
{
    $boleta=$_GET["boleta"];
}
else
{
    session_start();
    $boleta=$_SESSION["password"];
}
$query1="SELECT * FROM datos WHERE boleta=?";
$conexion=mysqli_connect("localhost","root","57425595","alumnos");
if(!$conexion)
{
	echo "<script>
			alert('Error al conectarse a la Base de Datos');
			window.location='./index.html';
			</script>";
}
else
{
	if($consulta=mysqli_prepare($conexion,$query1))
    {
        mysqli_stmt_bind_param($consulta,'s',$boleta);
        if(mysqli_stmt_execute($consulta))
        {
            mysqli_stmt_bind_result($consulta,$nombre,$ap_paterno,$ap_materno,$escuela,$estado,$direccion,$municipio,$cp,$email,$fechaNacimiento,$telefono,$celular,$promedio,$curp,$boleta);
            mysqli_stmt_fetch($consulta);
        }
        else
        {
            mysqli_stmtm_close($consulta);
            mysqli_close($conexion);
            echo "<script>
                alert('Hubo un error al realizar la consulta');
                window.location='./index.html';
                </script>"; 
        }
    }
}
$nombreCompleto = $ap_paterno." ".$ap_materno." ".$nombre;
$direccionCompleta= $direccion." ".$municipio." CP:".$cp;
$data = array(
		'nombre' => $nombreCompleto,
		'boleta' => $boleta,
		'direccion' => $direccionCompleta,
        'escproc' => $escuela,
        'curp' => $curp,
        'fechaNacimiento' => $fechaNacimiento,
        'celular' => $celular
);
try {
	LatexTemplate::download($data, 'genPdf.tex', 'ejemplo.pdf');
} catch(Exception $e) {
	echo $e -> getMessage();
}
?>
