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
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("Location: ../LoginAndSign-up/loginPage.php?registererror=invalidemailformat&");
            exit();
        }   
        elseif(!preg_match("/^[a-zA-Z]*$/", $fullName))
        {
            header("Location: ../LoginAndSign-up/loginPage.php?registererror=incorectnameformat&");
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
                header("Location: ../Main/autographCollector.php");
                exit();
            }
        }
    }
    else
    {
        header("Location: ../LoginAndSign-up/loginPage.php");
    }

?>