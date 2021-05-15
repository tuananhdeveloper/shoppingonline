<!DOCTYPE html>
<html>
<head>
	<title>
		PK Phong Phu
	</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- tao ham javascript hoi xem co muon xoa ko ?? -->
	<script language="javascript">
		function show_confirm() {
			if(confirm("Bạn có muốn xóa dòng dữ liệu này không ?")){
				return true;
			}
			else{
				return false;
			}
		}

	</script>
</head>
<body>
	<div id="top"> 
		<h3> Welcome Admin <a href="../logout.php"> >>>Logout<<< </a>
		</h3>
	</div>
	<div>
		<ul id="menu">
		    <li> <a href="list_user.php">Quản lý thành viên</a></li>
			<li> <a href="list_mathang.php">Quản lý sản phẩm</a></li>
			<li> <a href="list_theloai.php">Quản lý thể loại</a></li>
			<li> <a href="list_giohang.php">Quản lý giỏ hàng</a></li>
			<li> <a href="list_detail.php">Chi tiết sản phẩm</a></li>

		</ul>
	</div>