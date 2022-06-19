<?php
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=AutographCollector-Raport.csv");
echo 'Domain,Personality,Number of autograph'."\n";
$conn = mysqli_connect("localhost", "root", "", "autographcollector");
$result = mysqli_query($conn, "SELECT Personality, Domain,COUNT(ID) as numar FROM autographs GROUP BY Personality, Domain ORDER BY Domain");

while ($row = mysqli_fetch_object($result)){
    echo ''.htmlspecialchars($row->Domain).','.htmlspecialchars($row->Personality).','.htmlspecialchars($row->numar).''."\n";
}

?>