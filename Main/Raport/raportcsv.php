<?php
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=AutographCollector-Raport.csv");
echo 'Domain,Personality,Number of autograph'."\n";
$conn = mysqli_connect("localhost", "root", "", "autographcollector");
$result = mysqli_query($conn, "SELECT * FROM autographs");

while ($row = mysqli_fetch_object($result)){
    echo ''.htmlspecialchars($row->DomainID).','.htmlspecialchars($row->PersonalityID).','.htmlspecialchars($row->ID).''."\n";
}

// for ($x = 0; $x <= 10; $x++) {
// echo '"'.$x.'",domeniul,celebritate,numar'."\n";
// }
?>