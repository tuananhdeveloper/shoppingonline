<?php 
session_start();
$loi = array();
$loi["login"]=$loi["username"]=$loi["password"]=NULL;
 	// check thong tin nhap
if(isset($_POST["ok"])){
	if (empty($_POST["txtName"])) {
		$loi["username"] = " * Xin vui long nhap Username <br/> ";
	}
	else{
		$username = $_POST["txtName"];
	}
	if (empty($_POST["txtPass"])) {
		$loi["password"] = " * Xin vui long nhap Password <br/> ";
	}
	else{
		// $password =md5($_POST["txtPass"]) ;
		$password = $_POST["txtPass"] ;
	}
	if($username && $password) {
		// tao ket noi csdl
		$user="root";
		$pass="";
		$database="webdemo";
		$conn = mysqli_connect("localhost",$user,$pass,$database);
		// thuc hien cau truy van sql
		$result=mysqli_query($conn,"
			SELECT *
			FROM user
			WHERE username = '$username'
			AND PASSWORD = '$password'" );
		// Kiem tra phan biet user bang SESSION
		if (mysqli_num_rows($result)==1)
		{  
			$data=mysqli_fetch_assoc($result);
			//$data=array("username"=>"1","password"=>"admin",.....,"level"=>"2") 
			$_SESSION["level"] = $data["level"];
			if ($_SESSION["level"]==2) {
				header("location:admin/admin.php");
				exit();
			}
			else if($_SESSION["level"]==3){
				$_SESSION["username"]= $username;
				header("location:adminCN1/admin.php");
				exit();
			}
			else if($_SESSION["level"]==4){
				$_SESSION["username"]= $username;
				header("location:adminCN2/admin.php");
				exit();
			}
			else{
				$_SESSION["username"]= $username;
				header("location:index.php");
				exit();
			}
			
		}
		else{
			$loi["login"] ="* Wrong username or password <br/>";
		}
		mysqli_close($conn);
	}
}
require 'template/header.php';
?>
<!-- Login -->
<!-- <div class="login">
	<fieldset style="width: 300px ; height: 200px ; margin: 100px auto 10px;border: 2px solid red">
		<legend style="margin-top:60px; "> Login </legend>
		<form style="margin-left: 20px" action="login.php" method="post">
			<table>
				<tr> 
					<td> Username  </td>
					<td style="border: 1px solid #EEEEEE "> <input type="text" size="25" name="txtName"></td>
				</tr>
				<tr> 
					<td> Password   </td>
					<td style="border: 1px solid #EEEEEE "> <input type="Password" size="25" name="txtPass"></td>
				</tr>
				<tr>
					<td></td>
					<td ><input type="submit" value="Login" name="ok"></td>
				</tr>
			</table>
		</form>
	</fieldset>
</div> -->

<!-- template -->
<div class="wrapper">
	<form class="form-signin" action="login.php" method="post" >       
		<h2 class="form-signin-heading">Đăng nhập</h2>
		<table>
			<tr>
			<td>Tên  </td>
			<td><input type="text" class="form-control" name="txtName" placeholder="Tên.." required="" autofocus="" /></td>
			</tr>
			<tr>
				<td>Mật Khẩu  &nbsp</td>
				<td><input type="password"   class="form-control" name="txtPass" placeholder="Mật khẩu..." required=""/>     </td>
			</tr>
		</table>
		<label class="checkbox">
			<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Nhớ Mật Khẩu
		</label>
		<button class="btn btn-lg btn-primary btn-block" type="submit" value="Login" name="ok">Đăng Nhập</button>   
	</form>
</div>

<div style="width: 200px; height:200px; margin: 5px auto; text-align: center;color: red;">
	<?php 
	echo $loi["login"];
	echo $loi["username"];
	echo $loi["password"];
	?>
</div>

<!-- footer -->
<?php 
require 'template/footer.php';
?>