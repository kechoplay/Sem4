<?php

include('header.php');

include('slidebar.php');

$objproduct=new Product();

$objcate=new Category();

$objcustomer=new Customer();

$objorder=new Orders();

if(isset($_SESSION['customer'])){
	$username=$_SESSION['customer']['user'];
	$password=$_SESSION['customer']['pass'];
}
$data=array();
$error=array();

if (isset($_POST['payment'])) {
	$feild=array();

	$data['name']=isset($_POST['name']) ? $_POST['name'] : '';
	$data['mobile']=isset($_POST['mobile']) ? $_POST['mobile'] : '';
	$data['address']=isset($_POST['address']) ? $_POST['address'] : '';

	if(empty($data['name'])){
		$error['name']="Không được để trống nội dung này";
	}
	if(empty($data['mobile'])){
		$error['mobile']="Không được để trống nội dung này";
	}
	if(empty($data['address'])){
		$error['address']="Không được để trống nội dung này";
	}

	$feild[0]=$_SESSION['customer']['id'];
	$feild[1]=$_POST['name'];
	$feild[2]=$_POST['mobile'];
	$feild[3]=$_POST['address'];
	$feild[4]=$_SESSION['total'];
	$feild[5]=$_POST['tt'];
	if(!$error){
// echo "<pre>";
// print_r($feild);
		$objorder->addOrder($feild,$_SESSION['cart']);
		unset($_SESSION['total']);
	}
}
// echo "<pre>";
// print_r($cus);
?>
<script type="text/javascript">
	function numberOnly(myfield, e){
		var key,keychar;
		if (window.event){
			key = window.event.keyCode
		}else if (e){
			key = e.which
		}else{
			return true
		}
		keychar = String.fromCharCode(key);
		if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27)){
			return true
		}else if (("0123456789").indexOf(keychar) > -1){
			return true
		}
		return false;
	}
</script>
<?php
if (isset($_SESSION['cart'])) {

	?>
	<div class="span9">
		<ul class="breadcrumb">
			<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
			<li class="active">Thanh toán</li>
		</ul>
		<h3>Thanh toán</h3>	
		<p>

		</p>
		<hr class="soft"/>

		<form method="POST">
			<table class="">
				<tr>
					<td>Tên khách hàng : </td>
					<td style="padding-left:52px;"><input type="text" name="name" value="<?php echo $_SESSION['customer']['fullname'] ?>">
						<?php echo isset($error['name']) ? $error['name'] : ""; ?>
					</td>
				</tr>
				<tr>
					<td>Địa chỉ giao hàng : </td>
					<td style="padding-left:52px;"><input type="text"  name="address" id="address"> (Ghi rõ số nhà, ngõ)
						<?php echo isset($error['address']) ? $error['address'] : ""; ?>
					</td>
				</tr>
				<tr>
					<td>Số điện thoại : </td>
					<td style="padding-left:52px;"><input type="text" onkeypress="return numberOnly(this, event);" value="<?php echo $_SESSION['customer']['mobile'] ?>" name="mobile" id="mobile">
						<?php echo isset($error['mobile']) ? $error['mobile'] : ""; ?>
					</td>
				</tr>
				<tr>
					<td>Phương thức thanh toán : </td>
					<td style="padding-left:52px;">
						<select name="tt">
							<option value="Thanh toán trực tiếp">Thanh toán khi nhận hàng</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td style="padding-left:52px;"><input type="submit" name="payment" value="Thanh toán"></td>
				</tr>
			</table>
		</form>
	</div>
	<?php
}else{
	echo "<h3 style='font-size:15px;'>Bạn chưa có sản phẩm nào trong giỏ hàng, xin hãy mua hàng để được thanh toán</h3>";
}

include('footer.php');

include('themes_section.php');

?>