<?php 
	session_start();
    require("templates/header.php");
 ?>
	<div id="wrapper">
		<table>
			<tr>
				<td colspan="6"></td>
				<td colspan="2" ><a href="add_item.php" style="color:#211CE4">Them mat hang</a></td>
			</tr>
			<tr>
				<td style="width: 50px" ><b>STT</b></td>
				<td><b>Thể Loại</b></td>
				<td><b>Mặt Hàng</b></td>
				<td><b>Giá</b></td>
				<td><b>Số Lượng</b></td>
				<td><b>Chi Nhánh</b></td>
				<td style="width: 100px"><b>Edit</b></td>
				<td style="width: 100px"><b>Delete</b></td>
			</tr>
			<?php 
			$dem=1;
			require("../library/config.php");
			$result= mysqli_query($conn,"select a.items_id,a.name,b.cate_title,a.price, a.quantity,a.branch from items as a, category as b where a.cate_id = b.cate_id AND a.branch='CN2'");
			while( $data = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>$dem</td>";
			echo "<td>$data[cate_title]</td>";// the loai			
			echo "<td>$data[name]</td>";//mat hang
			echo "<td>$data[price]</td>";// gia
			echo "<td>$data[quantity]</td>";// so luong
			echo "<td>$data[branch]</td>";// chi nhanh
			echo "<td><a href='edit_item.php?id=$data[items_id]' style='color:#DE13C4'>Edit</a></td>";	
		    echo "<td><a href='del_item.php?id=$data[items_id]' onclick='return show_confirm();'> Delete</a></td>";
			echo "</tr>";
			$dem++;
		    }
		    // đóng kết nối csdl
		    mysqli_close($conn);
			?>
		</table>
	</div>
	<?php 
    require("templates/footer.php");
 ?>
