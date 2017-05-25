<?php

include('header.php');

include('slidebar.php');
$error=null;
if (isset($_POST['guiemail'])) {
	$email=$_POST['email'];
	$user=$_POST['user'];
	$pass="0123456789";
	$pmd5=md5($pass);
	if (mysql_num_rows(mysql_query("select * from khachhang where username like '$user' and email like '$email'"))==0) 
	{
		$error="Hãy kiểm tra lại tên đăng nhập hoặc email. Email phải trùng với email khi bạn đăng ký tài khoản";	
	}
	if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) 
	{
		$error="Email này không đúng định dạng. Vui long nhập email khác.";
	}
	if(!$error){
		$objcustomer->updatePass($pmd5,$user);
		sendMailPass($email,$pass,$user);
	}
}

?>
<!-- Sidebar end=============================================== -->
<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Quên mật khẩu</li>
	</ul>
	<h3> BẠN QUÊN MẬT KHẨU?</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span9" style="min-height:900px">
			<div class="well">
				<h5>Reset mật khẩu</h5><br/>
				<div class="alert alert-block alert-error fade in" style="display:<?php echo isset($error) ? 'block' : 'none' ?>;">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<?php echo isset($error) ? $error : '' ?>
				</div> 
				Hãy nhập email tài khoản của bạn. Chúng tôi sẽ gửi mật khẩu mới đến cho bạn. Xin cảm ơn<br/><br/>
				<form method="POST">
					<div class="control-group">
						<label class="control-label" for="inputEmail1">Tên đăng nhập</label>
						<div class="controls">
							<input class="span3" type="text" id="inputUsername" placeholder="Username" name="user">
						</div>
						<label class="control-label" for="inputEmail1">Địa chỉ email</label>
						<div class="controls">
							<input class="span3"  type="email" id="inputEmail1" placeholder="Email" name="email">
						</div>
						
					</div>
					<div class="controls">
						<button type="submit" name="guiemail" class="btn block">Gửi</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
	
</div>
<?php

include('footer.php');

include('themes_section.php');

?>