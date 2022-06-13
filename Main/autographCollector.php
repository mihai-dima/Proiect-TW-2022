<?php
session_start();
//require_once "homeBody.html";
?>
<!DOCTYPE html>
<html>
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
    <?php include("homeBody.html"); ?>
    <!------------------main-content------------------->
    <div class="main-content">
        <div id="feed">
        </div>

        <script id="feeed">
            function feed_fill(userName, profileImage, autografID, autografImage, autografName) {
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
                var textTitle = document.createTextNode(autografName);
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
                var text = document.createTextNode("da ");
                div.appendChild(text);
                var text = document.createTextNode(autografName);
                div.appendChild(text);

                //Append div to modal
                modal.appendChild(div);

                //Append modal to post-container
                divContainer.appendChild(modal);

                // Append the div to the div autographs from body
                document.getElementById("feed").appendChild(divContainer);
            }
        </script>

        <?php
        require_once '../includes/connDB.php';

        //$sql = "SELECT * FROM AUTOGRAPHS";
        //$result = mysqli_query($conn, $sql);
        //$num_rows = mysqli_num_rows($result);

        for ($index = 1; $index <= 5; $index++) {
            //echo 'merge ';
            $title = "Test".$index;
            $name = "King kONG";
            $profileImg = "../images/profil.jpg";
            $autografImg = "../images/autograf.webp";
            echo "<script id='feeed'> feed_fill('$name','$profileImg', '$index', '$profileImg', '$title'); </script>";
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