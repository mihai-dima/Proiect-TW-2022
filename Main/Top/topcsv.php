<?php
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=AutographCollector-Top.csv");

echo 'Place in top,Domain,Personality,Number of autograph'."\n";
$conn = mysqli_connect("localhost", "root", "", "autographcollector");
$domain=mysqli_query($conn,"SELECT DISTINCT Domain FROM autographs");
while($r = mysqli_fetch_object($domain)){ 
$result = mysqli_query($conn, "SELECT Personality, Domain,COUNT(ID) as numar FROM autographs WHERE Domain='$r->Domain' GROUP BY Personality, Domain ORDER BY numar DESC");
$x=1;
while ($row = mysqli_fetch_object($result)){
    if($x<=10){
       echo '"'.$x.'",'.htmlspecialchars($row->Domain).','.htmlspecialchars($row->Personality).','.htmlspecialchars($row->numar).''."\n";
       $x++;
    }
}
echo "\n";
}

?>