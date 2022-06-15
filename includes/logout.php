<?php
session_start();
session_unset();
session_destroy();
header("Location: ../LoginAndSign-up/loginPage.php");
?>