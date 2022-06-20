<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Autograph Collector</title>
    <link rel="stylesheet" href="styleMain.css" >
    <link rel="stylesheet" href="styleSelect.css">
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

     </div>
</div> <!--container-->
<script src="script.js"></script>
</body>
</html>