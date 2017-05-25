<?php

include('header.php');

include('slidebar.php');

$objcustomer=new Customer();
// if(isset($_POST['login'])){

// 	$us=$_POST['inputUsername'];
// 	$pw=$_POST['inputPassword'];

// 	$xh=$objcustomer->login($us,$pw);
// 	// $delay=0;
// 	// header("location:index.php"); 
// }
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Đăng nhập</li>
	</ul>
	<h3> Login</h3>	
	<hr class="soft"/>
	<?php
	if(!(isset($_SESSION['customer']) )){
		?>
		<div class="row">
			<div class="span4">
				<div class="well">
					<h5>TẠO TÀI KHOẢN</h5><br/>
					
					<form action="register.php">

						<div class="controls">
							<button type="submit" class="btn block">Tạo tài khoản</button>
						</div>
					</form>
				</div>
			</div>
			<div class="span1"> &nbsp;</div>
			<div class="span4">
				<div class="well">
					<h5>Sẵn sàng đăng nhập</h5>
					<form method="POST">
						<div class="control-group">
							<label class="control-label" for="inputUsername">Tên đăng nhập</label>
							<div class="controls">
								<input class="span3" name="inputUsername" type="text" id="inputUsername" placeholder="Email">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Mật khẩu</label>
							<div class="controls">
								<input type="password" class="span3" name="inputPassword" id="inputPassword" placeholder="Password">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" name="login" class="btn">Đăng nhập</button> <a href="forgetpass.php">Quên mật khẩu?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>	
		<?php
	}else{
		echo "Bạn đã đăng nhập. Hãy quay <a href='index.php'>trở lại</a> trang chủ để mua hàng";
	}
	?>
	
</div>

<?php

include('footer.php');

include('themes_section.php');

?>
