<?php

include("admin_header.php");

$objuser=new User();

$where=array();
$where[]="user='".$_SESSION['Name']."'";
$where[]="pass='".$_SESSION['Pass']."'";
$profile=$objuser->getProfile($where);

$em=$profile[4];
$id=$profile[0];

if(isset($_POST['save'])){
	$error=array();
	$name=$_POST['admin_name'];
	$email=$_POST['admin_email'];
	if(!empty($_POST['admin_password_old']) && !empty($_POST['admin_password_new']) && !empty($_POST['admin_password_conf'])){
		$old_pass=md5(addslashes($_POST['admin_password_old']));
		$new_pass=addslashes($_POST['admin_password_new']);
		$conf_pass=addslashes($_POST['admin_password_conf']);
		$np=md5($new_pass);

		if($old_pass!=$_SESSION['Pass']){
			$error['oldpass']='Mật khẩu cũ không trùng khớp';
		}
		
		if (!preg_match("/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/", $new_pass)){
			$error['newpass']='Mật khẩu bắt đầu bằng chữ in hoa và có từ 6 đến 32 kí tự';
		}

		if($new_pass!=$conf_pass){
			$error['re-newpass']='Mật khẩu mới không trùng nhau';
		}

		if (empty($name)) {
			$error['name']='Hãy điền đầy đủ thông tin';
		}

		if (empty($email)) {
			$error['email']='Hãy điền đầy đủ thông tin';
		}

		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) 
		{
			$error['email']="Email này không hợp lệ. Vui long nhập email khác.";
		}

		if (mysql_num_rows(mysql_query("select * from khachhang where email like '$email'"))>0) 
		{
			if (mysql_num_rows(mysql_query("select * from admin where email like '$email' and email != '$em'"))>0) 
			{
				$error['email']="Email này đã có người dùng. Vui lòng chọn Email khác.";
			}
		}

		if(!$error){
			$objuser->updateAccount($name,$email,$np,$id);
			$_SESSION['Pass']=$np;
		}
	}else{
		if (empty($name)) {
			$error['name']='Hãy điền đầy đủ thông tin';
		}

		if (empty($email)) {
			$error['email']='Hãy điền đầy đủ thông tin';
		}

		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) 
		{
			$error['email']="Email này không hợp lệ. Vui long nhập email khác.";
		}

		if (mysql_num_rows(mysql_query("select * from khachhang where email like '$email' "))>0) 
		{
			$error['email']="Email này đã có người dùng. Vui lòng chọn Email khác.";
		}
		if (mysql_num_rows(mysql_query("select * from admin where email like '$email' and email != '$em'"))>0) 
		{
			$error['email']="Email này đã có người dùng. Vui lòng chọn Email khác.";
		}

		if(!$error){
			$objuser->updateAccount($name,$email,null,$id);
		}
	}
}
?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thông tin cá nhân
				</h1>
			</div>
			<div class="col-xs-12">
				<form class="form-horizontal" role="form" method="post" name="adminForm" id="adminForm">
					<div class="row">
						<div class="tabbable">
							<div class="col-xs-6">
								<div class="widget-box">
									<div class="widget-header">
										<h4>Sửa thông tin cá nhân</h4>
									</div>
									<div class="widget-body">
										<div class="widget-body-inner">
											<div class="widget-main">
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-fullname"> Họ và tên </label>
													<div class="col-sm-9">
														<input type="text" name="admin_name" id="admin_name" value="<?=$profile[3] ?>" placeholder="Họ và tên" class="form-control">
													</div>
													<?=isset($error['name']) ? $error['name'] : '' ?>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-email"> Địa chỉ Email</label>
													<div class="col-sm-9">
														<input type="text" name="admin_email" id="admin_email" value="<?=$profile[4] ?>" class="form-control" placeholder="Địa chỉ email">
													</div>
													<?=isset($error['email']) ? $error['email'] : '' ?>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-username"> Tên đăng nhập</label>
													<div class="col-sm-9">
														<?=$profile[1] ?>
													</div>
												</div>

												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-username"> Quyền hạn</label>
													<div class="col-sm-9">
														<?=($profile[5]==1) ? "Administrator" : "Manager" ?>
													</div>
												</div>

												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-username"> Ngày đăng ký</label>
													<div class="col-sm-9">
														<?=$profile[7] ?>
													</div>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-username"> Lần truy cập cuối</label>
													<div class="col-sm-9">
														<?=$profile[8] ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="widget-box">
									<div class="widget-header">
										<h4>Thay đổi mật khẩu</h4>
									</div>
									<div class="widget-body">
										<div class="widget-body-inner" style="display: block;">
											<div class="widget-main">
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-password"> Nhập mật khẩu cũ</label>
													<div class="col-sm-9">
														<input type="password" name="admin_password_old" id="admin_password_old" value="" class="form-control">
													</div>
													<?=isset($error['oldpass']) ? $error['oldpass'] : '' ?>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-password"> Nhập mật khẩu mới</label>
													<div class="col-sm-9">
														<input type="password" name="admin_password_new" id="admin_password_new" value="" class="form-control">
													</div>
													<?=isset($error['newpass']) ? $error['newpass'] : '' ?>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-password"> Nhập lại mật khẩu mới</label>
													<div class="col-sm-9">
														<input type="password" name="admin_password_conf" id="admin_password_conf" value="" class="form-control">
													</div>
													<?=isset($error['re-newpass']) ? $error['re-newpass'] : '' ?>
												</div>
												<div class="space-4"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<input type="submit" value="Cập nhật" name="save">
					</div>
				</div>
			</form>
		</div>

		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>

<?php

include("admin_footer.php");

?>