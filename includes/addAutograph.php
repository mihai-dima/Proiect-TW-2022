<?php
session_start();

if (isset($_POST['submit-autograph'])) {
    require_once 'connDB.php';

    $photo = $_FILES['photo'];

    $domain = $_POST['domain'];
    $personality = $_POST['personality'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $moment = $_POST['time'];
    $object = $_POST['object'];
    $specialMentions = $_POST['mentions'];


    if (empty($photo) || empty($domain) || empty($personality) || empty($country) || empty($city) || empty($moment) || empty($object)) {
        header("Location: ../MyAccount/myAccount.php?addAutographerror=emptyfileds");
        exit();
    } else {
        //processign photo to add in database
        $newPhotoName = $personality . uniqid("", true);
        $newPhotoName = strtolower(str_replace(" ", "", $newPhotoName));

        $fileName = $photo['name'];
        $fileType = $photo['type'];
        $fileTempName = $photo['tmp_name'];
        $fileError = $photo['error'];
        $fileSize = $photo['size'];
        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowedExtensions = array("jpeg", "jpg", "png");
        if (in_array($fileActualExt, $allowedExtensions)) {
            if ($fileError == 0) {
                if ($fileSize <= 2000000) //>20mb
                {
                    $photoFullName = $newPhotoName . "." . $fileActualExt;
                    $destination = '../autographs/' . $photoFullName;
                    //echo($destination);
                    //searching personality and getting the id, if exists
                    /*$sql = "SELECT ID, DomainID FROM personality WHERE name=?;";
                    $pstmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($pstmt, $sql)) {
                        header("Location: ../MyAccount/myAccount.php?addAutographerror=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($pstmt, "s", $personality);
                        mysqli_stmt_execute($pstmt);
                        $result = mysqli_stmt_get_result($pstmt);
                        if ($row = mysqli_fetch_assoc($result)) {
                            $personalityID = $row['ID'];
                            $domainID = $row['DomainID'];
                        } else { ////get the id of domain and create new instance and get the id
                            //get ID of domain
                            $sql = "SELECT ID FROM domains WHERE name=?;";
                            $pstmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($pstmt, $sql)) {
                                header("Location: ../MyAccount/myAccount.php?addAutographerror=sqlerror");
                                exit();
                            } else {
                                mysqli_stmt_bind_param($pstmt, "s", $domain);
                                mysqli_stmt_execute($pstmt);
                                $result = mysqli_stmt_get_result($pstmt);
                                if ($row = mysqli_fetch_assoc($result)) {
                                    $DomainID = $row['ID'];
                                }

                                //creating a new instance of personality
                                $sql = "INSERT INTO personality (Name, DomainID) VALUES (?,?)";
                                $pstmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($pstmt, $sql)) {
                                    header("Location: ../MyAccount/myAccount.php?addAutographerror=sqlerror");
                                    exit();
                                } else {
                                    mysqli_stmt_bind_param($pstmt, "ss", $personality, $DomainID);
                                    mysqli_stmt_execute($pstmt);
                                }

                                //get the ID of personality
                                $sql = "SELECT ID, DomainID FROM personality WHERE name=?;";
                                $pstmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($pstmt, $sql)) {
                                    header("Location: ../MyAccount/myAccount.php?addAutographerror=sqlerror");
                                    exit();
                                } else {
                                    mysqli_stmt_bind_param($pstmt, "s", $personality);
                                    mysqli_stmt_execute($pstmt);
                                    $result = mysqli_stmt_get_result($pstmt);
                                    if ($row = mysqli_fetch_assoc($result)) {
                                        $personalityID = $row['ID'];
                                        $domainID = $row['DomainID'];
                                    }
                                }
                            }
                        }
                    }*/
                    
                    $sql = "INSERT INTO autographs (UserID, Personality, Domain, Image, City, Country, Time, Object, Special_mentions) 
                            VALUES (?,?,?,?,?,?,?,?,?)";
                    $pstmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($pstmt, $sql)) {
                        header("Location: ../MyAccount/myAccount.php?addAutographerror=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($pstmt, "issssssss", $_SESSION['userID'], $personality, $domain, $photoFullName, $city,
                                                $country, $moment, $object, $specialMentions);
                        mysqli_stmt_execute($pstmt);
                        move_uploaded_file($fileTempName, $destination);
                        header("Location: ../MyAccount/myAccount.php");
                        exit();
                    }
                } else {
                    echo "File too big. Maximum size is 20mb.";
                }
            } else {
                echo "You had an error!";
            }
        }else{
            echo "Upload a valid file!";
        }
    }
}else {
    header("Location: ../MyAccount/myAccount.php");
}
