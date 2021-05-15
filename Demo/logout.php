<?php 
session_start();
session_destroy(); // huy phien lam viec cua session dang chay
header("location:index.php");
exit();
 ?>