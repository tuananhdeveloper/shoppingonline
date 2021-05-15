<?php 
	session_start();
    require("templates/header.php");
    
 ?>
	<div id="wrapper">
		<table>
			<tr>
				<td style="width: 50px"><b>STT</b></td>
				<td style="width: 100px"><b>Mã Đơn</b></td>
				<td style="width: 200px;"><b>Tên khách hàng</b></td>
				<td><b>Tên sản phẩm</b></td>
				<td style="width: 100px;"><b>Số Lượng</b></td>
				<td style="width: 100px;"><b>Giá</b></td>
				<td style="width: 200px;"><b>Thời gian</b></td>
			</tr>
			<?php 
			if(isset($_GET["id"])){
			$id = $_GET["id"];
			$dem=1;
			require("../library/config.php");
			$result= mysqli_query($conn," SELECT a.username, b.* from orders as a, order_items as b WHERE b.order_id = $id and a.order_id = $id and a.branch='CN1' ");
			while( $data = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td> $dem </td>";	
			echo "<td>$data[order_id]</td>";
			echo "<td>$data[username]</td>";
			echo "<td>$data[item_name]</td>";
			echo "<td>$data[quantity]</td>";
			echo "<td>$data[price]</td>";
			echo "<td>$data[time]</td>";
			echo "<tr>";
			$dem++;
			}
			mysqli_close($conn); 
		}
		else{
			$dem=1;
			require("../library/config.php");
			$result= mysqli_query($conn," SELECT a.username, b.* from orders as a, order_items as b WHERE b.order_id = a.order_id and a.branch='CN1' ");
			while( $data = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td> $dem </td>";	
			echo "<td>$data[order_id]</td>";
			echo "<td>$data[username]</td>";
			echo "<td>$data[item_name]</td>";
			echo "<td>$data[quantity]</td>";
			echo "<td>$data[price]</td>";
			echo "<td>$data[time]</td>";
			echo "<tr>";
			$dem++;
			}
			mysqli_close($conn);
		}	
			 ?>
		
		</table>
	</div>
	<?php 
    require("templates/footer.php");
 ?>