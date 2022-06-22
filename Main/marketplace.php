<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Autograph Collector</title>
  <link rel="stylesheet" href="styleMain.css">
  <link rel="stylesheet" href="syleMarketplace.css">
</head>

<body>
  <?php include "homeBody.html"; ?>
  <!--main-content-->
  <div class="main-content">
    <div class="exchanges">
      <h2>Exchanges available:</h2>
      <?php
      if (!isset($_SESSION['userID'])) {
        echo 'You must be signed-in to see this page!';
      } else {
        require_once '../includes/connDB.php';
        $sql = "SELECT * FROM EXCHANGES WHERE USERID!=?";
        $pstmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($pstmt, $sql)) {
          header("Location: ../Main/marketplace.php?getexchanges=sqlerror");
          exit();
        } else {
          $userID = $_SESSION["userID"];
          mysqli_stmt_bind_param($pstmt, "i", $userID);
          mysqli_stmt_execute($pstmt);
          $result = mysqli_stmt_get_result($pstmt);
          while ($row = mysqli_fetch_assoc($result)) { //all proposal excepts current user
            $id = $row['ID'];  
            $sql = "SELECT Name, Profile_picture FROM USERS WHERE ID=?";
            $pstmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($pstmt, $sql)) {
              header("Location: ../Main/marketplace.php?getexchanges=sqlerror");
              exit();
            }
            else{ //user how made the proposal
              mysqli_stmt_bind_param($pstmt, "i", $row['UserID']);
              mysqli_stmt_execute($pstmt);
              $resultUser = mysqli_stmt_get_result($pstmt);
              $userRow = mysqli_fetch_assoc($resultUser);
              $userName = $userRow['Name'];
              $profileImage = $userRow['Profile_picture'];
            }
            $giveNo = $row['GiveNoOfAutographs'];
            $givePersonality = $row['GivePersonality'];
            $giveDomain = $row['GiveDomain'];
            $receiveNo = $row['ReceiveNoOfAutographs'];
            $receivePersonality = $row['ReceivePersonality'];
            $receiveDomain = $row['ReceiveDomain'];
            $param = "../includes/makeExchange.php?id=$id";
      
            echo '<div class="exchange-container">
                        <div class="user-profile">
                            <img class="user-profile-img" alt="Profile-image" src='.$profileImage.'>
                            <div>
                                <p> '.$userName.' </p>
                            </div>
                        </div>
                        <form method="post">
                        <div class="exchange-content">
                            <div class="exchange-give">
                                <h2>I give:</h2>
                                <p> ' . $giveNo . ' autographs of ' . $givePersonality . ' from domain ' . $giveDomain . ' </p>
                            </div>
                            <div class="exchange-receive">
                                <h2>I want:</h2>
                                <p> ' . $receiveNo . ' autographs of ' . $receivePersonality . ' from domain ' . $receiveDomain . ' </p>
                            </div>
                        </div>
                        <button type="submit" formaction="'.$param.'" name="exchangeAccepted"> Accept </button>
                        </form>
                  </div>';
          }
        }
        mysqli_stmt_close($pstmt);
        mysqli_close($conn);
      }
      ?>
    </div>
  </div>

  <!--right-sidebar-->
  <div class="right-sidebar">

  </div>

  </div>
  <!--container-->
  <script src="script.js"></script>
</body>

</html>