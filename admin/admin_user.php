<?php

include("admin_header.php");

$objuser=new User();

$where=" where id!=1";
$listuser=$objuser->listUser($where);

// echo "<pre>";
// print_r($listPro);
$data=array();
$error=array();
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Nhân viên
					<small>Danh sách</small>
				</h1>
				<?php if($_SESSION['level']==1){ ?><p><a href="admin_add_user.php">Thêm tài khoản</a></p><?php } ?>
			</div>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Tên đăng nhập</th>
						<th>Tên đầy đủ</th>
						<th>Email</th>
						<th>Quyền</th>
						<th>Trạng thái</th>
						<th>Ngày tạo</th>
						<th>Truy cập cuối</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($listuser as $key => $value) {
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$create=date_create($value['created_at']);
						$access=date_create($value['last_access']);
						?>
						<tr class="odd gradeX" align="center">
							<td><?=$value['id'] ?></td>
							<td>
								<?php 
								if($_SESSION['level']==1){ 
									?>
									<a href="admin_add_user.php?userid=<?=$value[0] ?>"><?=$value['user'] ?></a>
									<?php 
								}else{
									echo $value['user'];
								} 
								?>
							</td>
							<td><?=$value['fullname'] ?></td>
							<td><?=$value['email'] ?></td>
							<td><?=($value['level']==1) ? "Administrator" : "Manager" ?></td>
							<td><?=($value['status']==1) ? "Hiện" : "Ẩn" ?></td>
							<td><?=date_format($create,'d-m-Y H:i:s') ?></td>
							<td><?=$value['last_access'] ?></td>
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