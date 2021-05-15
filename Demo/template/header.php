<!DOCTYPE html>
<html>
<head>
	<title>Le Hong Phong</title>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" type="text/css" href="template/webstyle.css">
	<script src="jquery/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js" ></script>
</head>
<body>
	<header class="container">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">
					<img src="image/logo.png" alt="">

				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse" >
				<!-- form -->
				<div id="name"> Phụ Kiện<br/>Phong Phú</div>
 
				<!-- Chứng năng tìm kiếm -->
				<form class="navbar-form navbar-left" role="search" action="index.php" method="get">
					<div class="form-group">
						<input type="text" name="search" class="form-control" placeholder="Tìm kiếm...">
					</div>
					<button type="submit" name="ok" class="btn btn-default"  value="search">Tìm Kiếm</button>
				</form>

			<!-- Menu right -->
				<ul class="nav navbar-nav navbar-right">
					<li class="menuR"><a href="index.php" ><b class="glyphicon glyphicon-home" > Trang Chủ </b></a></li>
					<li class="menuR"><a href="#"><b class="glyphicon glyphicon-file"> Phụ Kiện </b></a>
						<ul class="drop-menu">
							
							<!-- lay gia tri the loai hien thi ra menu phu kien -->
							<?php 
								require("library/config.php");
								$result = mysqli_query($conn,"select cate_id,cate_title from category");
								while($data = mysqli_fetch_assoc($result)){
									echo "<li> <a href='category.php?id=$data[cate_id]'>$data[cate_title]</a></li>";
								}
								mysqli_close($conn);
							?>

						</ul>
	
					</li>
					<li class="menuR"><a href="viewCart.php"><b class="glyphicon glyphicon-shopping-cart"> Giỏ Hàng </b></a></li>
					
					<!-- PHP thực hiện lấy tên SESSION -->
				<?php 
				if (isset($_SESSION["username"])) {

				 echo "<li class='menuR'><a ><p class='glyphicon glyphicon-user'> "."<b>".$_SESSION["username"]."</b></p></a></li>";
				 echo "<li class='menuR'><a href='logout.php''><b > Logout </b></a></li>";
				}
				else{
					echo "<li class='menuR'><a href='login.php'><b class='glyphicon glyphicon-user'> Đăng Nhập </b></a></li>";
					echo "<li class='menuR'><a href='register.php'><b class='glyphicon glyphicon-pencil'> Đăng Ký </b></a></li>";
				}
			?>
</ul>

		</div><!-- /.navbar-collapse -->
	</nav>
</headera>