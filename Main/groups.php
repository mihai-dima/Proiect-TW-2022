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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
<?php include "homeBody.html"; ?>
    <!------------------main-content------------------->
     <div class="main-content">
          <div class="wrapper">
              <div class="select_wrap">
                  <ul class="default_option">
                        <li>
                          <div class="option">
                              <p>
                                 <span class="count"> 0</span>
                                 <span class="text"> Select domain</span>
                              </p>
                              <span class="icon">
                                  <ion-icon class="i" name="chevron-down-outline"></ion-icon>
                              </span>
                           </div>
                        </li>
                   </ul>
                   <ul class="select_ul">
                         <li>
                             <div class="option">
                                  <input type="checkbox" class="input" id="cb1">
                                  <span class="checkmark"></span>
                                  <span class="text">Music</span>
                              </div>
                           </li>
                           <li>
                             <div class="option">
                                  <input type="checkbox" class="input" id="cb2">
                                  <span class="checkmark"></span>
                                  <span class="text">Sports</span>
                              </div>
                           </li>
                           <li>
                             <div class="option">
                                  <input type="checkbox" class="input" id="cb3">
                                  <span class="checkmark"></span>
                                  <span class="text">Politics</span>
                              </div>
                           </li>
                           <li>
                             <div class="option">
                                  <input type="checkbox" class="input" id="cb4">
                                  <span class="checkmark"></span>
                                  <span class="text">Movie</span>
                              </div>
                           </li>
                           <li>
                             <div class="option">
                                  <input type="checkbox" class="input" id="cb4">
                                  <span class="checkmark"></span>
                                  <span class="text">Culture</span>
                              </div>
                           </li>
                           <li>
                             <div class="option">
                                  <input type="checkbox" class="input" id="cb4">
                                  <span class="checkmark"></span>
                                  <span class="text">Science</span>
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
<script type="text/javascript" src="scriptSelect.js"></script>
<script src="script.js"></script>
</body>
</html>