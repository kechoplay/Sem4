<?php
session_start();
ob_start();
include('ketnoi.php');

include_once 'quantri/admin_category.php';

include_once 'quantri/admin_product.php';

include_once 'quantri/admin_customer.php';

include_once 'quantri/admin_order.php';

include_once 'quantri/admin_slide.php';

include_once 'function.php';
$set_lang=mysql_query("SET NAMES 'utf8'");
header('Content-Type: text/html; charset=utf-8');
$objcate=new Category();
$objcustomer=new Customer();
$objproduct=new Product();
$objslide=new Slide();
// echo "<pre>";
// print_r($listCate);
if(isset($_POST['login'])){
	
	$us=$_POST['inputUsername'];
	$pw=$_POST['inputPassword'];
	
	$xh=$objcustomer->login($us,$pw);
	$delay=0;
	header("Refresh: $delay;"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shop Sport</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- Bootstrap style --> 
	<link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
	<link href="themes/css/base.css" rel="stylesheet" media="screen"/>
	<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/> -->
	
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="themes/images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
</head>
<body>
	<div id="header">
		<div class="container">
			<div id="welcomeLine" class="row">
				<?php
				if(isset($_SESSION['customer'])){
					?>
					<div class="span6">Xin chào!<strong> <?php echo $_SESSION['customer']['user'] ?></strong> / <a href="logout.php">Đăng xuất</a></div>
					<?php
				}else{
					?>
					<div class="span6"><a href="login.php">Đăng nhập</div>
					<?php
				}
				?>
				<div class="span6">
					<div class="pull-right">
						<a href="cart.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : "0" ?> ] sản phẩm trong giỏ hàng </span> </a> 
					</div>
				</div>
			</div>
			<!-- Navbar ================================================== -->
			<div id="logoArea" class="navbar">
				<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-inner">
					<a class="brand" href="index.php"><img src="hinhanh/logo/logoheader.png" alt="Bootsshop" style="width:65%;" /></a>
					<ul id="topMenu" class="nav pull-right">
						<li class=""><a href="search.php">Tìm kiếm</a></li>
						<li class=""><a href="special_offer.php">Giảm giá</a></li>
						<li class=""><a href="normal.php">Delivery</a></li>
						<li class=""><a href="contact.php">Liên hệ</a></li>
						<li class="">
							<?php
							if(!(isset($_SESSION['customer']))){

								?>
								<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Đăng nhập</span></a>
								<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3>Đăng nhập</h3>
									</div>
									<div class="modal-body">
										<form class="form-horizontal loginFrm" method="POST">
											<div class="control-group">								
												<input type="text" id="inputEmail" name="inputUsername" placeholder="Username">
											</div>
											<div class="control-group">
												<input type="password" id="inputPassword" name="inputPassword" placeholder="Password">
											</div>
											<div class="control-group">
												<button type="submit" name="login" class="btn btn-success">Đăng nhập</button>
												<button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
											</div>
											
										</form>
									</div>
								</div>
								<?php
							}else{
								?>
								<a href="account.php">Tài khoản</a></li>
								<?php
							}
							?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End====================================================================== -->
