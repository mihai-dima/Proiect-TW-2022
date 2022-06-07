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

<nav>
    <div class="nav-left"> 
        <img src="../images/logo.png" class="logo">
        <ul>
            <li><img src="../images/notificari.png"></li>
           <!-- <li><img src="images/myaccount.jpg"></li> -->
            <li><img src="../images/home.png" onclick="window.location.href = 'autographCollector.html';"></li>
        </ul>
    </div>
    <div class="nav-right">
         <div class="search-box">
              <img src="../images/search.png">
              <input type="text" placeholder="Search">
              <!--ajax cautare autografe dupa nume domeniu/nume autor -->
         </div>

         <div class="nav-user-icon" onclick="menuSettings()">
             <img src="../images/myaccount.jpg">
         </div>
    </div>

    <!-------------settings-menu----------------->
    <div class="settings-menu">
        <div class="settings-menu-inner">
          <div class="user-profile">
              <img src="../images/seeAccount.png" class="seeAcount-icon" >
              <a href="#" onclick="window.location.href = '../MyAccount/myAccount.php';">See your profile</a>
          </div>
          <hr>
          <div class="settings-links">
              <img src="../images/logout.png" alt="Logout-image" class="logout-icon">
              <!--a href="#" onclick="window.location.href = '../LoginAndSign-up/login.php';">Logout <img src="../images/arrow.png" width="6px"></a-->
              <form action="../includes/logout.php" method="post">
              <button type="submit" name="logout"> Logout <img src="../images/arrow.png" alt="Arrow-image" width="6px">
          </div>
        </div>
    </div>

</nav>

<div class="container">
    <!------------------left-sidebar------------------->
     <div class="left-sidebar">
           <div class="imp-links">
               <a href="#"><img src="../images/marketplace.png"> Marketplace </a>
               <a href="#"><img src="../images/grup.png"> Group </a>
               <a href="#"><img src="../images/top.webp"> Ranking </a>
            </div>
     </div>
    <!------------------main-content------------------->
     <div class="main-content">

     </div>
    <!-------------------right-sidebar----------------->
     <div class="right-sidebar">

     </div>
</div>
<script src="script.js"></script>
</body>
</html>