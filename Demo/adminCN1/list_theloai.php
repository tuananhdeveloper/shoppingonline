<?php 
	session_start();
    require("templates/header.php");
 ?>
 <!-- Table hien thi the loai -->
	<div id="wrapper">
		<table>
			<tr>
				<!-- gộp 2 cột thành 1 dùng colspan -->
				<td colspan="2"></td> 
				<td colspan="2" ><a href="add_theloai.php" style="color:#211CE4">Thêm thể loại</a></td>
			</tr>
			<tr>
				<td style="width: 50px"><b>STT</b></td>
				<td><b>Thể loại  </b></td>
				<td style="width: 100px"><b>Edit</b></td>
				<td style="width: 100px"><b>Delete</b></td>
			</tr>
<!-- Thuc hien code php de hien thi ra the loai -->
		<?php 
	    require("../library/config.php");
		$result = mysqli_query($conn,"select cate_id,cate_title from category");
		$dem=1;
		while ($data = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>$dem</td>";
		echo "<td>$data[cate_title]</td>";
		echo "<td><a href='edit_theloai.php?id=$data[cate_id]'>Edit</a></td>";
		echo "<td><a href='del_theloai.php?id=$data[cate_id]' onclick='return show_confirm();' style='color:#FA5757;'> Delete</a></td>";
		echo "</tr>";
		$dem++;

	}
		mysqli_close($conn);
		?>
		</table>
	</div>
<!-- footer -->
	<?php 
    require("templates/footer.php");
 ?>