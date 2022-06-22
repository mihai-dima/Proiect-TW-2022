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
  <link rel="stylesheet" href="styleSelect.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
    <form>
      <div class="wrapperB">
        <div class="select_wrapB">
          <ul class="default_optionB">
            <li>
              <div class="optionB default">
                <p>Select domain</p>
              </div>
            </li>
          </ul>
          <ul class="select_ulB">
            <li>
              <div class="optionB music">
                <input type="button" onclick="window.location.href = '../Main/createTop.php?domain=Music';" value="Music">
              </div>
            </li>
            <li>
              <div class="optionB sport">
                <input type="button" onclick="window.location.href = '../Main/createTop.php?domain=Sport';" value="Sport">
              </div>
            </li>
            <li>
              <div class="optionB politics">
                <input type="button" onclick="window.location.href = '../Main/createTop.php?domain=Politics';" value="Politics">
              </div>
            </li>
            <li>
              <div class="optionB movie">
                <input type="button" onclick="window.location.href = '../Main/createTop.php?domain=Movie';" value="Movie">
              </div>
            </li>
            <li>
              <div class="optionB culture">
                <input type="button" onclick="window.location.href = '../Main/createTop.php?domain=Culture';" value="Culture">
              </div>
            </li>
            <li>
              <div class="optionB science">
                <input type="button" onclick="window.location.href = '../Main/createTop.php?domain=Science';" value="Science">
              </div>
            </li>
          </ul-->
        </div>
      </div>
    </form>
  </div>
  <!--right-sidebar-->
  <div class="right-sidebar">

  </div>
  </div>
  <!--container-->
  <script src="script.js"></script>
</body>

</html>