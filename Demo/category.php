<?php 
session_start();
require 'template/header.php';
$id=$_GET["id"];// Lay gia tri id tren url trinh duyet
 ?>
   <body background="">
 
	<!-- banner -->
	<section >
		<div class="container fixSlide" >
			<div class="row">
			<img src="image/banner.gif" alt="" style="width: 1140px; margin-left: 15px;">
			</div>
		</div>
	</section>
	
	<!-- Body show sản phẩm -->
<?php 
	echo"<section>";

	echo "<div class='containe fixSale'>";
			echo"<div class='row'>";
			require("library/config.php");
				
				$result2 = mysqli_query($conn,"select cate_title from category where cate_id=$id");
				$data2 = mysqli_fetch_assoc($result2);
				echo"<h3 style='margin-left: 15px;'> <b> $data2[cate_title] </b></h3>";
			// Hiển thị sản phẩm ra ngoài màn hình khi thêm vào csdl 
			    $result = mysqli_query($conn,"select items_id,name,image,price,cate_id from items where cate_id=$id order by items_id desc limit 4"); // "where cate_id = $id " trước order by là để phân chuyên mục
				while($data = mysqli_fetch_assoc($result)){
				echo "<div class='col-sm-6 col-md-3'>";
				echo "<div class='thumbnail'>";	
				echo "<img src='image/$data[image]' style='height:210px;width:200px;'>";		
				echo "<div class='caption'>";		
				echo"<h3>$data[name]</h3>";
				echo "<p style='color: red'><b>$data[price]đ</b></p>";
				echo "<p><a href='#'' class='btn btn-primary' role='button'>Mua Ngay</a>
						  <a href='detail.php?id=$data[items_id]' class='btn btn-default'  role='button'>Xem Nhanh</a>
							</p>";			
				echo "</div>";		
				echo "</div>";	
				echo "</div>";
			}	
			echo"</div>";
				?>
						

			</div>
		</div>
	</section>
	<!-- next continue -->
	<section>
		<ul class="pagination">
			<li><a href="#">&laquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">&raquo;</a></li>
		</ul>
	</section>
  	
   </body>

 	<?php 
require 'template/footer.php';
 ?>