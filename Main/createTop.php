
<?php 
include "ranking.php";
?>
<div class="toptitle">
    <h2>Top 10: </h2>

</div>
<table class="tabletop">
<tr>
<th>Place in top</th>
<th>Personality</th>
<th>Number of autographs</th>
</tr>
<?php
$domain=$_GET['domain'];
$conn = mysqli_connect("localhost", "root", "", "autographcollector");
$result = mysqli_query($conn, "SELECT Personality, Domain,COUNT(ID) as numar FROM autographs WHERE Domain='$domain' GROUP BY Personality, Domain ORDER BY numar DESC");

$x=1;
while($row = $result->fetch_assoc()) {
    if($x<=10){
       echo "<tr><td>" . $x. "</td><td>" . $row["Personality"] . "</td><td>"
       . $row["numar"]. "</td></tr>";
       $x++;
    }
}

$conn->close();
?>
</table>

</body> 
 </html>