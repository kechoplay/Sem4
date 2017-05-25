<?php

include_once 'admin_header.php';

$objcate=new Category();

$where=" where cat_status=1";
$listCate=$objcate->showListCate($where);

$data=array();
$error=array();

if(isset($_GET['catid'])){
	$catid=$_GET['catid'];
	$listcateId=$objcate->showListCateid($catid);
	 // echo "<pre>";
  //   print_r($listcateId);
}

if(isset($_POST['save'])){
	$catname=$_POST['catname'];
	$parent_id=$_POST['parent_id'];
	$sort_order=$_POST['sort_order'];
	$status=$_POST['status'];
	if (isset($_GET['catid'])) {
		$catid=$_GET['catid'];
		if (mysql_num_rows(mysql_query("select * from danhmuc where cat_name like '$catname' and cat_name != '$listcateId[1]'"))>0){
			$error['catname']="Danh mục đã tồn tại";
		}
		if(empty($catname)){
			$error['catname']="Bạn không được để trống";
		}
		if (mysql_num_rows(mysql_query("select * from danhmuc where sort_order = $sort_order and sort_order != $listcateId[3]"))>0){
			$error['sort_order']="Vị trí đã tồn tại";
		}
		if(empty($sort_order)){
			$error['sort_order']="Bạn không được để trống";
		}
		if(!$error){
			$objcate->updateCategory($catname,$parent_id,$sort_order,$status,$catid);
		}
	}else{

		$query3=mysql_query("select * from danhmuc where cat_name like '$catname'");
		$row=mysql_num_rows($query3);

		$query4=mysql_query("select * from danhmuc where sort_order=$sort_order and parent_id=$parent_id");
		$row2=mysql_num_rows($query4);

		if(empty($catname)){
			$error['catname']="Bạn không được để trống";
		}
		if($row>0){
			$error['catname']="Tên danh mục đã tồn tại";
		}
		if(empty($sort_order)){
			$error['sort_order']="Bạn không được để trống";
		}
		if($row2>0){
			$error['sort_order']='Vị trí này đã được sử dụng';
		}
		if(!$error){
			$objcate->addCategory($catname,$parent_id,$sort_order,$status);
		}
	}
}
?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục
					<small><?=isset($_GET['catid'])?"Sửa":"Thêm" ?> </small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-7" style="padding-bottom:120px">
				<form action="" method="POST">
					<div class="form-group">
						<label>Danh mục cha</label>
						<select class="form-control" name="parent_id">
							<option value="0">Hãy chọn danh mục</option>
							<?php
							if(isset($_GET['catid'])){
								cateParent($listCate,0,"--",$listcateId[2]);
							}else{
								cateParent($listCate,0,"--",0);
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Tên danh mục</label>
						<input class="form-control" name="catname" value="<?=isset($_GET['catid']) ? $listcateId[1] : '' ?>" placeholder="Please Enter Category Name" />
						<?=isset($error['catname']) ? $error['catname'] : "" ?>
					</div>
					<div class="form-group">
						<label>Vi trí hiển thị</label>
						<input class="form-control" name="sort_order" onkeypress="return numberOnly(this, event);" value="<?=isset($_GET['catid']) ? $listcateId[3] : '' ?>" placeholder="Please Enter Category Order" />
						<?=isset($error['sort_order']) ? $error['sort_order'] : "" ?>
					</div>
					<div class="form-group">
						<label>Trạng thái  </label>
						<?php
						if(isset($listcateId[4])){
							if($listcateId[4]==1){
								?>
								<label class="radio-inline">
									<input name="status" value="1" checked="" type="radio">Hiện
								</label>
								<label class="radio-inline">
									<input name="status" value="2" type="radio">Ẩn
								</label>
								<?php
							}elseif($listcateId[4]==2){
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
						<?=isset($error['status']) ? $error['status'] : "" ?>
					</div>
					<button type="submit" name="save" class="btn btn-default">Lưu</button>
					<button type="reset" class="btn btn-default">Làm lại</button>
				</form>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<script type="text/javascript">
	function numberOnly(myfield, e){
		var key,keychar;
		if (window.event){
			key = window.event.keyCode
		}else if (e){
			key = e.which
		}else{
			return true
		}
		keychar = String.fromCharCode(key);
		if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27)){
			return true
		}else if (("0123456789").indexOf(keychar) > -1){
			return true
		}
		return false;
	}
</script>
<?php

include_once 'admin_footer.php';

?>