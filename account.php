<?php

include_once 'header.php';

$objorder=new Orders();

$error=array();
if (isset($_SESSION['customer'])) {

	$where=" where cus_id=".$_SESSION['customer']['id'];
	$or=$objorder->listOrder($where);

	$user=$_SESSION['customer']['user'];
	$pw=$_SESSION['customer']['pass'];

	$id=$_SESSION['customer']['id'];
	$em=$_SESSION['customer']['email'];
	if(isset($_POST['account'])){
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$address=$_POST['address'];
		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) 
		{
			$error['email']="Email này không hợp lệ. Vui long nhập email khác.";
		}
		if($email==''){
			$error['email']="Không được để trống";
		}
		if (mysql_num_rows(mysql_query("select * from khachhang where email like '$email' and email != '$em'"))>0) 
		{
			$error['email']="Email này đã có người dùng. Vui lòng chọn Email khác.";
		}
		if($fullname==''){
			$error['fullname']="Không được để trống";
		}
		if($mobile==''){
			$error['mobile']="Không được để trống";
		}
		if($address==''){
			$error['address']="Không được để trống";
		}
		if (!preg_match("/^[0-9]/", $mobile))
		{
			$error['mobile']= "Số điện thoại không hợp lệ. Vui lòng nhập lại.";
		}
		if(!$error){
			$objcustomer->updateKh($fullname,$email,$mobile,$address,$id);
			$_SESSION['customer']=array(
				'user'=>$user,
				'pass'=>$pw,
				'id'=>$id,
				'email'=>$email,
				'address'=>$address,
				'mobile'=>$mobile,
				'fullname'=>$fullname,
				);
		}
	}
	if(isset($_POST['changepass'])){
		$opw=md5(addslashes($_POST['oldpass']));
		$npw=md5(addslashes($_POST['newpass']));
		$rpw=md5(addslashes($_POST['re-newpass']));

		$data['oldpass']=isset($_POST['oldpass']) ? $_POST['oldpass'] : '';
		$data['newpass']=isset($_POST['newpass']) ? $_POST['newpass'] : '';
		$data['re-newpass']=isset($_POST['re-newpass']) ? $_POST['re-newpass'] : '';

		if(empty($data['oldpass'])){
			$error['oldpass']='Bạn chưa nhập mật khẩu cũ';
		}elseif($opw!=$pw){
			$error['oldpass']='Mật khẩu cũ không trùng khớp';
		}
		if(empty($data['newpass'])){
			$error['newpass']='Bạn chưa nhập mật khẩu mới';
		}elseif (!preg_match("/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/", $_POST['newpass'])){
			$error['newpass']='Mật khẩu bắt đầu bằng chữ in hoa và có từ 6 đến 32 kí tự';
		}
		if(empty($data['re-newpass'])){
			$error['re-newpass']='Bạn chưa nhập lại mật khẩu mới';
		}
		if($npw!=$rpw){
			$error['re-newpass']='Mật khẩu mới không trùng nhau';
		}
		if(!$error){
			$sql="update customer set password='$npw' where cus_id='$id' ";
			$query=mysql_query($sql);
			session_unset($_SESSION['customer']);
			echo "<meta http-equiv=\"refresh\" content=\"0,url=login.php\">";
			echo '<script>alert("Thành công")</script>';

		}else{
			
		}
	}
	?>

	<div id="mainBody">
		<div class="container">
			<h3>Thông tin tài khoản</h3>
			<hr class="soften"/>	
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
						<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							Thông tin cá nhân
						</a></h4>
					</div>
					<div id="collapseOne" class="accordion-body collapse"  >
						<div class="accordion-inner">
							<form action="" method="POST">
								<div class="form-group">
									<label for="">Tên đầy đủ</label>
									<input type="text" class="form-control" id="fullname" style="width:50%" name="fullname" value="<?php echo $_SESSION['customer']['fullname']; ?>" placeholder="Input field" required="">
									<?php echo isset($error['fullname']) ? $error['fullname'] : ''; ?>
								</div>
								<div class="form-group">
									<label for="">Email</label>
									<input type="email" class="form-control" id="email" style="width:50%" name="email" value="<?php echo $_SESSION['customer']['email']; ?>" placeholder="Input field" required="">
									<?php echo isset($error['email']) ? $error['email'] : ''; ?>
								</div>
								<div class="form-group">
									<label for="">Địa chỉ</label>
									<textarea class="form-control" id="address" name="address" style="width:50%" placeholder="Input field"><?php echo $_SESSION['customer']['address']; ?></textarea>
									<?php echo isset($error['address']) ? $error['address'] : ''; ?>
								</div>
								<div class="form-group">
									<label for="">Số điện thoại</label>
									<input type="text" class="form-control" id="mobile" style="width:50%" name="mobile" value="<?php echo $_SESSION['customer']['mobile']; ?>" placeholder="Input field" required="">
									<?php echo isset($error['mobile']) ? $error['mobile'] : ''; ?>
								</div>
								<button type="submit" class="btn btn-primary" name="account">Cập nhật</button>
							</form>

						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<h4><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
							Đổi mật khẩu
						</a></h4>
					</div>
					<div id="collapseTwo" class="accordion-body collapse"  >
						<div class="accordion-inner">
							<form action="" id="formResetPass" method="POST" name="form" onsubmit="return validateForm()">

								<div class="form-group">
									<label for="">Mật khẩu cũ</label>
									<input type="password" class="form-control" id="oldpass" style="width:50%" name="oldpass" placeholder="Input field">
									<?php echo isset($error['oldpass']) ? $error['oldpass'] : ''; ?>
								</div>
								<div class="form-group">
									<label for="">Mật khẩu mới</label>
									<input type="password" class="form-control" id="newpass" style="width:50%" name="newpass" placeholder="Input field">
									<?php echo isset($error['newpass']) ? $error['newpass'] : ''; ?>
								</div>
								<div class="form-group">
									<label for="">Nhập lại mật khẩu mới</label>
									<input type="password" class="form-control" id="re-newpass" style="width:50%" name="re-newpass" placeholder="Input field">
									<?php echo isset($error['re-newpass']) ? $error['re-newpass'] : ''; ?>
								</div>
								<button type="submit" class="btn btn-primary" name="changepass">Thay đổi</button>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>


		<?php
	}else{
		header('location:login.php');
	}

	include_once 'footer.php';

	?>