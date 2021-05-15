<?php 
$id = $_GET["id"];
require("../library/config.php");
mysqli_query($conn,"delete from items where items_id=$id");
mysqli_close($conn);
header("location:list_mathang.php");
exit();

?>


<!-- Xin chào tất cả các bạn lần đầu tiên tự tay code trang web với dùng php để code csdl còn khá nhiều sai sót và mới thực hiện được mấy bảng dữ liệu đơn giản sản phẩm + user + category 
Sau đây mình demo qua nhé ! -->