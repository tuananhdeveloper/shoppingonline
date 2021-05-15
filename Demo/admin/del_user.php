<?php 
$id = $_GET["id"];
require("../library/config.php");
mysqli_query($conn,"delete from user where user_id=$id");
mysqli_close($conn);
header("location:list_user.php");
exit();
 ?>