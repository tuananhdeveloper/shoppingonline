<?php 
session_start();
require("templates/header.php");


$id=$_GET["id"];// lấy id khi click vào edit bên list_theloai.php

//lấy giá trị cate_title để hiện ra form update
require("../library/config.php");
$result= mysqli_query($conn,"select cate_title from category where cate_id=$id");
$data = mysqli_fetch_assoc($result);

// xu lý upload hiển thị lại trên csdl

$loi=array();
$loi["catename"]=NULL;
$catename=NULL;

if(isset($_POST["ok"])){
  if(empty($_POST["txtname"])){
    $loi["catename"]="* Xin vui lòng nhật thể loại cần chỉnh sửa !";
  }
  else{
    $catename=$_POST["txtname"];
  }

  if($catename){
   require("../library/config.php");
   mysqli_query($conn,"update category set cate_title ='$catename' where cate_id=$id ");
   mysqli_close($conn);
// chuyen sang trang khi update thành công
   header("location:list_theloai.php");
   exit();
 }
 
}
?>

<div id="wrapper2">
	<fieldset style="width:30px; margin:50px auto 20px;">
		<legend> Chỉnh Sửa Thể Loại</legend>
    <!-- chú ý chỗ này action phải là edit_theloai.php + giá trị id trên đầu-->
    <form action="edit_theloai.php?id=<?php echo $id;?>" method="post">
     <table>
      <tr>
       <td> Name:</td>
       <!-- thêm PHP để hiện thị ra name cate_title cần update -->
       <td> <input type="text" size= "25px" value="<?php echo $data['cate_title']; ?>" name="txtname"></td>
     </tr>
     <tr>
       <td></td>
       <td><input type="submit" value="Cập Nhật" name="ok"></td> 
     </tr>
   </table>
 </form>
</fieldset>
</div>

<div style="width:300px; margin: 10px auto 10px; text-align: center; color:red">
  <?php
  echo $loi["catename"];
  ?>
  
</div>

<?php 
// dong ket noi csdl
mysqli_close($conn);
require("templates/footer.php");
?>