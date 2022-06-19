<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Autograph Collector</title>
    <link rel="stylesheet" href="styleMain.css">
</head>

<body>
    <?php include "homeBody.html"; ?>
      <!------------------main-content------------------->
    <div class="main-content">
        
    </div>
    
      <!-------------------right-sidebar-----------------> 
      <div class="right-sidebar">
          <div class="reports">
             <h3>Download collection reports: </h3>
             <button class="button rss" onclick="window.location.href = '../Main/Raport/raportrss.php';">RSS</button>
             <button class="button csv" onclick="window.location.href = '../Main/Raport/raportcsv.php';">CSV</button>
             <button class="button pdf" onclick="window.location.href='../Main/Raport/raportpdf.php';">PDF</button>
          </div>
          <div class="ranking">
             <h3>Download rankings: </h3>
             <button class="button rss" onclick="window.location.href = '../Main/Top/toprss.php?domain=Sport';">RSS</button>
             <button class="button csv" onclick="window.location.href = '../Main/Top/topcsv.php?domain=Sport';">CSV</button>
             <button class="button pdf" onclick="window.location.href = '../Main/Top/toppdf.php?domain=Sport';">PDF</button>
          </div>
       </div>

    </div> <!--container-->
    <script src="script.js"></script>

</body>

</html>