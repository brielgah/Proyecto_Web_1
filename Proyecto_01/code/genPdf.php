<?php
require_once('./LatexTemplate.php');
// Conexión con la BD, la info del alumno debe ser guardada en data
/*
try{
    LatexTemplate::download($data,'template.tex',$data['boleta'] . ".pdf");
}catch(Exception $e){
    echo $e -> getMessage();
}*/

$data = array(
		'nombre' => 'Esteban Olmedo',
		'boleta' => '2019630134',
		'direccion' => 'Francisco Villa Lt. 13 Mz. 1',
		'escproc' => 'CECyT 3'
);
try {
	LatexTemplate::download($data, 'genPdf.tex', 'ejemplo.pdf');
} catch(Exception $e) {
	echo $e -> getMessage();
}
?>
