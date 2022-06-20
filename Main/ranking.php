<?php
session_start();
$dom='Sport';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Autograph Collector</title>
    <link rel="stylesheet" href="styleMain.css">
    <link rel="stylesheet" href="styleRanking.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
		$(document).ready(function(){
			$(".default_optionB").click(function(){
			  $(this).parent().toggleClass("activ");
			})

			$(".select_ulB li").click(function(){
			  var currentele = $(this).html();
			  $(".default_optionB li").html(currentele);
			  $(this).parents(".select_wrapB").removeClass("activ");
			})
		});
	</script>
</head>

<body>
    <?php include "homeBody.html"; ?>
      <!------------------main-content------------------->
    <div class="main-content">
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
              <div class="optionB">
                <p>Music</p>
              </div>
          </li>
          <li>
              <div class="optionB">
              <p>Sport</p>
              </div>  
          </li>
          <li>
              <div class="optionB">
                <p>Politics</p>
              </div>  
          </li>
          <li>
            <div class="optionB">
                <p>Movie</p>
              </div>
          </li>
          <li>
            <div class="optionB">
                <p>Culture</p>
              </div>
          </li>
          <li>
            <div class="optionB">
                <p>Science</p>
              </div>
          </li>
      </ul>
  </div>
  
</div>
       </div>
       <!-------------------right-sidebar-----------------> 
      <div class="right-sidebar">
          <div class="reports">
             <h3>Download collection reports: </h3>
             <button class="button rss" onclick="window.location.href = '../Main/Raport/raportrss.php';">RSS</button>
             <button class="button csv" onclick="window.location.href = '../Main/Raport/raportcsv.php';">CSV</button>
             <button class="button pdf" onclick="window.location.href='../Main/Raport/raportpdf.php';">PDF</button>
          </div>
          <div class="ranking">
             <h3>Download rankings: </h3>
             <button class="button rss" onclick="window.location.href = '../Main/Top/toprss.php?domain=Sport ';">RSS</button>
             <button class="button csv" onclick="window.location.href = '../Main/Top/topcsv.php?domain=Sport';">CSV</button>
             <button class="button pdf" onclick="window.location.href = '../Main/Top/toppdf.php?domain=Sport';">PDF</button>
          </div>
       </div>

    </div> <!--container-->
    <script src="script.js"></script>

</body>

</html>