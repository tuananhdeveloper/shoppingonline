<?php 
	session_start();
    require "templates/header.php";

 ?>

	<div id="wrapper">
		<table>
			<tr>
				<td><b>STT</b></td>
			    <td><b>Mã Đơn</b></td>
				<td><b>Tên khách hàng</b></td>
				<td><b>Số lượng sản phẩm mua</b></td>
				<td><b>Tổng tiền</b></td>
				<td><b>Chi Nhánh</b></td>
				<td><b>Thời gian</b></td>
				<td><b>Chi tiết</b></td>
			</tr>
			<?php 
			$dem=1;
			require("../library/config.php");
			$result= mysqli_query($conn,"select * from orders where branch='CN1'");
			while( $data = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td> $dem </td>";	
			echo "<td>$data[order_id]</td>";
			echo "<td>$data[username]</td>";
			echo "<td>$data[quantity_item]</td>";
			echo "<td>$data[total]</td>";
			echo "<td>$data[branch]</td>";
			echo "<td>$data[time]</td>";
			echo "<td><a href='list_detail.php?id=$data[order_id]'>Chi Tiết</a></td>";	
			echo "<tr>";
			$dem++;
			}
			mysqli_close($conn);
		?>
		</table>
	</div>
	<?php 
    require "templates/footer.php" ;
 ?>
