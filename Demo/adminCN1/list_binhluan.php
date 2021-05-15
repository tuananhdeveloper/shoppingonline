<?php 
	session_start();
    require("templates/header.php");
 ?>
	<div id="wrapper">
		<table>
			<tr>
				<td style="width: 50px"><b>STT</b></td>
				<td><b>Name</b></td>
				<td><b>Message</b></td>
				<td style="width: 100px"><b>Link</b></td>
				<td style="width: 100px"><b>Approve</b></td>
				<td style="width: 100px"><b>Delete</b></td>
			</tr>
			<tr>
				<td>1</td>
				<td>Quang Phu</td>
				<td>Cuộc đời anh đã từng là bản nhạc buồn - Chỉ đợi em remix là a sẽ lên luôn.....</td>
				<td><a href="#">Xem</a></td>
				<td><a href="#">False</a></td>
				<td><a href="#">Delete</a></td>
			</tr>
			<tr>
				<td>2</td>
				<td>Hong Phong</td>
				<td>Cuộc đời anh đã từng là bản nhạc buồn - Chỉ đợi em remix là a sẽ lên luôn.....</td>
				<td><a href="#">Xem</a></td>
				<td><a href="#">False</a></td>
				<td><a href="#">Delete</a></td>
			</tr>
		</table>
	</div>
	<?php 
    require("templates/footer.php");
 ?>