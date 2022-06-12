<?php

    if(isset($_POST['addAutograph_submit']))
    {
        require_once 'connDB.php';
        $picture = $_POST['picture'];
        $domain = $_POST['domain'];
        $personality = $_POST['personality'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $moment = $_POST['moment'];
        $object = $_POST['object'];
        $specialMentions = $_POST['specialMentions'];
        
        if(empty($picture) || empty($domain)|| empty($personality) || empty($country) || empty($city) || empty($moment) || empty($object))
        {
            header("Location: ../MyAccount/myAccount.php?addAutographerror=emptyfileds");
            exit();
        }
        
        elseif(!preg_match("/^[a-zA-Z]*$/", $picture))
        {
            header("Location: ../MyAccount/myAccount.php?addAutographerror=incorectnameformat&");
            exit();
        }
        else
        {
            $sql = "INSERT INTO autographs (UserID,PersonalityID,Domain,Time, Object, Country, City) VALUES (?,?,?,?,?,?)";
            $pstmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($pstmt, $sql))
            {
                header("Location: ../MyAccount/myAccount.php?addAutographerror=sqlerror");
                exit();
            }
            else
            {
               
                mysqli_stmt_bind_param($pstmt, "sss", $picture, $domain, $personality, $country, $city, $object, $moment);
                mysqli_stmt_execute($pstmt);
                header("Location: ../Main/autographCollector.php");
                exit();
            }
        }
    }
    else
    {
        header("Location: ../MyAccount/myAccount.php");
    }

?>