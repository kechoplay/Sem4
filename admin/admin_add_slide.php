<?php
include_once 'admin_header.php';

$objsli=new Slide();
// $listCate=$objcate->showListPro();
$where=array();
$where[]="parent_id <> 0";
$where[]="cat_status=1";
$order=" order by cat_id asc";
// $listCateId=$objcate->showListCate($where,$order);
// echo "<pre>";
// print_r($listCateId);

if(isset($_GET['sliid'])){
	$sliid=$_GET['sliid'];
  $sli=$objsli->showSlideId($sliid);
//     echo "<pre>";
// print_r($sli);
}
$data=array();

if(isset($_POST["save"])){
  $set[]=array();
  $error=array();
  $sliname=$_POST['sliname'];
  $slilink=$_POST['slilink'];
  $status=$_POST['status'];

  if(empty($sliname)){
    $error['sliname']='Không được để trống trường nội dung nào!';
  }
  if(empty($slilink)){
    $error['slilink']="Không được để trống trường nội dung nào!";
  }
  if(!($_FILES['sua_image']['name']) && empty($_POST['image'])){
    $error['image']="Không được để trống trường nội dung nào!";
  }
  if(!$error){
    if(isset($_GET['sliid'])){
      if (($_FILES['sua_image']['name'])!=null) {
        if($_FILES['sua_image']['type'] == "image/jpeg" || $_FILES['sua_image']['type'] == "image/png" || $_FILES['sua_image']['type'] == "image/gif"){
          $name=$_FILES['sua_image']['name'];
          $path=$_FILES['sua_image']['tmp_name'];
          $new_path="../hinhanh/slide/".$name;
          $image_upload=move_uploaded_file($path,$new_path);
          $image_name=$name;
        }else{
          $error['image']="Vui lòng chọn file";
        }
      }else{
        $image_name=$_POST['image'];
      }

      $sliid=$_GET['sliid'];
      $objsli->updateSlide($sliname,$image_name,$slilink,$status,$sliid);
    }else{
      if($_FILES['sua_image']['type'] == "image/jpeg" || $_FILES['sua_image']['type'] == "image/png" || $_FILES['sua_image']['type'] == "image/gif"){
        $name=$_FILES['sua_image']['name'];
        $path=$_FILES['sua_image']['tmp_name'];
        $new_path="../hinhanh/slide/".$name;
        $image_upload=move_uploaded_file($path,$new_path);
        $objsli->insertSLide($sliname,$name,$slilink,$status);
      }else{
        $error['image']="Vui lòng chọn file";
      }
    }
  }
}
?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Slide
					<small><?php echo isset($_GET['sliid']) ? "Sửa" : "Thêm" ?></small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-7" style="padding-bottom:120px">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Tên slide</label>
            <input class="form-control" name="sliname" value="<?php echo isset($_GET['sliid']) ? $sli[1] : '' ?>" placeholder="Nhập tên slide" />
            <?php echo isset($error['sliname']) ? $error['sliname'] : ""; ?>
          </div>
          <div class="form-group">
            <label>Hình ảnh</label><br>
            <img src="../hinhanh/slide/<?php echo isset($_GET['sliid']) ? $sli[2] : '../avatar_2x.png' ?>" style="width:150px">
            <input type="file" name="sua_image">
            <input type="hidden" name="image" value="<?php echo isset($_GET['sliid']) ? $sli[2] : '' ?>">
            <?php echo isset($error['image']) ? $error['image'] : ""; ?>
          </div>
          <div class="form-group">
            <label>Link</label>
            <input class="form-control" name="slilink" type="text" value="<?php echo isset($_GET['sliid']) ? $sli[3] : '' ?>" placeholder="Nhập link" />
            <?php echo isset($error['slilink']) ? $error['slilink'] : "" ?>
          </div>
          <div class="form-group">
            <label>Trạng thái</label>
            <?php
            if(isset($sli[4])){
             if($sli[4]==1){
              ?>
              <label class="radio-inline">
               <input name="status" value="1" checked="" type="radio">Hiện
             </label>
             <label class="radio-inline">
               <input name="status" value="2" type="radio">Ẩn
             </label>
             <?php
           }elseif($sli[4]==2){
            ?>
            <label class="radio-inline">
             <input name="status" value="1" type="radio">Hiện
           </label>
           <label class="radio-inline">
             <input name="status" value="2" checked="" type="radio">Ẩn
           </label>
           <?php
         }
       }else{
         ?>
         <label class="radio-inline">
          <input name="status" value="1" checked="" type="radio">Hiện
        </label>
        <label class="radio-inline">
          <input name="status" value="2" type="radio">Ẩn
        </label>
        <?php
      }
      ?>
    </div>
    <button type="submit" name="save" class="btn btn-default">Lưu</button>
    <button type="reset" class="btn btn-default">Reset</button>
  </form>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#addImage').click(function(){
      $('#insert').append('<div class="form-group"><input type="file" name="fileDetail[]"></div>');
    });
  });
</script>
<?php

include_once 'admin_footer.php';

?>