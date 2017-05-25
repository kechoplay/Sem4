<?php

include_once 'admin_header.php';

$objord=new Orders();

$data=array();
$error=array();

$ord=$_GET['ordid'];
$where=' a.ord_id='.$ord;
$orddetail=$objord->listOrderDetail($where);
$total=0;
?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Chi tiết hóa đơn
					<small>Danh sách</small>
				</h1>
			</div>
			<div class="alert alert-block alert-error fade in" style="display:<?php echo isset($error['xoa']) ? "block" : "none" ?>;">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<?php echo isset($error['xoa']) ? $error['xoa'] : "" ?>
			</div> 
			<!-- /.col-lg-12 -->
			<p><h2 style="text-align:center;">Chi tiết hóa đơn</h2></p>
			Tên khách hàng : <span><strong><?php echo $orddetail[0]['name']; ?></strong></span><br>
			Địa chỉ : <span><strong><?php echo $orddetail[0]['address']; ?></strong></span><br>
			Điện thoại : <span><strong><?php echo $orddetail[0]['mobile']; ?></strong></span><br>
			<style type="text/css">
				th,td{
					border: 1px thin black;
					padding: 5px;
				}
			</style>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Tên mặt hàng</th>
						<th>Số lượng</th>
						<th>Đơn giá</th>
						<th>Giảm giá</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach ($orddetail as $key => $value) {

				?>
					<tr>
						<td><?php echo $value['pro_name']; ?></td>
						<td><?php echo $value['number']; ?></td>
						<td><?php echo number_format($value['price']); ?></td>
						<td><?php echo number_format($value['pro_discount']); ?></td>
						<td><?php echo number_format($value['number']*$value['price']); ?></td>

					</tr>
					<?php
					$total+=$value['number']*$value['price'];
					?>
					<?php
				}
				?>
					<tr>
						<td colspan="4">Tổng tiền</td>
						<td><?php echo number_format($value['total']); ?></td>
					</tr>
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