<?php
session_start(); 
require("template/header.php");

/*------Thu hien xu ly khi click btnUpdate-----*/

if (isset($_POST["btnUpdate"])) {

	foreach ($_POST['quantity'] as $key => $value) {
		if ($value <=0 ) {
			unset($_SESSION["cart"]["$key"]);
		}
		else{
			$_SESSION["cart"]["$key"]["quantity"]= $value;
		}
	}
}


?>
<div class="container" >
	<div class="viewCart" > 
		<h1> Thông Tin Giỏ Hàng </h1>
		<form action="viewCart.php"   method="post">
			<table class="viewTbCart">
				<tr id="titleCart">
					<td style="width: 50px;">STT</td>
					<td style="width: 250px;">Tên Sản Phấm</td>
					<td>Số Lượng</td>
					<td>Giá</td>
					<td>Thành Tiền</td>
					<td style="width: 60px;">Xóa</td>

				</tr>
				<?php

				 if(isset($_SESSION["cart"])){
				   $dem=1;
				   foreach ($_SESSION["cart"] as $list) {
					echo "<tr>";
					echo "<td>" .$dem."</td>";
					echo "<td style='text-align: left;'>" .$list['name']."</td>";
					echo "<td> <input type='text' name='quantity[".$list['id']."]' value='" .$list['quantity']."'></td>";
					echo "<td>" .$list['price']."</td>";
					echo "<td>" .($list['quantity']*$list['price'])."</td>";
					echo "<td><a href='deleteCart.php?id=$list[id]' title=''> Delete </a></td>";
					echo "</tr>";
					$dem++;
				}			
			}else{
				$dem=0;
				echo "<h3> Không có sản phẩm trong giỏ hàng !</h3>";
			}

				?>

					
				
			</table>
			<?php  
			if (isset($_SESSION["cart"])) {
					$total=0;
					foreach ($_SESSION["cart"] as $cart_itm){
						$total += $cart_itm["quantity"]*$cart_itm["price"];
					}
					echo "<h3> Tổng Tiền: ".$total."VNĐ</h3>";
				}
			?>
			<p> <input type="submit" value="Update" name="btnUpdate" > </p>
			<p> <input type="submit" value="Thanh Toan" name="ok" style="width: 150px"> </p>	
			<p> <a href="index.php" title="" style="font-weight: bold; font-size: 16px;">Add New Items</a> </p>
		</form>

<!-------Thuc hien chen data vao bang table khi click btnThanhToan------>
	<?php 

	

	if (isset($_POST["ok"])) {
		if (empty($_SESSION["username"])) {
			echo "<script type='text/javascript'>alert('Bạn Chưa Nhập Tài Khoản');</script> ";
		}
		else{
/*--------Insert thong vao bang orders -----------*/
            if($dem!=0) {
			$name = $_SESSION["username"];	
			$quantity_item = $dem-1;
			require("library/config.php");
			$result = mysqli_query($conn,"select username,branch from user where username='$name'");
			// var_dump($sql); // Kiem tra xem gia tri tra ve cua cau lenh
			$data = mysqli_fetch_assoc($result);
			$branch=$data['branch'];
			$sql="INSERT INTO orders( username, quantity_item, total, branch) VALUES('$name','$quantity_item','$total','$branch')";
			$sql1=mysqli_query($conn,$sql);

/*--------Insert thong tin chi tiet gio hang-----------*/
			$result1 = mysqli_query($conn,"SELECT order_id FROM orders order BY order_id DESC ");
			$data1 = mysqli_fetch_assoc($result1);
			$order_id = $data1["order_id"];
			foreach($_SESSION["cart"] as $list){
			$sql2=mysqli_query($conn,"INSERT INTO order_items (order_id, item_id, item_name, quantity, price) VALUES ('$order_id','$list[id]','$list[name]','$list[quantity]','$list[price]') ");
			}
			echo "<script type='text/javascript'>alert('Thanh Toán Thành Công');</script> ";
			unset($_SESSION["cart"]);				
			}
			else{
				echo "<script type='text/javascript'>alert('Vui Lòng Mua Sản Phẩm');</script> ";
			}
		}
	}
?>

</div> 
</div>
<?php 
require 'template/footer.php';
?>