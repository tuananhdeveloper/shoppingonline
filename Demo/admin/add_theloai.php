<?php 
  require("templates/header.php");

  $loi= array();
  $loi["catename"]=NULL;
  $catename= NULL;

  if(isset($_POST["ok"])){
  	// kiem tra co the loai moi chua
  	if(empty($_POST["txtname"])){
  		$loi["catename"]="* xin vui lòng nhập tên thể loại mới !";
  	}
  	else{
  		$catename=$_POST["txtname"];
  	}

  	if ($catename) {
  		// ket noi csdl
  		require("../library/config.php");
  		//thuc hien truy van
  		mysqli_query($conn,"insert into category(cate_title) values('$catename') ");
  		$loi["catename"]="* thêm thành công *";
  		mysqli_close($conn);
  	}
  }
?>
<!-- Form thêm thể loại -->
<div id="wrapper2">
	<fieldset style="width:30px; margin:50px auto 20px;">
		<legend> Thêm Thể Loại</legend>
		<form action="add_theloai.php" method="post">
			<table>
				<tr>
					<td> Name:</td>
					<td> <input type="text" size= "25px" name="txtname"></td>
				</tr>
				<tr>
				 <td></td>
				 <td><input type="submit" value="Thêm" name="ok"></td> 
				</tr>
			</table>
		</form>

	</fieldset>
</div>
<!-- hien thi lỗi khi thêm thể loại -->
<div style="width:300px; margin: 10px auto 10px; text-align: center; color:red">
	<?php
	echo $loi["catename"];
	?>
</div>
<!-- Footer -->
<?php 
 require("templates/footer.php");
?>