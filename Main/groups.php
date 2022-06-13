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
    <link rel="stylesheet" href="styleMain.css" >
</head>
<body>
<?php include "homeBody.html"; ?>
    <!------------------main-content------------------->
     <div class="main-content">
       <div class="custom-select">
           <select> <!--le preluam din baza de date, vor fi predefinite acolo -->
             <option value="0">Select domain</option>
             <option value="1">Music</option>
             <option value="2">Sport</option>
             <option value="3">Policy</option>
             <option value="4">Art</option>
             <option value="5">Instagram Influencers</option>
           </select>
       </div>
    </div>
    <!-------------------right-sidebar----------------->
     <div class="right-sidebar">

     </div>
</div> <!--container-->
<script src="script.js"></script>
</body>
</html>