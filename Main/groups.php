<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Autograph Collector</title>
  <link rel="stylesheet" href="styleMain.css">
  <link rel="stylesheet" href="styleAutographs.css">
  <script>
    $(document).ready(function() {
      $(".default_optionB").click(function() {
        $(this).parent().toggleClass("activ");
      })

      $(".select_ulB li").click(function() {
        var currentele = $(this).html();
        $(".default_optionB li").html(currentele);
        $(this).parents(".select_wrapB").removeClass("activ");
      })
    });
  </script>
  
</head>

<body>
  <?php require_once("homeBody.html"); ?>
  <!--main-content-->
  <div class="main-content">
    <div id="search-result"> 
      <p> These are results of your search: </p>
  </div>
  </div>
 
  </div>
  <!--container-->
  <script src="script.js"></script>
</body>

</html>