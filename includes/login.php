<?php
    if(isset($_POST['login_submit']))
    {
        require_once 'connDB.php';
        $email = $_POST['email'];
        $passwd = $_POST['passwd'];

        if(empty($email) || empty($passwd))
        {
            header("Location: ../LoginAndSign-up/loginPage.php?loginerror=emptyfields");
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("Location: ../LoginAndSign-up/loginPage.php?loginerror=invalidemailformat");
            exit();
        }   
        else
        {
            $sql = "SELECT * FROM USERS WHERE EMAIL=?;";
            $pstmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($pstmt, $sql))
            {
                header("Location: ../LoginAndSign-up/loginPage.php?loginerror=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($pstmt, "s", $email);
                mysqli_stmt_execute($pstmt);
                $result = mysqli_stmt_get_result($pstmt);
                if($row = mysqli_fetch_assoc($result))
                {
                    $checkPasswd = password_verify($passwd, $row['password']);
                    if(!$checkPasswd)
                    {
                        header("Location: ../LoginAndSign-up/loginPage.php?loginerror=wrongpassword");
                        exit();
                    }
                    else
                    {
                        session_start();
                        $_SESSION['userID'] = $row['ID'];
                        header("Location: ../Main/autographcollector.php");
                    }
                }
                else
                {
                    header("Location: ../LoginAndSign-up/loginPage.php?loginerror=nouser");
                        exit();
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
?>