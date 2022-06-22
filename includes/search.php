<?php
    require_once 'connDB.php';
    require_once '../Main/script-feed.js';
    $name = $_GET["name"];
    echo $name;
    $sql = "SELECT * FROM AUTOGRAPHS WHERE Personality =?";
    $pstmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($pstmt, $sql))
    {
        header("Location: ../Main/groups.php?search=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($pstmt, "s", $name);
        mysqli_stmt_execute($pstmt);
        $result = mysqli_stmt_get_result($pstmt);
        while($row = mysqli_fetch_assoc($result))
        {
            $personality = $row["Personality"];
            $domain = $row["Domain"];
            $id = $row["UserID"];
            $data = "SELECT NAME, PROFILE_PICTURE FROM USERS WHERE ID='$id';";
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
            $response = $response."<script> feed_fill('$userName','$profileImage','$index', '$path', '$personality', '$domain', '$city', 
                                                        '$country', '$time', '$object', '$mentions'); </script> \n";
            //echo "gasit"; 
            $index++;
        }
    }
?>