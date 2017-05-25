<?php

include("admin_header.php");

$objcate=new Category();

$listCate=$objcate->showListCate();
// echo "<pre>";/

$data=array();
$error=array();

if(isset($_GET['catid'])){
	$catid=$_GET['catid'];
	$que=mysql_query("select * from danhmuc where parent_id=$catid");
	$query=mysql_query("select * from sanpham where cat_id=$catid");
	if($num_rows=mysql_num_rows($query)>0){
		$error['xoa']="Bạn không thể xóa danh mục này vì vẫn có sản phẩm thuộc danh mục này";
		echo "<meta http-equiv=\"refresh\" content=\"2,url=../admin/admin_category.php\">";
	}elseif($num_row=mysql_num_rows($que)==0){
		$result=$objcate->deleteCategory($catid);
	}else{
		$error['xoa']="Bạn không thể xóa danh mục này vì vẫn có danh mục con thuộc danh mục này";
		echo "<meta http-equiv=\"refresh\" content=\"2,url=../admin/admin_category.php\">";
	}
	// echo $result;
}
?>
<script type="text/javascript">
	function xacnhanxoa() {
		if(window.confirm("Bạn có chắc muốn xóa k?")){
			return true;
		}
		return false;
	}
</script>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục
					<small>Danh sách</small>
				</h1>
			</div>
			<div class="alert alert-block alert-error fade in" style="display:<?=isset($error['xoa']) ? "block" : "none" ?>;">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<?=isset($error['xoa']) ? $error['xoa'] : "" ?>
			</div> 
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Tên danh mục</th>
						<th>Vị trí hiển thị</th>
						<th>Danh mục cha</th>
						<th>Trạng thái</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($listCate as $key => $value) {

						?>
						<tr class="odd gradeX" align="center">
							<td><?=$value['cat_id'] ?></td>
							<td><?=$value['cat_name'] ?></td>
							<td><?=$value['sort_order'] ?></td>
							<td><?php
								if($value[2]==0){
									echo "None";
								}else{
									$tv=mysql_query("select * from danhmuc where cat_id=".$value[2]."");
									$fe=mysql_fetch_array($tv);
									echo $fe['cat_name'];
								}
								?>
							</td>
							<td><?=($value['cat_status']==1) ? "Hiện" : "Ẩn" ?></td>
							<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin_category.php?catid=<?=$value['cat_id'] ?>" onclick="return xacnhanxoa();"> Delete</a></td>
							<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin_add_category.php?catid=<?=$value['cat_id'] ?>">Edit</a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<?php

include("admin_footer.php");

?>