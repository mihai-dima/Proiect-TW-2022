<?php
    if (!isset($_SESSION['userID'])) {
        echo 'You must be signed-in to see this page!';
    }
    else{
        require_once '../includes/connDB.php';
        $sql = "SELECT * FROM EXCHANGES WHERE USERID!=?";
        $pstmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($pstmt, $sql)) {
        header("Location: ../Main/marketplace.php?getexchanges=sqlerror");
        exit();
        }else {
            $userID = $_SESSION["userID"];
            mysqli_stmt_bind_param($pstmt, "i", $userID);
            mysqli_stmt_execute($pstmt);
            $result = mysqli_stmt_get_result($pstmt);
            while ($row = mysqli_fetch_assoc($result)) {
                 $id = $row['ID'];
                 //select name and profileIMG user

                 $giveNo = $row['GiveNoOfAutographs'];
                 $givePersonality = $row['GivePersonality'];
                 $giveDomain = $row['GiveDomain'];
                 $receiveNo = $row['ReceiveNoOfAutographs'];
                 $receivePersonality = $row['ReceivePersonality'];
                 $receiveDomain = $row['ReceiveDomain'];
                 echo 
                    '<div class="exchange-container">
                        <div class="user-profile">
                            <img class="post-img" alt="Profile Image" src="asd">
                            <div>
                                <p> Nume </p>
                            </div>
                        </div>
                        <div class="exchange-content">
                            <div class="exchange-give">
                                <h2>I give:</h2>
                                <p> '.$giveNo.' autographs of '.$givePersonality.' from '.$giveDomain.' </p>
                            </div>
                            <div class="exchange-receive">
                                <h2>I want:</h2>
                                <p> '.$receiveNo.' autographs of '.$receivePersonality.' from '.$receiveDomain.' </p>
                            </div>     
                        </div>
                    </div>';
            }
        }
    }
?>


