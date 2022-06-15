<?php
session_start();
require_once '../includes/connDB.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Autograph Collector/Profile</title>
    <link rel="stylesheet" href="styleMyAccount.css">
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
                    <img src="../images/seeAccount.png" class="seeAcount-icon">
                    <a href="#">See your profile</a>
                </div>
                <hr>
                <div class="settings-links">
                    <img src="../images/logout.png" class="logout-icon">
                    <form action="../includes/logout.php" method="post">
                    <button type="submit" name="logout"> Logout </button> <img src="../images/arrow.png" alt="Arrow-image" width="6px">
                    
                </form>
                </div>
            </div>
        </div>

    </nav>

    <!----------------------Profile-page------------->

    <div class="profile-container">
        <img src="../images/cover.png" class="cover-img">
        <div class="profile-details">
            <div class="pd-left">
                <div class="pd-row">
                    <img src="../images/profil.jpg" class="pd-img">
                    <div>
                        <h3>John Green</h3>
                        <p>Number of posts: 2</p>
                    </div>
                </div>
            </div>
            <div class="pd-right">
                <div class="autograph-form">
                    <button id="show-addAutograph">Add a new autograph</button>
                </div>
            </div>
        </div>

        <!-- <div class="profile-info"
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
        </div> //-->


        <div class="popup">
            <div class="close-btn">&times;</div>
            <div class="form">
                <form id="add-autograph" action="../includes/addAutograph.php" method="post" enctype="multipart/form-data">
                    <h2>Autograph</h2>
                    <div class="form-element">
                        <label for="photo">Picture</label>
                        <input type="file" name="photo">
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <label for="domain">Domain</label>
                            <input type="text" name="domain" placeholder="Add autograph field " required>
                        </div>
                        <div class="form-element">
                            <label for="personality">Personality</label>
                            <input type="text" name="personality" placeholder="Add Personality" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <label for="country">Country</label>
                            <input type="text" name="country" placeholder="Add country" required>
                        </div>
                        <div class="form-element">
                            <label for="city">City</label>
                            <input type="text" name="city" placeholder="Add city" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <label for="time">Moment</label>
                            <input type="text" name="time" placeholder="Add moment you got it" required>
                        </div>
                        <div class="form-element">
                            <label for="object">Object</label>
                            <input type="text" name="object" placeholder="Add place on which the autograph is located " required>
                        </div>
                    </div>
                    <div class="form-element">
                        <label for="mentions">Special mentions</label>
                        <input type="text" name="mentions" placeholder="Add special mentions">
                    </div>
                    <div class="form-element">
                        <button name="submit-autograph">Add autograph</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="autographs">
        </div>

        <script id="feed">
            //
            function feed_fill(autografID, autografImage, personality, domain, city, country, time_obtained, object, mentions) {

                var divContainer = document.createElement('div');
                divContainer.className = "write-post-container";

                /*var divProfile = document.createElement("div");
                divProfile.className = "user-profile";

                var imgProfile = document.createElement('img');
                imgProfile.src = profileImage;
                imgProfile.className = "user-profile-img";
                divProfile.appendChild(imgProfile);
               
                var div = document.createElement('div');
                var nameParagraph = document.createElement('p');
                var name = document.createTextNode(userName);
                nameParagraph.appendChild(name);
                div.appendChild(nameParagraph);

                divProfile.appendChild(imgProfile);
                divProfile.appendChild(div);
                divContainer.appendChild(divProfile);*/

                //autograph
                var imgAutograph = document.createElement('img');
                imgAutograph.src = autografImage;
                imgAutograph.alt = 'autograph';
                imgAutograph.className = "post-img";

                var modalName = "modal";
                var modalID = modalName.concat(autografID);
                imgAutograph.onclick = function() {
                    document.getElementById(modalID).showModal()
                };
                divContainer.appendChild(imgAutograph);

                //var text = document.createTextNode("asda");
                //divContainer.appendChild(text);

                var modal = document.createElement('dialog');
                modal.id = modalID;
                modal.className = "autograf-modal";

                //Div from modal
                var div = document.createElement('div');
                div.className = "modal-content";
                div.setAttribute("method", "dialog");

                //Header - autograph name and exit button
                var header = document.createElement('header');
                var title = document.createElement('h3');
                var textTitle = document.createTextNode(personality);
                title.appendChild(textTitle);
                header.appendChild(title);

                var closeBtn = document.createElement('button');
                var text = document.createTextNode("exit");
                closeBtn.onclick = function() {
                    this.closest('dialog').close('close')
                };
                closeBtn.appendChild(text);
                header.appendChild(closeBtn);
                //Append header to div
                div.appendChild(header);

                //content of modal
                var divDetails = document.createElement('div');
                var details = document.createElement('h3');
                details.className = 'details';
                var title_details = document.createTextNode('Details');
                details.appendChild(title_details);
                divDetails.appendChild(details);

                var div_item = document.createElement('div');
                div_item.className = "div_item";
                var item = document.createElement('h2');
                var item_detail = document.createTextNode('Domain');
                var context = document.createElement('p');
                var context_text = document.createTextNode(domain);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                div_item.appendChild(item)
                divDetails.appendChild(div_item);

                div_item = document.createElement('div');
                div_item.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('Personality');
                context = document.createElement('p');
                context_text = document.createTextNode(personality);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                div_item.appendChild(item)
                divDetails.appendChild(div_item);

                div_item = document.createElement('div');
                div_item.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('Country');
                context = document.createElement('p');
                context_text = document.createTextNode(country);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                div_item.appendChild(item)
                divDetails.appendChild(div_item);


                div_item = document.createElement('div');
                div_item.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('City');
                context = document.createElement('p');
                context_text = document.createTextNode(city);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                divDetails.appendChild(item);

                div_item = document.createElement('div');
                div.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('Time of obtaining');
                context = document.createElement('p');
                context_text = document.createTextNode(time_obtained);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                divDetails.appendChild(item);

                div_item = document.createElement('div');
                div.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('Object');
                context = document.createElement('p');
                context_text = document.createTextNode(object);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                divDetails.appendChild(item);

                div_item = document.createElement('div');
                div.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('Special mentions');
                context = document.createElement('p');
                context_text = document.createTextNode(mentions);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                divDetails.appendChild(item);

                div.appendChild(divDetails);

                //Append div to modal
                modal.appendChild(div);

                //Append modal to post-container
                divContainer.appendChild(modal);

                // Append the div to the div autographs from body
                document.getElementById("autographs").appendChild(divContainer);

                /*<div class="write-post-container">
                    
                    <img src="../images/autograf.webp" alt="autograf" class="post-img" onclick="openDetails()"/>
                    <div class="post-popup">
                        <h3 class="details">Details</h3>
                        <h2>Domain:</h2>
                        <p>Muzica</p>
                        <h2>Personality:</h2>
                        <p>Formatia Rock Beach Boys</p>
                        <h2>Country:</h2>
                        <p>details</p>
                        <h2>City:</h2>
                        <p>details</p>
                        <h2>Moment:</h2>
                        <p>details</p>
                        <h2>Object:</h2>
                        <p>Fotografie</p>
                        <h2>Special montions:</h2>
                        <p>details</p>
                    </div>
                </div>*/
            }
        </script>

        <?php
        
        $sql = "SELECT * FROM AUTOGRAPHS WHERE USERID=?;";
        $pstmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($pstmt, $sql)) {
            header("Location: ../LoginAndSign-up/myAccount.php?get-autographs=sqlerror");
            exit();
        } else {
            $userID = $_SESSION["userID"];
            mysqli_stmt_bind_param($pstmt, "i", $userID);
            mysqli_stmt_execute($pstmt);
            $result = mysqli_stmt_get_result($pstmt);
            $index = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                //print_r($row);

                $id = $row["PersonalityID"];
                $data = "SELECT NAME FROM PERSONALITY WHERE ID='$id';";
                $result_set = mysqli_query($conn, $data);
                if (mysqli_num_rows($result_set) > 0) {
                    $dataa = mysqli_fetch_assoc($result_set);
                    $title = $dataa["NAME"];
                } else {
                    continue;
                }
                $id = $row["DomainID"];
                $data = "SELECT NAME FROM DOMAINS WHERE ID='$id';";
                $result_set = mysqli_query($conn, $data);
                if (mysqli_num_rows($result_set) > 0) {
                    $dataa = mysqli_fetch_assoc($result_set);
                    $domain = $dataa["NAME"];
                } else {
                    continue;
                }
                $autographImg = $row["Image"];
                $city = $row["City"];
                $country = $row["Country"];
                $time = $row["Time"];
                $object = $row["Object"];
                $mentions = $row["Special_mentions"];
                echo "<script id='feed'> feed_fill('$index', '$autographImg', '$title', '$domain', '$city', '$country', '$time', '$object', '$mentions'); </script>";
                $index++;
            }
        }
        ?>

        <div class="profile-info">
            <div class="info-col"></div>
            <div class="post-col">

            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="myAccount.js"></script>
</body>
</html>