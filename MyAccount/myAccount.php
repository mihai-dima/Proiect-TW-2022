<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                    <p>Numar postari:2</p>
                </div>
            </div>
        </div>
        <div class="pd-right">

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
    </div>
</div>




<script src="script.js"></script>
</body>
</html>