<?php
include_once 'admin_header.php';

$objuser=new User();

$userid=null;
$em=null;
if(isset($_GET['userid'])){
	$userid=$_GET['userid'];
	$where=" where id=".$userid;
	$us=$objuser->getProfile($where);
	$em=$us[4];
}

$error=array();
if (isset($_POST['save'])) {
	$admin_name=$_POST['admin_name'];
	$admin_email=$_POST['admin_email'];
	$admin_username=$_POST['admin_username'];
	$admin_password=md5($_POST['admin_password']);
	$level=$_POST['level'];
	$status=$_POST['status'];

	if ($admin_name=='') {
		$error['admin_name']="Điền đầy đủ thông tin";
	}
	if ($admin_email=='') {
		$error['admin_email']="Điền đầy đủ thông tin";
	}
	if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $admin_email)) 
	{
		$error['admin_email']="Email này không hợp lệ. Vui long nhập email khác.";
	}

	if (mysql_num_rows(mysql_query("select * from khachhang where email like '$admin_email'"))>0) 
	{
		$error['admin_email']="Email này đã có người dùng. Vui lòng chọn Email khác.";
	}

	if (isset($_GET['userid'])) {
		if (mysql_num_rows(mysql_query("select * from admin where email like '$admin_email' and email !='$em'"))>0) 
		{
			$error['admin_email']="Email này đã có người dùng. Vui lòng chọn Email khác.";;
		}
	}else{
		if (mysql_num_rows(mysql_query("select * from admin where email like '$admin_email'"))>0) 
		{
			$error['admin_email']="Email này đã có người dùng. Vui lòng chọn Email khác.";
		}
	}
	
	if ($admin_username=='') {
		$error['admin_username']="Điền đầy đủ thông tin";
	}
	if ($admin_password=='') {
		$error['admin_password']="Điền đầy đủ thông tin";
	}
	if ($level==0) {
		$error['level']="Hãy chọn quyền truy cập";
	}
	if ($status==0) {
		$error['status']="Hãy chọn trạng thái";
	}
	if (!$error) {
		if(!isset($_GET['userid'])){
			
			$objuser->addUser($admin_username,$admin_password,$admin_name,$admin_email,$level,$status);
		}else{
			
			$objuser->updateUser($admin_name,$admin_email,$level,$status,$userid);
		}
	}
}
if (isset($_SESSION['id']) && $_SESSION['id']==1) {

?>


<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên
					<small><?=isset($_GET['userid']) ? 'Sửa' : 'Thêm' ?></small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-xs-12">
				<form class="form-horizontal" role="form" action="" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
					<div class="row">
						<div class="tabbable">
							<div class="row">
								<div class="col-xs-5">
									<div class="widget-box">
										<div class="widget-header">
											<h4>Nhập đầy đủ các thông tin</h4>
										</div>
										<div class="widget-body">
											<div class="widget-body-inner">
												<div class="widget-main">
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right"> Họ và tên </label>
														<div class="col-sm-9">
															<input type="text" name="admin_name" value="<?=isset($userid) ? $us[3] : '' ?>" class="form-control" maxlength="150" placeholder="Họ và tên" />
															<?=isset($error['admin_name']) ? $error['admin_name'] : '' ?>
														</div>
													</div>
													<div class="space-4"></div>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right"> Địa chỉ Email</label>
														<div class="col-sm-9">
															<input type="text" name="admin_email" value="<?=isset($userid) ? $us[4] : '' ?>" class="form-control" maxlength="100" placeholder="Địa chỉ email">
															<?=isset($error['admin_email']) ? $error['admin_email'] : '' ?>
														</div>
													</div>
													<div class="space-4"></div>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right"> Tên đăng nhập</label>
														<div class="col-sm-9">
															<input type="text" name="admin_username" <?=isset($userid) ? 'readonly' : '' ?> value="<?=isset($userid) ? $us[1] : '' ?>" class="form-control" maxlength="100" placeholder="Tên đăng nhập">
															<?=isset($error['admin_username']) ? $error['admin_username'] : '' ?>
														</div>
													</div>
													<div class="space-4"></div>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right"> Mật khẩu</label>
														<div class="col-sm-9">
															<input type="password" name="admin_password" <?=isset($userid) ? 'readonly' : '' ?> value="" class="form-control" maxlength="100" placeholder="Mật khẩu">
															<?=isset($error['admin_password']) ? $error['admin_password'] : '' ?>
														</div>
													</div>
													<div class="space-4"></div>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right"> Quyền truy cập</label>
														<div class="col-sm-9">
															<select name="level" class="form-control">
																<option value="0">--Chọn quyền truy cập</option>
																<?php
																if(isset($userid)){
																	if ($us['level']==1) {
																		?>
																		<option value="1" selected>Administrator</option>
																		<option value="2">Manager</option>
																		<?php
																	}else{
																		?>
																		<option value="1">Administrator</option>
																		<option value="2" selected>Manager</option>
																		<?php
																	}
																}else{
																	?>
																	<option value="1">Administrator</option>
																	<option value="2">Manager</option>
																	<?php 
																}
																?>
															</select>
															<?=isset($error['level']) ? $error['level'] : '' ?>
														</div>
														
													</div>
													<div class="space-4"></div>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right"> Trạng thái</label>
														<div class="col-sm-9">
															<select name="status" class="form-control">
																<option value="0">--Chọn trạng thái</option>
																<?php
																if(isset($userid)){
																	if ($us['status']==1) {
																		?>
																		<option value="1" selected>Hiện</option>
																		<option value="2">Ẩn</option>
																		<?php
																	}else{
																		?>
																		<option value="1" >Hiện</option>
																		<option value="2" selected>Ẩn</option>
																		<?php
																	}
																}else{
																	?>
																	<option value="1" >Hiện</option>
																	<option value="2">Ẩn</option>
																	<?php 
																}
																?>
															</select>
															<?=isset($error['status']) ? $error['status'] : '' ?>
														</div>
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>								
							</div>
						</div>
						<br>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<input type="submit" value="Lưu" name="save">
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<?php
}else{
	header('location:../error.php');
}

include_once 'admin_footer.php';

?>