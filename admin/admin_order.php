<?php

include_once 'admin_header.php';

$objord=new Orders();

$data=array();
$error=array();

$listord=$objord->listOrder(null,' order by ord_id desc');

if (isset($_GET['ordid'])) {
	$ordid=$_GET['ordid'];
	
		$objord->destroyOrder($ordid);
		$result=$objord->deleteOrder($ordid);
	
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
				<h1 class="page-header">Hóa đơn
					<small>Danh sách</small>
				</h1>
			</div>
			<h4 style="text-align:center"><strong><?php echo isset($error['error']) ? $error['error'] : "" ?></strong></h4>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Tên khách hàng</th>
						<th>Điện thoại</th>
						<th>Địa chỉ</th>
						<th>Ngày mua</th>
						<th>Thanh toán</th>
						<th>Trạng thái</th>
						<th>Chi tiết</th>
						<th>Sửa</th>
						<?php
						if($_SESSION['level']==1){
							?>
							<th>Hủy</th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($listord as $key => $value) {

							?>
							<tr class="odd gradeX" align="center">
								<td><?php echo $value['ord_id'] ?></td>
								<td><?php echo $value['name'] ?></td>
								<td><?php echo $value['mobile'] ?></td>
								<td><?php echo $value['address'] ?></td>
								<td><?php echo $value['ord_date'] ?></td>
								<td><?php echo $value['ord_payment'] ?></td>
								<td><?php 
									if($value['ord_status']==0){
										echo 'Chưa xử lí';
									}elseif ($value['ord_status']==1) {
										echo "Đang xử lí";
									}else{
										echo 'Đã xử lí';
									}
									?>
								</td>
								<td class="center"><i class="fa fa-info fa-fw"></i><a href="admin_order_detail.php?ordid=<?php echo $value['ord_id'] ?>"> Chi tiết</a></td>
								<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin_edit_order.php?ordid=<?php echo $value['ord_id'] ?>">Sửa</a></td>
								<?php
								if($_SESSION['level']==1){
									?>
									<td class="center"><i class="fa fa-trash fa-fw"></i><a href="admin_order.php?ordid=<?php echo $value['ord_id'] ?>" onclick="return xacnhanxoa();">Hủy</a></td>
									<?php }?>
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

		include_once 'admin_footer.php';

		?>