<?php
    session_start();
?>
<?php require "homeBody.php"; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <?php include "homeBody.php"; ?>

<div class="container">
  <!------------------left-sidebar------------------->
      <div class="left-sidebar">
           <div class="imp-links">
               <a href="#"><img src="../images/marketplace.png"> Marketplace </a>
               <a href="#" onclick="window.location.href = '../Main/groups.php';"><img src="../images/grup.png"> Groups </a>
               <a href="#"><img src="../images/top.webp"> Ranking </a>
            </div>
     </div>

    <!------------------main-content------------------->
     <div class="main-content">
       <div class="custom-select">
           <select>
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
</div>
<script src="script.js"></script>
</body>
</html>