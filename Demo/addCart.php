<?php
session_start(); 
require("template/header.php");
$id=$_GET["id"];
?>
<div class="container" >
<div class="viewCart" style="width: 500px; height:auto ; margin: 50px auto;"> 
<h1> Thông Tin Giỏ Hàng </h1>
<?php 
/*----------Code Gio Hang ----------------*/
if (isset($_GET["id"])) {

	require("library/config.php");
	$result=mysqli_query($conn,"select * from items where items_id=$id");
	$data= mysqli_fetch_assoc($result);
	if (!empty($_SESSION["cart"])) {
		// kiem tra mua hang lan thu 2 da co ID trong phan tu mang
		$cart = $_SESSION["cart"];
		if (array_key_exists($id, $cart)) {
			$cart[$id]=array(
				"id"=>$data["items_id"],
				"quantity"=>(int)$cart[$id]["quantity"]+1,
				"price"=>$data["price"],
				"name"=>$data["name"]
			);
		} else{
			$cart[$id]=array(
				"id"=>$data["items_id"],
				"quantity"=>1,
				"price"=>$data["price"],
				"name"=>$data["name"]
			);
		}
	} else{
		$cart[$id]=array(
				"id"=>$data["items_id"],
				"quantity"=>1,
				"price"=>$data["price"],
				"name"=>$data["name"]
			);
	}
	$_SESSION["cart"]=$cart;
}
else{

}
 header("location:viewCart.php");

 
 ?>
</div> 
</div>
<?php 
require 'template/footer.php';
?>