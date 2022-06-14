<?php
session_start();
require_once '../includes/connDB.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Autograph Collector</title>
    <link rel="stylesheet" href="styleMain.css">
</head>

<body>
    <?php require_once("homeBody.html"); ?>
    <!------------------main-content------------------->
    <div class="main-content">
        <div id="feed">
        </div>

        <script id="feeed">
            function feed_fill(userName, profileImage, autografID, autografImage, personality, domain, city, country, time_obtained, object, mentions) {
                var divContainer = document.createElement('div');
                divContainer.className = "write-post-container";

                var divProfile = document.createElement("div");
                divProfile.className = "user-profile";

                var imgProfile = document.createElement('img');
                imgProfile.src = profileImage;
                imgProfile.className = "user-profile-img";
                divProfile.appendChild(imgProfile);

                var div = document.createElement('div');
                var nameParagraph = document.createElement('p');
                var name = document.createTextNode(userName);
                nameParagraph.appendChild(name);
                div.appendChild(nameParagraph);

                divProfile.appendChild(imgProfile);
                divProfile.appendChild(div);
                divContainer.appendChild(divProfile);

                //autograph
                var imgAutograph = document.createElement('img');
                imgAutograph.src = autografImage;
                imgAutograph.alt = 'autograph';
                imgAutograph.className = "post-img";

                var modalName = "modal";
                var modalID = modalName.concat(autografID);
                imgAutograph.onclick = function() {
                    document.getElementById(modalID).showModal()
                };
                divContainer.appendChild(imgAutograph);

                //var text = document.createTextNode("asda");
                //divContainer.appendChild(text);

                var modal = document.createElement('dialog');
                modal.id = modalID;
                modal.className = "autograf-modal";

                //Div from modal
                var div = document.createElement('div');
                div.className = "modal-content";
                div.setAttribute("method", "dialog");

                //Header - autograph name and exit button
                var header = document.createElement('header');
                var title = document.createElement('h3');
                var textTitle = document.createTextNode(personality);
                title.appendChild(textTitle);
                header.appendChild(title);

                var closeBtn = document.createElement('button');
                var text = document.createTextNode("exit");
                closeBtn.onclick = function() {
                    this.closest('dialog').close('close')
                };
                closeBtn.appendChild(text);
                header.appendChild(closeBtn);
                //Append header to div
                div.appendChild(header);

                //content of modal
                var divDetails = document.createElement('div');
                var details = document.createElement('h3');
                details.className = 'details';
                var title_details = document.createTextNode('Details');
                details.appendChild(title_details);
                divDetails.appendChild(details);

                var div_item = document.createElement('div');
                div_item.className = "div_item";
                var item = document.createElement('h2');
                var item_detail = document.createTextNode('Domain');
                var context = document.createElement('p');
                var context_text = document.createTextNode(domain);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                div_item.appendChild(item)
                divDetails.appendChild(div_item);

                div_item = document.createElement('div');
                div_item.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('Personality');
                context = document.createElement('p');
                context_text = document.createTextNode(personality);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                div_item.appendChild(item)
                divDetails.appendChild(div_item);

                div_item = document.createElement('div');
                div_item.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('Country');
                context = document.createElement('p');
                context_text = document.createTextNode(country);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                div_item.appendChild(item)
                divDetails.appendChild(div_item);


                div_item = document.createElement('div');
                div_item.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('City');
                context = document.createElement('p');
                context_text = document.createTextNode(city);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                divDetails.appendChild(item);

                div_item = document.createElement('div');
                div.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('Time of obtaining');
                context = document.createElement('p');
                context_text = document.createTextNode(time_obtained);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                divDetails.appendChild(item);

                div_item = document.createElement('div');
                div.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('Object');
                context = document.createElement('p');
                context_text = document.createTextNode(object);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                divDetails.appendChild(item);

                div_item = document.createElement('div');
                div.className = "div_item";
                item = document.createElement('h2');
                item_detail = document.createTextNode('Special mentions');
                context = document.createElement('p');
                context_text = document.createTextNode(mentions);
                item.appendChild(item_detail);
                context.appendChild(context_text);
                item.appendChild(context);
                divDetails.appendChild(item);

                div.appendChild(divDetails);

                //Append div to modal
                modal.appendChild(div);

                //Append modal to post-container
                divContainer.appendChild(modal);

                // Append the div to the div autographs from body
                document.getElementById("feed").appendChild(divContainer);
            }
        </script>

        <?php
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

                    $id = $row["PersonalityID"];
                    $data = "SELECT NAME FROM PERSONALITY WHERE ID='$id';";
                    $result_set = mysqli_query($conn, $data);
                    if (mysqli_num_rows($result_set) > 0) {
                        $dataa = mysqli_fetch_assoc($result_set);
                        $title = $dataa["NAME"];
                    } else {
                        continue;
                    }
                    $id = $row["DomainID"];
                    $data = "SELECT NAME FROM DOMAINS WHERE ID='$id';";
                    $result_set = mysqli_query($conn, $data);
                    if (mysqli_num_rows($result_set) > 0) {
                        $dataa = mysqli_fetch_assoc($result_set);
                        $domain = $dataa["NAME"];
                    } else {
                        continue;
                    }
                    $id = $row["PersonalityID"];
                    $data = "SELECT NAME FROM PERSONALITY WHERE ID='$id';";
                    $result_set = mysqli_query($conn, $data);
                    if (mysqli_num_rows($result_set) > 0) {
                        $dataa = mysqli_fetch_assoc($result_set);
                        $title = $dataa["NAME"];
                    } else {
                        continue;
                    }
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
                    $city = $row["City"];
                    $country = $row["Country"];
                    $time = $row["Time"];
                    $object = $row["Object"];
                    $mentions = $row["Special_mentions"];
                    echo "<script id='feed'> feed_fill('$userName','$profileImage','$index', '$autographImg', '$title', '$domain', '$city', 
                                                        '$country', '$time', '$object', '$mentions'); </script>";
                    $index++;
                }
            }
        ?>
    </div>
    </div>
    </div>
    <!-------------------right-sidebar----------------->
    <div class="right-sidebar">

    </div>
    </div>
    <script src="script.js"></script>
</body>

</html>