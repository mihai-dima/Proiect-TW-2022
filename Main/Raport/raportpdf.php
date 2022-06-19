<?php    
ob_end_clean();
require('fpdf/fpdf.php');
  
$pdf = new FPDF();
$pdf->AddPage();

$conn = mysqli_connect("localhost", "root", "", "autographcollector");
$result = mysqli_query($conn, "SELECT Personality, Domain,COUNT(ID) as numar FROM autographs GROUP BY Personality, Domain ORDER BY Domain");

$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(40,12,'Domain',1);
$pdf->Cell(75,12,'Personality',1);
$pdf->Cell(80,12,'Number of autographs',1);

$pdf->SetFont('Arial', 'B', 12);
while ($row= mysqli_fetch_object($result)){
    $pdf->Ln();
    $pdf->Cell(40,12, htmlspecialchars($row->Domain),1);
    $pdf->Cell(75,12, htmlspecialchars($row->Personality),1);
    $pdf->Cell(80,12, htmlspecialchars($row->numar),1);
}

$pdf->Output();
?>