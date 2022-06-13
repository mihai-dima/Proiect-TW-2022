<?php
session_start();
//require_once "homeBody.html";
?>
<!DOCTYPE html>
<html>
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
    <?php include("homeBody.html"); ?>
    <!------------------main-content------------------->
    <div class="main-content">
        <div id="feed">
            <input type="button" onclick="feed_fill()" value="Display">
        </div>

        <script id="feeed">
            function feed_fill() {
                var div = document.createElement('div');

                // Set some attributes
                div.style.width = '200px';
                div.style.height = '200px';
                div.style.backgroundColor = 'red';
                const textnode = document.createTextNode("Water");
                div.appendChild(textnode);
                // Append the div to the body
                document.getElementById("feed").appendChild(div);
            }
        </script> 

        <?php
        require_once '../includes/connDB.php';

        //$sql = "SELECT * FROM AUTOGRAPHS";
        //$result = mysqli_query($conn, $sql);
        //$num_rows = mysqli_num_rows($result);

        for ($index = 1; $index <= 5; $index++) {
            //echo 'merge ';
            echo '<script id="feeed"> feed_fill(); </script>';
        }
        ?>
    </div>
    </div>
    </div>
    <!-------------------right-sidebar----------------->
    <div class="right-sidebar">

    </div>
    </div>
    <script src="script.js"></script>
</body>

</html>