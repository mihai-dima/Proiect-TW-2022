<?php
if(isset($_POST['addAutograph_submit']))
    {
        require_once 'connDB.php';
        $personalityID = $_POST['personalityID'];
        $domainID = $_POST['domainID'];
        $image = $_POST['image'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $time = $_POST['time'];
        $object = $_POST['object'];
        $special_mentions = $_POST['Special_mentions'];

        if(empty($personalityID) || empty($domainID)|| empty($image) || empty($city) || empty($country) || empty($time) || empty($object))
        {
            header("Location: ../MyAccount/myAccount.php?registererror=emptyfileds");
            exit();
        }

        else{
        $sql="INSERT INTO autographs (PersonalityID,DomainID,Image,City,Country,Time,Object,Special_mentions) VALUES (?,?,?,?,?,?,?,?)";
        $pstmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($pstmt, $sql))
            {
                header("Location: ../LoginAndSign-up/loginPage.php?registererror=sqlerror");
                exit();
            }
            else
            {
               
                header("Location: ../MyAccount/myAccount.php");
                exit();
            }
        }
        // -- VALUES('$personalityID','$domainID',$image','$city','$country','$time','$object','$special_mentions')";
       

    }
    else
    {
        header("Location: ../MyAccount/myAccount.php");
    }
        
?>