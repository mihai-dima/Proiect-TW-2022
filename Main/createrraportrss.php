<?php
 
$web_url = "http://localhost/Proiect-TW-2022/Main/ranking.php";
 
$str = "<?xml version='1.0' ?>";
$str .= "<rss version='2.0'>";
    $str .= "<channel>";
        $str .= "<title>My website</title>";
        $str .= "<description>My website</description>";
        $str .= "<language>en-US</language>";
        $str .= "<link>$web_url</link>";
 
        $conn = mysqli_connect("localhost", "root", "", "autographcollector");
        $result = mysqli_query($conn, "SELECT * FROM autographs");
 
        while ($row = mysqli_fetch_object($result))
        {
            $str .= "<item>";
                $str .= "<title>" . htmlspecialchars($row->productName) . "</title>";
                $str .= "<description>" . htmlspecialchars($row->productDescription) . "</description>";
                $str .= "<link>" . $web_url . "/product.php?id=" . $row->productCode . "</link>";
            $str .= "</item>";
        }
 
    $str .= "</channel>";
$str .= "</rss>";
 
file_put_contents("rss.xml", $str);
header("Location: rss.xml");
?>
