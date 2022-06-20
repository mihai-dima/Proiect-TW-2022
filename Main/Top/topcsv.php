<?php
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=AutographCollector-Top.csv");
$domain=$_GET['domain'];
echo 'Place in top,Domain,Personality,Number of autograph'."\n";
$conn = mysqli_connect("localhost", "root", "", "autographcollector");
$result = mysqli_query($conn, "SELECT Personality, Domain,COUNT(ID) as numar FROM autographs WHERE Domain='$domain' GROUP BY Personality, Domain ORDER BY numar DESC");
$x=1;
while ($row = mysqli_fetch_object($result)){
    if($x<=10){
       echo '"'.$x.'",'.htmlspecialchars($row->Domain).','.htmlspecialchars($row->Personality).','.htmlspecialchars($row->numar).''."\n";
       $x++;
    }
}

?>