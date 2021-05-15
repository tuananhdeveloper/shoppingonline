<?php 
session_start();
require("templates/header.php");
?>
<div id="wrapper">
	<table>
		<tr>
			<td><b>STT</b></td>
			<td><b>Username</b></td>
			<td><b>Email</b></td>
			<td><b>Level</b></td>
			<td><b>Branch</b></td>			
			<td><b>Delete</b></td>
		</tr>

		<?php 
	    require("../library/config.php");
		$result = mysqli_query($conn,"select user_id,username,email,level,branch from user where branch='CN1'");
		$dem=1;
		while ($data = mysqli_fetch_assoc($result)) {
		echo "<tr>";
			echo "<td>$dem</td>";
			echo "<td>$data[username]</td>";// do dùng echo nên có dấu ngoặc "" rồi vì thế $data[username] không cần dấu $data["username"]
			echo "<td>$data[email]</td>";
		if ($data['level']==1) {
			echo "<td>Member</td>";
		}
		else{
		echo "<td>Admin</td>";			
		}
		echo "<td>$data[branch]</td>";
		echo "<td><a href='del_user.php? id=$data[user_id]' onclick='return show_confirm();'> Delete </a></td>";		
		echo "</tr>";
		$dem++;

	}
		mysqli_close($conn);
		?>


	</table>
</div>
<?php 
require("templates/footer.php");
?>