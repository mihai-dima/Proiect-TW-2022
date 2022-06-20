<?php
 
$web_url = "http://localhost/Proiect-TW-2022/Main/ranking.php";
 
$str = "<?xml version='1.0' ?>";
$str .= "<rss version='2.0'>";
    $str .= "<channel>";
        $str .= "<title>Autograph Collector</title>";
        $str .= "<description>Site for autograph collectors</description>";
        $str .= "<language>en-US</language>";
        $str .= "<link>$web_url</link>";
 
        $conn = mysqli_connect("localhost", "root", "", "autographcollector");
        $result = mysqli_query($conn, "SELECT Personality, Domain,COUNT(ID) as numar FROM autographs GROUP BY Personality, Domain ORDER BY Domain");
      
        while ($row = mysqli_fetch_object($result))
        {
            $str .= "<item>";
                $str .= "<description> Domain: " . htmlspecialchars($row->Domain) . "</description>";
                $str .= "<title>" . htmlspecialchars($row->Personality) . "</title>";
                $str .= "<description> Number of autographs: " . htmlspecialchars($row->numar) . "</description>";
            $str .= "</item>";
        }
 
    $str .= "</channel>";
$str .= "</rss>";
 
file_put_contents("rss.xml", $str);
header("Location: rss.xml");
?>
