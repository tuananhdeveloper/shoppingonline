<?php 
session_start();
require("templates/header.php");

$id=$_GET["id"];// lay id khi click vao edit san pham tai page admin

// Khai bao global
$loi=array();
$loi["name"]=$loi["intro"]=$loi["price"]=$loi["quantity"]=$loi["branch"]=$loi["update"]=NULL;
$cate_id=$name=$image=$intro=$price=$quantity=$branch=NULL;
if(isset($_POST["ok"])){
    // lấy cate_id mà người dùng đã lựa chọn
    $cate_id=$_POST["txtcate"];

        // check thông tin tên sản phẩm
    if (empty($_POST["txtname"])) {
        $loi["name"]="* Xin vui lòng nhập tên sản phẩm mới ! </br>";
    }
    else{
        $name=$_POST["txtname"];    
    }

        // người dùng ko lựa chọn tấm hình mới
    if ($_FILES["image"]["error"]>0) {
        $image="none";
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
    // Check so luong
        if (empty($_POST["txtquantity"])) {
            $loi["quantity"]="* Xin vui lòng nhập giá sản phẩm !</br>";
        }
        else{
            $quantity=$_POST["txtquantity"];  
        }


    // Check barch
        if (empty($_POST["txtbranch"])) {
            $loi["branch"]="* Xin vui lòng nhập giá sản phẩm !</br>";
        }
        else{
            $branch=$_POST["txtbranch"];  
        }


    if ( $cate_id & $name & $image & $intro & $price & $quantity & $branch) {
        // ket noi csdl
            require("../library/config.php");
            if($image=='none'){
        //thuc hien truy van
            mysqli_query($conn,"update items set cate_id='$cate_id',name='$name',introduce='$intro',price='$price' where items_id=$id ");   
            }
            else{
            mysqli_query($conn,"update items set cate_id='$cate_id',name='$name',image='$image',introduce='$intro',price='$price' where items_id=$id ");    
            // upload file ảnh vào image
            move_uploaded_file($_FILES["image"]["tmp_name"],"../image/".$_FILES["image"]["name"]);
            }
            $loi["update"]="* thêm thành công *</br>";
            mysqli_close($conn);

        }
    else{
        $loi["update"]="* Upload thieu thong tin *</br>";
    }
    }

    // Ket noi csdl
        require("../library/config.php");
    // thuc hien cau truy van hien thi thong tin bai viet trong csdl ra form
        $result2 = mysqli_query($conn,"select cate_id,items_id,name,image,introduce,price,quantity,branch from items where items_id=$id");
        $data2 = mysqli_fetch_assoc($result2);

?>

<div id="wrapper2">
    <fieldset style="width: 600px; margin: 50px auto 10px;">
    <legend> <b>Chỉnh Sửa Sản Phẩm</b> </legend>
    <form action="edit_item.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <table>
    <tr>
        <td> Thể Loại</td>
        <td>
            <select name='txtcate'>
                <?php
                require("../library/config.php");
                $result = mysqli_query($conn,"select cate_id,cate_title from category");
                while($data = mysqli_fetch_assoc($result)){
                    if ($data2['cate_id']==$data['cate_id']) {
                        echo "<option value='$data[cate_id]' selected='selected'>$data[cate_title]</option>";
                    }
                    else{
                        echo "<option value='$data[cate_id]'>$data[cate_title]</option>"; 
                    }
                }
                mysqli_close($conn);
                ?>
            </select>
<!---------------------------- Test Select -------------------------------------->
<!-- <option value='1'<?php if($data2['cate_id']==1){ echo 'selected="selected"';}?> > Ốp silicon </option>
<option value='2'<?php if($data2['cate_id']==2){ echo 'selected="selected"';}?> > Tai nghe </option>
<option value='3'<?php if($data2['cate_id']==3){ echo 'selected="selected"';}?> > Điện thoại </option> -->
<!-- -------------------------End Test Select ---------------------------->
        </td>
    </tr>

    <tr> 
        <td> Tên sản phẩm</td>
        <td><input type="text" name="txtname" size="50px" value="<?php echo $data2['name'] ;?>"></td>
    </tr>

    <tr> 
        <td> Hình Ảnh Cũ</td>
        <td><img src="../image/<?php echo $data2['image'];?>" width=140px alt=""/></td>
    </tr>

    <tr> 
        <td> Hình Ảnh Mới</td>
        <td><input type="file" name="image" size="50px"></td>
    </tr>

    <tr> 
        <td> Mô Tả</td>
        <!-- chú ý để hiện thị ra introduce thì ko được gán vào value vì đây là thẻ textarea -->
        <td><textarea cols="50" rows="5" name="txtintro" > <?php echo $data2['introduce']; ?> </textarea></td> 
    </tr>

    <tr> 
        <td>Giá</td>
        <td><input type="number" name="txtprice" size="10px" value="<?php echo $data2['price']; ?>"></td>
    </tr>

    <tr> 
        <td>Số Lượng</td>
        <td><input type="number" name="txtquantity" size="10px" value="<?php echo $data2['quantity']; ?>"></td>
    </tr>
    <tr> 
        <td> Chi Nhánh</td>
        <td><input type="text" name="txtbranch" size="5px" value="<?php echo $data2['branch'] ;?>"></td>
    </tr>

    <tr> 
        <td></td>
        <td><input type="submit" name="ok" value="Upload"></td>
    </tr>
</table>
</form>
</fieldset>
</div>
<!-- show loi -->
<div style="width:300px; margin: 10px auto 10px; text-align: center; color:red">
    <?php
    echo $loi["name"];
    echo $loi["intro"];
    echo $loi["price"];
    echo $loi["quantity"];
    echo $loi["branch"];
    echo $loi["update"];
    ?>
</div>

<?php 
require("templates/footer.php");
 ?>