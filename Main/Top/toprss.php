<?php
 
$domain=$_GET['domain'];
$web_url = "http://localhost/Proiect-TW-2022/Main/ranking.php";
 
$str = "<?xml version='1.0' ?>";
$str .= "<rss version='2.0'>";
    $str .= "<channel>";
        $str .= "<title>Autograph Collector</title>";
        $str .= "<language>en-US</language>";
        $str .= "<link>$web_url</link>";
        $str .= "<description>Top autograps by domain, where the domain is '$domain'</description>";

 
        $conn = mysqli_connect("localhost", "root", "", "autographcollector");
        $result = mysqli_query($conn, "SELECT Personality, Domain,COUNT(ID) as numar FROM autographs WHERE Domain='$domain' GROUP BY Personality, Domain ORDER BY numar DESC");
        $x=1;
      
        while ($row = mysqli_fetch_object($result))
        {
            if($x <= 10){
            $str .= "<item>";
                $str .= "<description>Place in top: " .$x."</description>";
                $str .= "<title>" . htmlspecialchars($row->Personality) . "</title>";
                $str .= "<description>Number of autographs: " .htmlspecialchars($row->numar). "</description>";
            $str .= "</item>";
            $x++;
            }
        }
 
    $str .= "</channel>";
$str .= "</rss>";
 
file_put_contents("rss.xml", $str);
header("Location: rss.xml");
?>
