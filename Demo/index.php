<?php 
header("Content-type: text/html; charset=utf-8");
session_start();
require 'template/header.php';

 ?>
   <body background="">
 
	<!-- Slide -->
	<section >
		<div class="container fixSlide" >
			<div class="row">
				<div class="col-md-12">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							<li data-target="#carousel-example-generic" data-slide-to="3"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">

							<div class="item active">
								<img src="image/nova3.png" alt="nova">
							</div>

							<div class="item">
								<img src="image/vivo.jpg" alt="vivo">
							</div>

							<div class="item">
								<img src="image/galaxy.jpg" alt="samsung">
							</div>

							<div class="item">
								<img src="image/oppo.png" alt="oppo">
							</div>
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Body show sản phẩm -->

	<section>

		<div class="containe fixSale">

<!-- VIết chức năng tìm kiếm -->
			<?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {   
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
 
                // Kết nối sql
                require("library/config.php");
 
                // Thực thi câu truy vấn
                $sql = mysqli_query($conn,"select * from items where name like '%$search%'");
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "<div class='row row1'>";
                    echo "<h3 style='margin-left: 15px;'> <b>Sản phẩm tìm kiếm:</b> $num kết quả trả về với từ khóa <b>$search</b></h3>";
 
                    // Tra ve du lieu
                    while ($data1 = mysqli_fetch_assoc($sql)) {
		                echo "<div class='col-sm-6 col-md-3'>";
						echo "<div class='thumbnail'>";	
						echo "<img src='image/$data1[image]' style='height:210px;width:200px;'>";		
						echo "<div class='caption'>";		
						echo"<h3>$data1[name]</h3>";
						echo "<p style='color: red'><b>$data1[price]đ</b></p>";
						echo "<p><a href='addCart.php?id=$data[items_id]' class='btn btn-primary' role='button'>Mua Ngay</a>
								  <a href='detail.php?id=$data1[items_id]' class='btn btn-default'  role='button'>Xem Nhanh</a>
									</p>";			
						echo "</div>";		
						echo "</div>";	
						echo "</div>";
                    }
                    echo '</div>';
                } 
                else {
                	echo "<div style='margin:50px auto 50px'><b style='color: red'> Không tìm thấy kết quả !</b></div>";
				
                }
            }
        }
        ?>   
		<!-- done chức năng tìm kiếm -->

		 <!-- Hiển thị sản phẩm ra ngoài giao diện chính khi thêm vào csdl -->

			<?php			
				require("library/config.php");
				$result = mysqli_query($conn,"select items_id,name,image,price from items order by items_id desc limit 4"); // Ngoài ra để phân chia chuyên mục theo từng sản phẩm ta thêm đoạn "where cate_id = $id " trước order by thể là ok
				echo "<div class='row row2'>";
				echo "<h3 style='margin-left: 15px;'> <b>Sản phẩm mới nhất</b></h3>";
				while($data = mysqli_fetch_assoc($result)){
					echo "<div class='col-sm-6 col-md-3'>";
					echo "<div class='thumbnail'>";	
					echo "<img src='image/$data[image]' style='height:210px;width:200px;'>";		
					echo "<div class='caption'>";		
					echo"<h3>$data[name]</h3>";
					echo "<p style='color: red'><b>$data[price]đ</b></p>";
					echo "<p><a href='addCart.php?id=$data[items_id]' class='btn btn-primary' role='button'>Mua Ngay</a>
							  <a href='detail.php?id=$data[items_id]' class='btn btn-default'  role='button'>Xem Nhanh</a>
								</p>";			
					echo "</div>";		
					echo "</div>";	
					echo "</div>";
			  }	
			    echo"</div>";		
		

			 // Hiển thị sản phẩm ra ngoài màn hình khi thêm vào csdl
				
				// require("library/config.php");
				$result2 = mysqli_query($conn,"select  items_id,name,image,price from items");
				echo "<div class='row row3'>";
				echo "<h3 style='margin-left: 15px;'> <b>Tất cả phụ kiện</b></h3>";
				while($data2 = mysqli_fetch_assoc($result2)){
					echo "<div class='col-sm-6 col-md-3'>";
					echo "<div class='thumbnail'>";	
					echo "<img src='image/$data2[image]' style='height:210px;width:200px;'>";		
					echo "<div class='caption'>";		
					echo"<h3>$data2[name]</h3>";
					echo "<p style='color: red'><b>$data2[price]đ</b></p>";
					echo "<p><a href='addCart.php?id=$data2[items_id]' class='btn btn-primary' role='button'>Mua Ngay</a>
							  <a href='detail.php?id=$data2[items_id]' class='btn btn-default'  role='button'>Xem Nhanh</a>
								</p>";			
					echo "</div>";		
					echo "</div>";
					echo "</div>";
			}	
			    echo "</div>"; 
			 ?>


			<!-- Code show sản phẩm html -->
				<!-- <div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<img src="image/galaxy_a7.png" alt="...">
						<div class="caption">
							<h3>Samsung Galaxy A7 (2017)</h3>
							<p>1.450.000đ</p>
							<p><a href="#" class="btn btn-primary" role="button">Mua Ngay</a>
								<a href="#" class="btn btn-default" role="button">Xem Nhanh</a>
							</p>
						</div>
					</div>
				</div> -->
	
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