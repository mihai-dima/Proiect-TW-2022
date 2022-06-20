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
            header("Location: ../Main/marketplace.php?exchanges=sqlerror");
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
            header("Location: ../Main/marketplace.php?exchanges=sqlerror");
            exit();
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
                    
                    //update sql!!
                    $sql = 'UPDATE AUTOGRAPHS SET UserID='.$resultRow['UserID'].' WHERE ID='.$row['ID'].';'; //sql injection??
                    if (mysqli_query($conn, $sql)) {
                        echo "Record updated successfully";
                    }
                    if($index == $resultRow['ReceiveNoOfAutographs'])
                        break;
                }
                //exchange autographs of this user
                $sql = "SELECT *  FROM AUTOGRAPHS WHERE UserID=? AND Personality=? AND Domain=?";
                $pstmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($pstmt, $sql)){
                    header("Location: ../Main/marketplace.php?exchanges=sqlerror");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($pstmt, "iss", $resultRow['UserID'], $resultRow['GivePersonality'], $resultRow['GiveDomain']);
                    mysqli_stmt_execute($pstmt);
                    $result = mysqli_stmt_get_result($pstmt);
                    $index = 0;
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $index++;
                        //update sql!!
                        $sql = 'UPDATE AUTOGRAPHS SET UserID='.$userAcceptedId.' WHERE ID='.$row['ID'].';'; //sql injection??
                        if(mysqli_query($conn, $sql)) {
                            //echo "Record updated successfully";
                        }
                        if($index == $resultRow['GiveNoOfAutographs'])
                            break;
                    }
                }
                $sql = 'DELETE FROM EXCHANGES WHERE ID='.$resultRow['ID'].';';
                mysqli_query($conn, $sql);
                header("Location: ../Main/marketplace.php?exchanges=succes");
                exit();
            }
            else{
                header("Location: ../Main/marketplace.php?exchanges=insufficientautographs");
                exit();
            }
        }   
        mysqli_stmt_close($pstmt);
        mysqli_close($conn);
    }
    else
    {
        header("Location: ../Main/marketplace.php");
        exit();
    }   
?>