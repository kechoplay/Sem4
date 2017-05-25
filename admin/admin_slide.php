<?php

include("admin_header.php");

$objsli=new Slide();

$listsli=$objsli->showSlide();

// echo "<pre>";
// print_r($listPro);
$data=array();
$error=array();
if(isset($_GET['sliid'])){
	$sliid=$_GET['sliid'];
	$objsli->deleteSlide($sliid);
}
?>
<script type="text/javascript">
	function xacnhanxoa() {
		if(window.confirm("Bạn có muôn xóa không")){
			return true;
		}
		return false;
	}
</script>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Slide
					<small>Danh sách</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Tên slide</th>
						<th>Ảnh</th>
						<th>Link</th>
						<th>Trạng thái</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($listsli as $key => $value) {

						?>
						<tr class="odd gradeX" align="center">
							<td><?php echo $value['sli_id'] ?></td>
							<td><?php echo $value['sli_name'] ?></td>
							<td><img src="../hinhanh/slide/<?php echo $value['sli_image'] ?>"  style="width:100px;"></td>
							<td><?php echo $value['sli_link'] ?></td>
							<td><?php echo ($value['sli_status']==1) ? "Hiện" : "Ẩn" ?></td>
							<td class="center"><i class="fa fa-pencil fa-trash"></i> <a href="admin_slide.php?sliid=<?php echo $value['sli_id'] ?>" onclick="return xacnhanxoa();">Delete</a></td>
							<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin_add_slide.php?sliid=<?php echo $value['sli_id'] ?>">Edit</a></td>
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