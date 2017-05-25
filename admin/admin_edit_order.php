<?php

include_once 'admin_header.php';

$objord=new Orders();

$data=array();
$error=array();

$ordid=$_GET['ordid'];
$where =' where ord_id='.$ordid;
$listord=$objord->listOrder($where);
if (isset($_POST['save'])) {
	$status=$_POST['status'];
	$listord=$objord->updateOrder($status,$ordid);
}
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Hóa đơn
					<small>Sửa </small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-7" style="padding-bottom:120px">
				<form action="" method="POST">
					<div class="form-group">
						<label>Tên khách hàng</label>
						<input class="form-control" readonly="" value="<?php echo $listord[0][2] ?>" />
					</div>
					<div class="form-group">
						<label>Điện thoại</label>
						<input class="form-control" readonly="" value="<?php echo $listord[0][3] ?>" />
					</div>
					<div class="form-group">
						<label>Địa chỉ</label>
						<input class="form-control" readonly="" value="<?php echo $listord[0][4] ?>" />
					</div>
					<div class="form-group">
						<label>Ngày mua</label>
						<input class="form-control" readonly="" value="<?php echo date_format(new DateTime($listord[0][6]),'d-m-Y H:m:s') ?>" />
					</div>
					<div class="form-group">
						<label>Phương thức thanh toán</label>
						<input class="form-control" readonly="" value="<?php echo $listord[0][7] ?>" />
					</div>
					<div class="form-group">
						<label>Trạng thái  </label>
						<?php

						if($listord[0][8]==0){
							?>
							<label class="radio-inline">
								<input name="status" value="0" id="st0" checked="" type="radio">Chưa xử lí
							</label>
							<label class="radio-inline">
								<input name="status" value="1" id="st1" type="radio">Đang xử lí
							</label>
							<label class="radio-inline">
								<input name="status" value="2" id="st2" type="radio">Đã xử lí
							</label>
							<?php
						}elseif($listord[0][8]==1){
							?>
							<label class="radio-inline">
								<input name="status" value="0" id="st0" type="radio">Chưa xử lí
							</label>
							<label class="radio-inline">
								<input name="status" value="1" id="st1" checked="" type="radio">Đang xử lí
							</label>
							<label class="radio-inline">
								<input name="status" value="2" id="st2" type="radio">Đã xử lí
							</label>
							<?php
						}else{
							?>
							<label class="radio-inline">
								<input name="status" value="0" id="st0" type="radio">Chưa xử lí
							</label>
							<label class="radio-inline">
								<input name="status" value="1" id="st1" type="radio">Đang xử lí
							</label>
							<label class="radio-inline">
								<input name="status" value="2" id="st2" checked="" type="radio">Đã xử lí
							</label>
							<?php
						}
						?>
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
	$(document).ready(function(){
		if ($("#st2").is(":checked")){
			$("#st1").click(function(){
				alert('Bạn không thể thay đổi');
				return false;
			});
			$("#st0").click(function(){
				alert('Bạn không thể thay đổi');
				return false;
			});
		}
	});
</script>

<?php

include_once 'admin_footer.php';

?>