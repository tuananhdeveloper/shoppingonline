<?php 
$id = $_GET["id"];
require("../library/config.php");
mysqli_query($conn,"delete from category where cate_id=$id");
mysqli_close($conn);
header("location:list_theloai.php");
exit();

?>