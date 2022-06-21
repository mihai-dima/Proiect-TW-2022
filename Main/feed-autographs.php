<script id = "feed" src="script-feed.js"></script>
<?php
if (!isset($_SESSION['userID'])) {
    echo 'You must be signed-in to see this page!';
} else {
    $sql = "SELECT * FROM AUTOGRAPHS WHERE USERID!=?;";
    $pstmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($pstmt, $sql)) {
        header("Location: ../LoginAndSign-up/myAccount.php?get-autographs=sqlerror");
        exit();
    } else {
        $userID = $_SESSION["userID"];
        mysqli_stmt_bind_param($pstmt, "i", $userID);
        mysqli_stmt_execute($pstmt);
        $result = mysqli_stmt_get_result($pstmt);
        $index = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            //print_r($row);

            $personality = $row["Personality"];
            $domain = $row["Domain"];
            $id = $row["UserID"];
            $data = "SELECT NAME, PROFILE_PICTURE FROM USERS WHERE ID='$id';"; //sql injection!!
            $result_set = mysqli_query($conn, $data);
            if (mysqli_num_rows($result_set) > 0) {
                $dataa = mysqli_fetch_assoc($result_set);
                $userName = $dataa["NAME"];
                $profileImage = $dataa["PROFILE_PICTURE"];
            } else {
                continue;
            }
            $autographImg = $row["Image"];
            $path = "../autographs/{$autographImg}";
            $city = $row["City"];
            $country = $row["Country"];
            $time = $row["Time"];
            $object = $row["Object"];
            $mentions = $row["Special_mentions"];
            echo "<script> feed_fill('$userName','$profileImage','$index', '$path', '$personality', '$domain', '$city', 
                                                        '$country', '$time', '$object', '$mentions'); </script> \n";
            $index++;
        }
    }
}
?>