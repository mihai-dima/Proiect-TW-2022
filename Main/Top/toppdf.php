<?php    
ob_end_clean();

require('fpdf/fpdf.php');

header('Content-Type: application/pdf');
 
header('Content-Disposition: attachment; filename="gfgpdf.pdf"');
  
$pdf = new FPDF();
  
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 18);

$conn = mysqli_connect("localhost", "root", "", "autographcollector");
$result = mysqli_query($conn, "SELECT * FROM autographs");
$nr= mysqli_query($conn, "SELECT COUNT(*) FROM autographs");

$pdf->Cell(40,12,'Domain',1);
$pdf->Cell(40,12,'Personality',1);
$pdf->Cell(80,12,'Number of autographs',1);

while ($row = mysqli_fetch_object($result)){
    $pdf->Ln();
    $pdf->Cell(40,12, htmlspecialchars($row->DomainID),1);
    $pdf->Cell(40,12, htmlspecialchars($row->PersonalityID),1);
    $pdf->Cell(80,12, htmlspecialchars( $row->Object),1);
}

$pdf->Output();

?>