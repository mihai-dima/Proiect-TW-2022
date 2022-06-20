<?php    
ob_end_clean();
require('fpdf/fpdf.php');

header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=AutographCollector-Top.pdf");

$pdf = new FPDF();  
$pdf->AddPage();

$conn = mysqli_connect("localhost", "root", "", "autographcollector");
$domain=mysqli_query($conn,"SELECT DISTINCT Domain FROM autographs");
while($r = mysqli_fetch_object($domain)){   
$result = mysqli_query($conn, "SELECT Personality, Domain,COUNT(ID) as numar FROM autographs WHERE Domain='$r->Domain' GROUP BY Personality, Domain ORDER BY numar DESC");

$pdf->SetFont('Arial', 'B', 17);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(20,12,'Place',1);
$pdf->Cell(30,12,'Domain',1);
$pdf->Cell(75,12,'Personality',1);
$pdf->Cell(70,12,'Number of autographs',1);

$pdf->SetFont('Arial', 'B', 12);
$x=1;
while ($row= mysqli_fetch_object($result)){
    if($x<=10){
       $pdf->Ln();
       $pdf->Cell(20,12, htmlspecialchars($x),1);
       $pdf->Cell(30,12, htmlspecialchars($row->Domain),1);
       $pdf->Cell(75,12, htmlspecialchars($row->Personality),1);
       $pdf->Cell(70,12, htmlspecialchars($row->numar),1);
       $x++;
    }
}
}

$pdf->Output();
?>