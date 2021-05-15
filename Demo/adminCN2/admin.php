<?php 
session_start();
if ($_SESSION["level"]==4) {
 /*header("location:list_user.php");
 exit();*/
 require "templates/header.php";
 require "templates/footer.php";
}
else {
 header("location :../index.php");
 exit();
}

 ?>
