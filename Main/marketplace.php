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
      <div class="exchanges">
        <?php
          require_once 'exchanges.php';
        ?>
      </div>
    </div>

      <!-------------------right-sidebar-----------------> 
      <div class="right-sidebar">

</div>
    
    </div> <!--container-->
    <script src="script.js"></script>
</body>

</html>