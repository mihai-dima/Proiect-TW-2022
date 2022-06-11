<?php
    include_once '../includes/connDB.php';
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Autograph Collector/Profile</title>
<link rel="stylesheet" href="styleMyAccount.css" >
</head>
<body>

<nav>
    <div class="nav-left"> 
        <img src="../images/logo.png" class="logo">
        <ul>
            <li><img src="../images/notificari.png"></li>
            <li><img src="../images/home.png" onclick="window.location.href = 'autographCollector.html';"></li> 
        </ul>
    </div>
    <div class="nav-right">
         <div class="search-box">
              <img src="../images/search.png">
              <input type="text" placeholder="Search">
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
              <a href="#">See your profile</a>
          </div>
          <hr>
          <div class="settings-links">
              <img src="../images/logout.png" class="logout-icon">
              <a href="#"  onclick="window.location.href = '../LoginAndSign-up/login.html';">Logout <img src="../images/arrow.png" width="6px"></a>
          </div>
        </div>
    </div>

</nav>


<!----------------------Profile-page------------->

<div class="profile-container">
    <img src="../images/cover.png" class="cover-img" >
    <div class="profile-details">
        <div class="pd-left">
            <div class="pd-row">
                <img src="../images/profil.jpg" class="pd-img" >
                <div>
                    <h3>John Green</h3>
                    <p>Number of posts: 2</p>
                </div>
            </div>
        </div>
        <div class="pd-right">

        </div>
    </div>
    <!-- <div class="profile-info">
        <div class="info-col"></div>
        <div class="post-col">
            <div class="write-post-container">
                <div class="user-profile">
                    <img src="../images/profil.jpg" class="user-profile-img">
                    <div>
                        <p>John Green</p>
                    </div>
                </div>
                <div class="post-input-container">
                    <textarea rows="3" placeholder="What's on your mind?"></textarea>
                    <div class="add-post-links">
                        <a href="#"><img src="../images/tag.png">Category</a>
                        <a href="#"><img src="../images/photo.png">Photo</a>
                        <a href="#"><img src="../images/feeling.png">Feeling/Activity</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="center">
         <button id="show-addAutograph">Add a new autograph</button>  
    </div>
    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Autograph</h2>
            <div class="form-element">
               <label for="photo">Picture</label>
               <input type="text" id="photo" placeholder="Add the autograph picture " required>
            </div>
            <div class="form-element">
               <label for="domain">Domain</label>
               <input type="text" id="domain" placeholder="Add autograph field " required>
            </div>
            <div class="form-element">
               <label for="personality">Personality</label>
               <input type="text" id="personality" placeholder="Add Personality" required>
            </div>
            <div class="form-element">
               <label for="country">Country</label>
               <input type="text" id="country" placeholder="Add country" required>
            </div>
            <div class="form-element">
               <label for="city">City</label>
               <input type="text" id="city" placeholder="Add city" required>
            </div>
            <div class="form-element">
               <label for="time">Moment</label>
               <input type="text" id="time" placeholder="Add moment you got it" required>
            </div>
            <div class="form-element">
               <label for="object">Object</label>
               <input type="text" id="object" placeholder="Add place on which the autograph is located " required>
            </div>
            <div class="form-element">
               <label for="mentions">Special mentions</label>
               <input type="text" id="mentions" placeholder="Add special mentions">
            </div>
            <div class="form-element">
                 <button>Add autograph</button>
            </div>
        </div>
    </div>

     <div class="profile-info">
        <div class="info-col"></div>
        <div class="post-col">
            <div class="write-post-container">
                <div class="user-profile">
                    <img src="../images/profil.jpg" class="user-profile-img">
                    <div>
                        <p>John Green</p>
                        <span>10 Iunie 2022</span>
                    </div>
                </div>
             <img src="../images/autograf.webp" alt="autograf" class="post-img" onclick="openDetails()">
             <div class="post-popup">
                 <p>Details</p>
                 <p>more details</p>

             </div>
            </div>
        </div>
    </div> 
    


</div>




<script src="script.js"></script>
<script src="myAccount.js"></script>

</body>
</html>