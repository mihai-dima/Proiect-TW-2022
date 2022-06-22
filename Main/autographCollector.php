<?php
session_start();
require_once '../includes/connDB.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Autograph Collector</title>
    <link rel="stylesheet" href="styleAutographs.css">
    <link rel="stylesheet" href="feedAutographs.css">
</head>

<body>
    <?php require_once("homeBody.html"); ?>
    <!--main-content-->
    <div class="main-content">
        <div id="autographs">
        </div>

        <?php
            require_once 'feed-autographs.php';
        ?>
    </div>
    <!--right-sidebar
    <div class="right-sidebar">

    </div>-->
    </div> 
    <script src="script.js"></script>
</body>
</html>