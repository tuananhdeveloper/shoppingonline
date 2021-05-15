<?php 
require 'template/header.php';
$loi = array();
$username=$password=$email=$day=$month=$year=$gender=$branch=NULL;
$loi["username"] = $loi["password"] = $loi["email"] = $loi["birthday"] = NULL;
$loi["gender"]=$loi["register"]=$loi["branch"]=NULL;
if (isset($_POST["ok"])) {
	/* 	kiểm tra xem đã nhập vào user name chưa*/
	if (empty($_POST["txtName"])) {
		$loi["username"] = "* Xin vui long nhap lai Username <br/>";
	}
	else{
		$username=$_POST["txtName"];
	}
// Check da nhap pass chua
	if (empty($_POST["txtPass"])) {
		$loi["password"] = "* Xin vui long nhap lai Password <br/>";
	}
	else{
		//mã hóa password
		$password=md5($_POST["txtPass"]);
	}
// check email da nhap hay chua
	if (empty($_POST["txtEmail"])) {
		$loi["email"] = "* Xin vui long nhap lai Email <br/>";
	}
	else{
		$email=$_POST["txtEmail"];
	}
// check ngay da chon hay chua
	if ($_POST["day"]=="ngay" || $_POST["month"]=="thang"||$_POST["year"]=="nam"   ) {
		$loi["birthday"] = "* Xin vui long chon Birthday <br/>";
	}
	else{
		$day=$_POST["day"];
		$month=$_POST["month"];
		$year=$_POST["year"];
	}
// check gender
	if(empty($_POST["gender"])){
		$loi["gender"] = "* Xin vui long chon Gender <br/>";
	}
	else{
		$gender=$_POST["gender"];
	}
//check branch
	if (empty($_POST["branch"])) {
		$loi["branch"] = "* Xin vui long chon branch <br/>";
	}
	else{
		$branch=$_POST["branch"];
	}
	if ($username && $password && $email && $day && $month && $year && $gender && $branch) {
// ket noi voi csdl-----------------------------------------------
		// $user="root";
		// $pass="";
		// $conn = mysql_connect("localhost",$user,$name);
		// mysql_select_db("webdemo",$conn);
		// // thuc hien cau truy van sql
		// $result=mysql_query("select * from user where username='$username'");
		// if (mysql_num_rows($result)==0) {
		// 	mysql_query("insert into user (username,password,email,birthday,gender,level)
		// 		values ('$username','$password','$email','$year-$month-$day','$gender','1')");
		// 	$loi["register"]="* Đang ky than cong, <a href='login.php'> Login </a> để vào website <br/> "   ;
		// }
		// else{
		// 	$loi["register"]=" * Username của bạn đã tồn tại. Vui lòng đăng ký lại <br/>";
		// }
		// // Kết thuc 
		// mysql_close($conn);
// ------------------------------------------------------------------------------------------------
// khởi tạo kết nối
		$connect = mysqli_connect('localhost', 'root', '', 'webdemo');
//Kiểm tra kết nối
		if (!$connect) {
			die('kết nối không thành công ' . mysqli_connect_error());
		}
// Kiểm tra xem tồn tại người dùng chưa
		$result=mysqli_query($connect,"select * from user where username='$username'");
		if (mysqli_num_rows($result)==0){
//câu truy vấn
		$sql=mysqli_query($connect,"INSERT  INTO user (username,password,email,birthday,gender,level,branch)
								VALUES ('$username','$password','$email','$year-$month-$day','$gender','1','$branch')");

		$loi["register"]="* Đang ky than cong, <a href='login.php'> Login </a> để vào website <br/> "   ;
		}
		else{
			$loi["register"]=" * Username của bạn đã tồn tại. Vui lòng đăng ký lại <br/>";
		}


//ngắt kết nối
		mysqli_close($connect);

	}
}
?>
<!-- Register -->
<div class="register">
	<fieldset >
		<legend> <b>Form Register</b> </legend>
		<form style="margin-left: 20px" action="register.php" method="post">
			<table id="tableCSS">
				<tr > 
					<td class="bold"> Tên  </td>
					<td> <input type="text" size="25" name="txtName" ></td>
				</tr>
				<tr> 
					<td class="bold" > Mật Khẩu  </td>
					<td> <input type="Password" size="25" name="txtPass"></td>
				</tr>
				<tr> 
					<td class="bold" > Email  </td>
					<td> <input type="text" size="25" name="txtEmail"></td>
				</tr>
				<tr>
					<td class="bold"> Ngày Sinh</td>
					<td>
						<select name="day">
							<option value="ngay">Ngay</option>
							<?php 
							for($i=1 ;$i<=30;$i++)
								echo "<option value='$i'> $i </option>";
							?>
						</select>
						<select name="month">
							<option value="thang">Thang</option>
							<?php 
							$thang = array(1=> " Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
							foreach ($thang as $key=>$tam ) {
								echo "<option value='$key'> $tam </option>";
							}
							?>
						</select>
						<select name="year"> 
							<option value="nam"> Nam </option>
							<?php 
							for($nam = 1990 ; $nam<=date(Y);$nam++)
								echo "<option value='$nam'> $nam </option>";
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="bold" >Giới Tính </td>
					<td>
						<input type="radio" name="gender" value="1"> Nam
						<input type="radio" name="gender" value="2"> Nữ
					</td>
				</tr>
				<tr>
					<td class="bold" >Chi Nhánh 	</td>
					<td>
						<input type="radio" name="branch" value="CN1"> Miền Bắc
						<input type="radio" name="branch" value="CN2"> Miền Nam
					</td>
				</tr>
				<tr >
					<td></td>
					<td class="bold"><input style="width:100px" type="submit" value="Register" name="ok"></td>
				</tr>
			</table>
		</form>
	</fieldset>
</div>

<div style="width: 300px; height:150px; margin: 10px auto; text-align: center;color: red;">
	<?php 
	echo $loi["username"];
	echo $loi["password"];
	echo $loi["email"];
	echo $loi["birthday"];
	echo $loi["gender"];
	echo $loi["register"];
	echo $loi["branch"];
	?>
</div>
<!-- footer -->
<?php 
require 'template/footer.php';
?>