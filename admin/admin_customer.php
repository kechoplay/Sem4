<?php

include("admin_header.php");

$objcus=new Customer();

$listCus=$objcus->getListCustomer();

// echo "<pre>";
// print_r($listPro);
$data=array();
$error=array();
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Khách hàng
					<small>Danh sách</small>
				</h1>
				<p><a href="admin_add_customer.php">Thêm tài khoản</a></p>
			</div>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Tên đăng nhập</th>
						<th>Tên đầy đủ</th>
						<th>Email</th>
						<th>Điện thoại</th>
						<th>Địa chỉ</th>
						<th>Trạng thái</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($listCus as $key => $value) {

						?>
						<tr class="odd gradeX" align="center">
							<td><?php echo $value['cus_id'] ?></td>
							<td><?php echo $value['username'] ?></td>
							<td><?php echo $value['fullname'] ?></td>
							<td><?php echo $value['email'] ?></td>
							<td><?php echo $value['mobile'] ?></td>
							<td><?php echo $value['address'] ?></td>
							<td><?php echo ($value['status']==1) ? "Hiện" : "Ẩn" ?></td>
							<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin_add_customer.php?cusid=<?php echo $value['cus_id'] ?>">Edit</a></td>
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