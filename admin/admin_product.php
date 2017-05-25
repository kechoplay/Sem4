<?php

include("admin_header.php");

$objpro=new Product();

$listPro=$objpro->listProduct();

// echo "<pre>";
// print_r($listPro);
$data=array();
$error=array();
if (isset($_GET['proid'])) {
	$proid=$_GET['proid'];
	$query=mysql_query("select * from sanpham a join hoadonchitiet b on a.pro_id=b.pro_id where a.pro_id=$proid");
	if($num_row=mysql_num_rows($query)>0){
		$error['error']="Bạn không thể xóa sản phẩm này";
		echo "<meta http-equiv=\"refresh\" content=\"5,url=admin_product.php\">";
	}else{
		$result=$objpro->deleteProduct($proid);
	}
}
?>
<script type="text/javascript">
	function xacnhanxoa() {
		if(window.confirm('Bạn có đồng ý xóa không')){
			return true;
		}
		return false;
	}
</script>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm
					<small>Danh sách</small>
				</h1>
			</div>
			<h4 style="text-align:center"><strong><?php echo isset($error['error']) ? $error['error'] : "" ?></strong></h4>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Danh mục</th>
						<th>Tên</th>
						<th>Giá</th>
						<th>Giảm giá</th>
						<th>Ảnh</th>
						<th>Miêu tả</th>
						<th>Số lượng</th>
						<th>Status</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($listPro as $key => $value) {

						?>
						<tr class="odd gradeX" align="center">
							<td><?php echo $value['pro_id'] ?></td>
							<td><?php echo $value['cat_name'] ?></td>
							<td><?php echo $value['pro_name'] ?></td>
							<td><?php echo number_format($value['pro_price'],0,'',',') ?></td>
							<td><?php echo number_format($value['pro_discount']) ?></td>
							<td><img src="../hinhanh/<?php echo $value['pro_image'] ?>" style="width:50px;"/></td>
							<td><?php echo $value['pro_description'] ?></td>
							<td><?php echo $value['pro_quantity'] ?></td>
							<td><?php echo ($value['pro_status']==1) ? "Hiện" : "Ẩn" ?></td>
							<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin_product.php?proid=<?php echo $value['pro_id'] ?>" onclick="return xacnhanxoa();"> Delete</a></td>
							<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin_add_product.php?proid=<?php echo $value['pro_id'] ?>">Edit</a></td>
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