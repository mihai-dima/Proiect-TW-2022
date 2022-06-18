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
        $result = mysqli_query($conn, "SELECT * FROM autographs");
 
        while ($row = mysqli_fetch_object($result))
        {
            $str .= "<item>";
                $str .= "<description>" . htmlspecialchars($row->DomainID) . "</description>";
                $str .= "<title>" . htmlspecialchars($row->PersonalityID) . "</title>";
                $str .= "<description>" . htmlspecialchars($row->Object) . "</description>";
            $str .= "</item>";
        }
 
    $str .= "</channel>";
$str .= "</rss>";
 
file_put_contents("rss.xml", $str);
header("Location: rss.xml");
?>
 