<?php

include('header.php');

include('slidebar.php');

$objcustomer=new Customer();

$data=array();
$error=array();
?>
<script type="text/javascript">
	function load_ajax(){
		var us=$('#username').val();
		var pw=$('#password').val();
		var rpw=$('#repassword').val();
		var fn=$('#fullname').val();
		var em=$('#email').val();
		var mb=$('#mobile').val();
		var ad=$('#address').val();
		console.log(rpw);

		$.ajax({
			url:"check_ajax.php",
			type:"POST",
			data:{
				us:us,pw:pw,rpw:rpw,fn:fn,em:em,mb:mb,ad:ad
			},
			success:function(data){
				$('.alert-block').css("display","block");
				$('.alert-block').html(data);
			}
		});
	}
</script>
<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.html">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Đăng kí</li>
	</ul>
	<h3> Đăng kí</h3>	
	<div class="well">
	
	<!-- <div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
	 <div class="alert alert-block alert-error fade in" style="display:none;">
		<button type="button" class="close" data-dismiss="alert">×</button>
		
	</div> 
	<form class="form-horizontal" method="POST">
		<h4>Thông tin cá nhân</h4>
		<div class="control-group">
			<label class="control-label" for="username">Username <sup>*</sup></label>
			<div class="controls">
				<input type="text" id="username" name="username" placeholder="Username">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password">Password <sup>*</sup></label>
			<div class="controls">
				<input type="password" id="password" name="password" placeholder="Password">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="repassword">Re-Password <sup>*</sup></label>
			<div class="controls">
				<input type="password" id="repassword" name="repassword" placeholder="Re-Password">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="fullname">Fullname <sup>*</sup></label>
			<div class="controls">
				<input type="text" id="fullname" name="fullname" placeholder="Full name">
			</div>
		</div>	  
		<div class="control-group">
			<label class="control-label" for="email">Email <sup>*</sup></label>
			<div class="controls">
				<input type="email" id="email" name="email" placeholder="Email">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="mobile">Mobile <sup>*</sup></label>
			<div class="controls">
				<input type="text" id="mobile" name="mobile" placeholder="Mobile">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="address">Address <sup>*</sup></label>
			<div class="controls">
				<textarea id="address" name="address" placeholder="Address"></textarea>
			</div>
		</div>

		<p><sup>*</sup>Điền đầy đủ thông tin	</p>

		<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="button" onclick="return load_ajax();" name="register" value="Đăng ký" />
			</div>
		</div>		
	</form>
</div>

<?php

include('footer.php');

include('themes_section.php');

?>