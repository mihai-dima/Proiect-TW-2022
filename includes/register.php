<?php

    if(isset($_POST['register_submit']))
    {
        require_once 'connDB.php';
        $fullName = $_POST['name'];
        $email = $_POST['email'];
        $passwd = $_POST['passwd'];
        $confirmPasswd = $_POST['confirmPasswd'];
        if(empty($fullName) || empty($email)|| empty($passwd) || empty($confirmPasswd))
        {
            header("Location: ../LoginAndSign-up/loginPage.php?registererror=emptyfileds");
            exit();
        }
        elseif(!preg_match("/^[a-zA-Z-' ]*$/", $fullName))
        {
            header("Location: ../LoginAndSign-up/loginPage.php?registererror=incorectnameformat");
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("Location: ../LoginAndSign-up/loginPage.php?registererror=invalidemailformat&name=".$fullName);
            exit();
        }   
        elseif(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $passwd))
        {
            header("Location: ../LoginAndSign-up/loginPage.php?registererror=inccorectpasswordformat&name=".$fullName."&email=".$email);
            exit();
        }
        elseif($passwd != $confirmPasswd)
        {
            header("Location: ../LoginAndSign-up/loginPage.php?registererror=passwordconfirmation&name=".$fullName."&email=".$email);
            exit(); 
        }
        else
        {
            $sql = "SELECT EMAIL FROM USERS WHERE EMAIL=?";
            $pstmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($pstmt, $sql))
            {
                header("Location: ../LoginAndSign-up/loginPage.php?registererror=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($pstmt, "s", $email);
                mysqli_stmt_execute($pstmt);
                mysqli_stmt_store_result($pstmt);
                $resulcheck = mysqli_stmt_num_rows($pstmt);
                if($resulcheck > 0)
                {
                    header("Location: ../LoginAndSign-up/loginPage.php?registererror=emiltaken&name=".$fullName);
                    exit();
                }
                else
                {
                    $sql = "INSERT INTO users (Name, Email, password) VALUES (?,?,?)";
                    $pstmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($pstmt, $sql))
                    {
                        header("Location: ../LoginAndSign-up/loginPage.php?registererror=sqlerror");
                        exit();
                    }
                    else
                    {
                        $hashedPassword = password_hash($passwd, PASSWORD_DEFAULT);
                        $hashedPasswordConfirm = password_hash($confirmPasswd, PASSWORD_DEFAULT);
            
                        mysqli_stmt_bind_param($pstmt, "sss", $fullName, $email, $hashedPassword);
                        mysqli_stmt_execute($pstmt);
                        
                        $sql = "SELECT EMAIL, ID FROM USERS WHERE EMAIL=?";
                        $pstmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($pstmt, $sql))
                        {
                            header("Location: ../LoginAndSign-up/loginPage.php?registererror=sqlerror");
                            exit();
                        }
                        else
                        {
                            mysqli_stmt_bind_param($pstmt, "s", $email);
                            mysqli_stmt_execute($pstmt);
                            $result = mysqli_stmt_get_result($pstmt);
                            if($row = mysqli_fetch_assoc($result))
                            {
                                session_start();
                                $_SESSION['userID'] = $row['ID'];
                                header("Location: ../MyAccount/myAccount.php");
                                exit();
                            }
                        }
                    }
                }
            }
        }
        mysqli_stmt_close($pstmt);
        mysqli_close($conn);
    }
    else
    {
        header("Location: ../LoginAndSign-up/loginPage.php");
    }
