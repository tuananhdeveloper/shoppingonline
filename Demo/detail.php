<?php
session_start(); 
require("template/header.php");
$id=$_GET["id"];
?>
<div class="container" >
	<div class="col-md-2"></div>
	<?php
	
	// dung thu vien ket noi csdl nhe
	require("library/config.php");
	// Thuc hien cau truy van
	$result=mysqli_query($conn,"select items_id,name,image,introduce,price from items where items_id=$id");
	$data=mysqli_fetch_assoc($result); // chúng ta sẽ lấy được mảng dữ liệu không có thứ tự :items_id->"1"........price->"150đ"

echo "<div class='col-md-8' style='margin: 50px auto 50px;'>";
echo "<table class='table'>";
echo "<tr>";
echo "<td style='border: 2px solid #F45A5A; width:150px; height: 250px;'><img src='image/$data[image]' > </td>";
echo "<td >";
echo "<h4 style='color: #5bc0de'>Tên sản phẩn: $data[name]</h4> ";
echo "<h4 style='color: #5bc0de'>Mô tả:</h4> ";		
echo "<p>$data[introduce]</p>";	
echo "<h4 style='color: #5bc0de'>Giá bán:$data[price]đ</h4> ";		
echo "<a href='addCart.php?id=$data[items_id]'class='btn btn-info'>Thêm vào giỏ hàng</a>";			
echo "</td>";	
echo "</tr>";
echo "</table>";
echo "</div>";
mysqli_close($conn);
?>
</div>
<?php 
require 'template/footer.php';
?>
