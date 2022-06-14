<?php    
ob_end_clean();
require('fpdf/fpdf.php');

header('Content-Type: application/pdf');
 
header('Content-Disposition: attachment; filename="gfgpdf.pdf"');
  
$pdf = new FPDF();
  
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 18);

$pdf->Cell(60,20,'Raport');

$pdf->Output();

?>