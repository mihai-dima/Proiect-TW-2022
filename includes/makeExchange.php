<?php
    session_start();
    require_once 'connDB.php';
    if(isset($_POST['exchangeAccepted']))
    {
        $exchangeId = $_GET['id'];
        $userAcceptedId = $_SESSION['userID'];

        $sql = "SELECT * FROM EXCHANGES WHERE ID=?";
        $pstmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($pstmt, $sql)) {
            header("Location: ../Main/marketplace.php?getexchanges=sqlerror");
            exit();
        }
        else{ 
            mysqli_stmt_bind_param($pstmt, "i", $exchangeId);
            mysqli_stmt_execute($pstmt);
            $result = mysqli_stmt_get_result($pstmt);
            $resultRow = mysqli_fetch_assoc($result);
        }

        //check if user have enough autographs to switch
        $sql = "SELECT *  FROM AUTOGRAPHS WHERE UserID=? AND Personality=? AND Domain=?";
        $pstmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($pstmt, $sql)){
        }
        else{
            mysqli_stmt_bind_param($pstmt, "iss", $userAcceptedId, $resultRow['ReceivePersonality'], $resultRow['ReceiveDomain']);
            mysqli_stmt_execute($pstmt);
            $result = mysqli_stmt_get_result($pstmt);
            $rowcount = mysqli_num_rows($result);
            
            if($rowcount >= $resultRow['ReceiveNoOfAutographs']){
                $index = 0;
                while($row = mysqli_fetch_assoc($result))
                {
                    $index++;
                    $row['UserID'] = $resultRow['UserID'];
                    if($index == $resultRow['ReceiveNoOfAutographs'])
                        break;
                }

            }
            else{
                echo 'mai incearca';
            }
        }   
    }
    else
    {
        echo 'da';
    }   
?>