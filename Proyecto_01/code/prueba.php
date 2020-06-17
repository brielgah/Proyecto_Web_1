<?php
   /* Clase fpdf */

    include("./fpdf182/fpdf.php"); 
	
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica','B',20);
    $pdf->Cell(40,20,'Hola Mundo con FPDF!');
    $pdf->Output();
?>