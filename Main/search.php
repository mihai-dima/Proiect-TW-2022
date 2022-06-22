<?php

// $data ="k";

// if(isset($_GET['q'])){
//     $data=$_GET['q'];
// }
// $db=new mysqli('localhost','root','',"autographcollector");
// $x="SELECT * FROM autographs WHERE Personality like '%$data%'";
$data=$_GET['q'];
$conn = mysqli_connect("localhost", "root", "", "autographcollector");
$result = mysqli_query($conn, "SELECT * FROM autographs WHERE Personality like '%$data%' ");

// $y=$db->query($x);

// if($y){
//     $z=$y->fetch_assoc();
//     echo " <h1> ".$z['Personality']."</h1>";
// }

while($row = $result->fetch_assoc()) {
    // echo "<h1> ".htmlspecialchars(row->Personality).
    echo ''.htmlspecialchars($row->Personality).'';
}

?> 