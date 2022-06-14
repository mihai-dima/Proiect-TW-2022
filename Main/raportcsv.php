<?php
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=AutographCollector-Raport.csv");
echo '"Domeniul","Celebritate","numar"'."\n";
for ($x = 0; $x <= 10; $x++) {
echo '"'.$x.'",domeniul,celebritate,numar'."\n";
}
?>