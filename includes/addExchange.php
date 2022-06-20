<?php
    session_start();
    if(isset($_POST['submit-form']))
    {
        require_once 'connDB.php';

        $giveNoOfAutographs = $_POST['giveNo'];
        $givePersonality = $_POST['givePersonality'];
        $giveDomain = $_POST['giveDomain'];
        $receiveNoOfAutographs = $_POST['receiveNo'];
        $receivePersonality = $_POST['receivePersonality'];
        $receiveDomain = $_POST['receiveDomain'];

        //functie pt cautare domeniu cu parametrul nume!!!
        /*$sql = "SELECT ID FROM domains WHERE name=?;";
        $pstmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($pstmt, $sql)) {
            header("Location: ../MyAccount/myAccount.php?addAutographerror=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($pstmt, "s", $giveDomain);
            mysqli_stmt_execute($pstmt);
            $result = mysqli_stmt_get_result($pstmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $giveDomainID = $row['ID'];
                //header("Location: ../MyAccount/myAccount.php?ok=ok&domainID=".$giveDomainID);
            }
            else
            {
                header("Location: ../MyAccount/myAccount.php?addAutographerror=wrongDomain");
                exit();
            }

            //functie cautare autograph cu parametrii nume is id domeniu!!!
            $sql = "SELECT ID FROM personality WHERE name=? AND DomainID=?";
            $pstmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($pstmt, $sql)) {
                header("Location: ../MyAccount/myAccount.php?addAutographerror=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($pstmt, "si", $givePersonality, $giveDomainID);
                mysqli_stmt_execute($pstmt);
                $result = mysqli_stmt_get_result($pstmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $givePersonalityID = $row['ID'];
                    //header("Location: ../MyAccount/myAccount.php?ok=ok&personalityID=".$givePersonalityID);
                }
                else{
                    header("Location: ../MyAccount/myAccount.php?addAutographerror=wrongPersonality");
                    exit(); 
                }
            }*/

            //check if user have enogh autographs
            $userID = $_SESSION['userID'];
            $sql = "SELECT ID FROM autographs WHERE UserID='$userID' AND Personality='$givePersonality' AND Domain='$giveDomain'"; //SELECT COUNT!! sql injection!!
            $result_set = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result_set);
            //echo $count;
            //header("Location: ../MyAccount/myAccount.php?asd=sqlerror&count=".$count);
            //exit();
            /*$pstmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($pstmt, $sql)) {
                header("Location: ../MyAccount/myAccount.php?addAutographerror=sqlerror");
                exit();
            } else {
                echo "user" . $_SESSION['userID'] . " personlaity" . $givePersonalityID;
                //header("Location: ../MyAccount/myAccount.php?addForm=row&userID=".$_SESSION['userID']."perID=".$givePersonalityID);
                //exit();
                $userID = $_SESSION['userID'];
                mysqli_stmt_bind_param($pstmt, "ii", $userID, $givePersonalityID);
                mysqli_stmt_execute($pstmt);         
                //$row = mysqli_stmt_num_rows($pstmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    print_r($row);
                }
                //echo "rows" . $row;*/
                if ($count >= $giveNoOfAutographs) {

                    $sql = "INSERT INTO exchanges (UserID, GiveNoOfAutographs, GivePersonality, GiveDomain, ReceiveNoOfAutographs, ReceivePersonality, ReceiveDomain)
                                VALUES(?,?,?,?,?,?, ?)";
                    $pstmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($pstmt, $sql)) {
                        header("Location: ../MyAccount/myAccount.php?addAutographerror=sqlerror");
                        exit();
                    } else {
                    mysqli_stmt_bind_param($pstmt, "iississ", $_SESSION['userID'], $giveNoOfAutographs, $givePersonality, $giveDomain, 
                                    $receiveNoOfAutographs, $receivePersonality, $receiveDomain);
                    mysqli_stmt_execute($pstmt);
                    //echo "succes";
                    header("Location: ../MyAccount/myAccount.php");
                    exit();
                    }
                }
                else{
                    header("Location: ../MyAccount/myAccount.php?addAutographerror=inssuficientAutographs");
                    exit(); 
                }
                mysqli_stmt_close($pstmt);
                mysqli_close($conn);
            //}
        //}
    }
    else
    {
        header("Location: ../MyAccount/myAccount.php");
    }

