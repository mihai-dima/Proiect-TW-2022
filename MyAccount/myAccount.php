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
    <title>Autograph Collector/Profile</title>
    <link rel="stylesheet" href="styleMyAccount.css">
    <link rel="stylesheet" href="feedAutographs.css">

</head>

<body>
    <nav>
        <div class="nav-left">
            <img src="../images/logo.png" alt="logo" class="logo" onclick="window.location.href = '../Main/autographCollector.php';">
            <ul>
                <li><img src="../images/home.png" alt="home" class="home" onclick="window.location.href = '../Main/autographCollector.php' ;"></li>
            </ul>
        </div>
        <div class="nav-right">
            <div class="search-box">
                <img src="../images/search.png" alt="search">
                <input type="text" placeholder="Search">
            </div>

            <div class="nav-user-icon" onclick="menuSettings()">
                <img src="../images/myaccount.jpg" alt="my-account">
            </div>
        </div>

        <!--settings-menu-->
        <div class="settings-menu">
            <div class="settings-menu-inner">
                <div class="settings-links">
                    <img src="../images/logout.png" alt="logout-icon" class="logout-icon">
                    <form action="../includes/logout.php" method="post">
                        <button type="submit" name="logout"> Logout </button> <img src="../images/arrow.png" alt="Arrow-image" class="arrow" style="width: 6px">
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!--Profile-page-->
    <div class="profile-container">
        <img src="../images/cover.png" alt="cover-image" class="cover-img">
        <div class="profile-details">
            <div class="pd-left">
                <div class="pd-row">
                    <div class="changePhoto">
                        <img style='border:2px solid rgb(141, 112, 152)' src="../images/profil.jpg" alt="profile-image" class="pd-img">
                        <!--form action="../includes/profilePhoto.php" method="post" enctype="multipart/form-data" onsubmit=""->
                        <input type="file" id="file">
                        <label id="profile-uploadBtn">Change Photo</label>
                        <--/form-->
                    </div>
                    <div>
                        <?php
                        $sql = "SELECT NAME FROM users WHERE ID=?;";
                        $pstmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($pstmt, $sql)) {
                            echo '<h3> User </h3>';
                            header("Location: ../LoginAndSign-up/myAccount.php?get-name=sqlerror");
                            exit();
                        } else {
                            $ID = $_SESSION["userID"];
                            mysqli_stmt_bind_param($pstmt, "i", $ID);
                            mysqli_stmt_execute($pstmt);
                            $result = mysqli_stmt_get_result($pstmt);
                            $row = mysqli_fetch_assoc($result);
                            $NAME = $row["NAME"];
                            echo '<h3> ' . $NAME . ' </h3>';
                        }

                        $sql = "SELECT COUNT(ID) AS Counter FROM AUTOGRAPHS WHERE UserID=?";
                        $pstmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($pstmt, $sql)) {
                            echo '<p> Number of autographs: unknown </p>';
                            header("Location: ../LoginAndSign-up/myAccount.php?get-name=sqlerror");
                            exit();
                        } else {
                            $ID = $_SESSION["userID"];
                            mysqli_stmt_bind_param($pstmt, "i", $ID);
                            mysqli_stmt_execute($pstmt);
                            $result = mysqli_stmt_get_result($pstmt);
                            $index = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $count = $row["Counter"];
                                echo '<p> Number of autographs: ' . $count . ' </p>';
                                $index++;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--butoane adaugare formular si exchange-->
            <div class="pd-right">
                <ul>
                    <li>
                        <div class="add-button">
                            <button id="show-addAutograph">Add a new autograph</button>
                        </div>
                    </li>
                    <li>
                        <div class="add-button">
                            <button id="show-exchange-dialog" onclick="document.getElementById('exchange').showModal()"> Propose an exchange </button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- formularul de adaugare a autografelor -->
        <div class="popup">
            <div class="close-btn">&times;</div>
            <div class="form">
                <form id="add-autograph" action="../includes/addAutograph.php" method="post" enctype="multipart/form-data">
                    <h2>Autograph</h2>
                    <div class="form-element">
                        <label id="photo">Picture</label>
                        <input type="file" name="photo" required>
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <label id="domain">Domain</label>
                            <div class="data-list-input">
                                <select class="data-list-input" name="domain">
                                    <option value>Select a domain</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Politics">Politics</option>
                                    <option value="Music">Music</option>
                                    <option value="Movie">Movie</option>
                                    <option value="Culture">Culture</option>
                                    <option value="Science">Science</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-element">
                            <label id="personality">Personality</label>
                            <input type="text" name="personality" placeholder="Add Personality" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <label id="country">Country</label>
                            <input type="text" name="country" placeholder="Add country" required>
                        </div>
                        <div class="form-element">
                            <label id="city">City</label>
                            <input type="text" name="city" placeholder="Add city" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-element">
                            <label id="time">Moment</label>
                            <input type="text" name="time" placeholder="Add moment you got it" required>
                        </div>
                        <div class="form-element">
                            <label id="object">Object</label>
                            <input type="text" name="object" placeholder="Add place on which the autograph is located " required>
                        </div>
                    </div>
                    <div class="form-element">
                        <label id="mentions">Special mentions</label>
                        <input type="text" name="mentions" placeholder="Add special mentions">
                    </div>
                    <div class="form-element">
                        <button name="submit-autograph">Add autograph</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- formularul de adaugare exchange -->
        <div class="popup">
            <dialog class="popup active" id="exchange" modal-mode="mega">

                <form class="form" action="../includes/addExchange.php" method="post">
                    <header>
                        <h2>Exchange</h2>
                        <button onclick="this.closest('dialog').close('close')" class="close-btn"> &times; </button>
                    </header>
                    <article>
                        <div class="form-element">
                            <p> To give </p>
                        </div>
                        <div class="form-element">
                            <label id="give-no-of-autographs">No. of autographs</label>
                            <input type="number" name="giveNo" placeholder="No. of autographs you want to give" required>
                        </div>
                        <div class="row">
                            <div class="form-element">
                                <label id="give-personality">Personality</label>
                                <input type="text" name="givePersonality" placeholder="Type personality" required>
                            </div>
                            <div class="form-element">
                                <label id="give-domain">Domain</label>
                                <input type="text" name="giveDomain" placeholder="Type domain" required>
                            </div>
                        </div>
                        <div class="form-element">
                            <p> To receive </p>
                        </div>
                        <div class="form-element">
                            <label id="receive-no-of-autographs">No. of autographs</label>
                            <input type="number" name="receiveNo" placeholder="No. of autographs you want to receive" required>
                        </div>
                        <div class="row">
                            <div class="form-element">
                                <label id="receive-personality">Personality</label>
                                <input type="text" name="receivePersonality" placeholder="Type personality" required>
                            </div>
                            <div class="form-element">
                                <label id="receive-domain">Domain</label>
                                <input type="text" name="receiveDomain" placeholder="Type domain" required>
                            </div>
                        </div>
                    </article>
                    <div class="form-element">
                    <footer>
                        <button name="submit-form">Confirm</button>
                    </footer>
                    </div>
                </form>
            </dialog>
        </div>
    </div>
    <script src="myAccount.js"></script>
    <div id="autographs" class="main-content">
        <div  class="autographs-show"></div>
        <script src="printAutorgraphs.js"></script>
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
            $index = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $personality = $row["Personality"];
                $domain = $row["Domain"];
                $autographImg = $row["Image"];
                $path = "../autographs/{$autographImg}";
                $city = $row["City"];
                $country = $row["Country"];
                $time = $row["Time"];
                $object = $row["Object"];
                $mentions = $row["Special_mentions"];
                $index++;
                echo "<script> feed_fill('$index', '$path', '$personality', '$domain', '$city', '$country', '$time', '$object', '$mentions'); </script>";
                echo "\r\n";
            }
        }
        ?>
    </div>
    <script>
        /*pop-up adaugare autograf*/
        document.querySelector("#show-addAutograph").addEventListener("click", function() {
            document.querySelector(".popup").classList.add("active");
        });
        document.querySelector(".popup .close-btn").addEventListener("click", function() {
            document.querySelector(".popup").classList.remove("active");
        });

        /*meniu logout*/
        var settingsmenu = document.querySelector(".settings-menu")
        function menuSettings() {
            settingsmenu.classList.toggle("settings-menu-height")
        }

        let popupdetails = document.querySelector(".post-popup")
        function openDetails() {
            popupdetails.classList.toggle("open-details");
        }
    </script>

</body>

</html>