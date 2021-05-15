<?php 
    session_start();
    require("templates/header.php");

$loi=array();
$loi["name"]=$loi["image"]=$loi["intro"]=$loi["price"]=$loi["quantity"]=$loi["branch"]=$loi["insert"]=NULL;
$cate_id=$name=$image=$intro=$price=$quantity=$branch=NULL;
    if (isset($_POST["ok"])) {
        // lấy cate_id mà người dùng đã lựa chọn
        $cate_id=$_POST["txtcate"];

        // check thông tin tên sản phẩm
        if (empty($_POST["txtname"])) {
            $loi["name"]="* Xin vui lòng nhập tên sản phẩm mới ! </br>";
        }
        else{
            $name=$_POST["txtname"];    
        }

        // check có chọn hình ảnh chưa
        if ($_FILES["image"]["error"]>0) {
            $loi["image"]="* Xin vui lòng chọn file hình ảnh cho sản phẩm!</br>";
        }
        else{
            $image=$_FILES["image"]["name"];// lấy tên file khi click thêm
        }

        // check thông tin intro
        if (empty($_POST["txtintro"])) {
            $loi["intro"]="* Xin vui lòng nhập thông tin sản phẩm !</br>";
        }
        else{
            $intro=$_POST["txtintro"];  
        }

        // check thong tin gia
        if (empty($_POST["txtprice"])) {
            $loi["price"]="* Xin vui lòng nhập giá sản phẩm !</br>";
        }
        else{
            $price=$_POST["txtprice"];  
        }
        // check so luong
        if (empty($_POST["txtquantity"])) {
            $loi["quantity"]="* Xin vui lòng nhập số lượng !</br>";
        }
        else{
            $quantity=$_POST["txtquantity"];  
        }
        // chech chi nhanh
        if (empty($_POST["txtbranch"])) {
            $loi["branch"]="* Xin vui lòng nhập chi nhánh !</br>";
        }
        else{
            $branch=$_POST["txtbranch"];  
        }

        if ($cate_id & $name & $image & $intro & $price & $quantity & $branch ) {
        // ket noi csdl
        require("../library/config.php");
        
        //thuc hien truy van
        mysqli_query($conn,"insert into items(name,image,introduce,price,quantity,branch,cate_id) 
            values('$name','$image','$intro','$price','$quantity','$branch','$cate_id')");
        $loi["insert"]="* thêm thành công *</br>";
        mysqli_close($conn);

        // upload file ảnh vào image
        move_uploaded_file($_FILES["image"]["tmp_name"],"../image/".$_FILES["image"]["name"]);
        }

    }
 ?>
 <div id="wrapper2">
    <fieldset style="width: 600px; margin: 50px auto 10px;">
        <legend>Thêm Sản Phẩm</legend>
        <form action="add_item.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <?php
                    echo "<td> Thể Loại</td>";
                    echo "<td>";
                    echo "<select name='txtcate'>";
                    // hiển thi lựa chọn theo các thể loại
                    require("../library/config.php");
                    $result = mysqli_query($conn,"select cate_id,cate_title from category");
                    while($data = mysqli_fetch_assoc($result)){
                    echo "<option value='$data[cate_id]'>$data[cate_title]</option>"; 
                    }
                    echo "</select>";
                    echo "</td>";
                    ?>
                </tr>
                <tr> 
                    <td> Tên sản phẩm</td>
                    <td><input type="text" name="txtname" size="50px"></td>
                </tr>
                <tr> 
                    <td> Hình Ảnh</td>
                    <td><input type="file" name="image" size="50px"></td>
                </tr>
                <tr> 
                    <td> Mô Tả</td>
                    <td><textarea cols="50" rows="5" name="txtintro"></textarea></td>
                </tr>
                <tr> 
                    <td>Giá</td>
                    <td><input type="number" name="txtprice" size="10px"></td>
                </tr>
                <tr> 
                    <td>Số Lượng</td>
                    <td><input type="number" name="txtquantity" size="10px"></td>
                </tr>
                <tr> 
                    <td> Chi Nhánh</td>
                    <td><input type="text" name="txtbranch" size="5px"></td>
                </tr>
                <tr> 
                    <td></td>
                    <td><input type="submit" name="ok" value="Thêm"></td>
                </tr>
            </table>
        </form>
    </fieldset>
 </div>
 <!-- show loi -->
<div style="width:300px; margin: 10px auto 10px; text-align: center; color:red">
    <?php
    echo $loi["name"];
    echo $loi["image"];
    echo $loi["intro"];
    echo $loi["price"];
    echo $loi["quantity"];
    echo $loi["branch"];
    echo $loi["insert"];
    ?>
</div>
 <!-- Footer -->
<?php 
 require("templates/footer.php");
?>