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
                
            }
        }
    }
?>