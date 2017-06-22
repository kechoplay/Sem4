
<?php

include('header.php');

include('slidebar.php');

if(isset($_POST['capnhat'])){
	// echo "<pre>";
	// print_r($_POST['num']);
	if(isset($_SESSION['cart'])){
		foreach ($_POST['num'] as $key => $value) {
			if(intval($value)>intval($_POST['quan'])){
				echo "<script>alert('Số lượng bạn chọn lớn hơn số lượng có trong shop')</script>";
			}elseif(($value==0) and (is_numeric($value))){
				unset($_SESSION['cart'][$key]);
			}elseif (($value>0) and (is_numeric($value))) {
				$_SESSION['cart'][$key]['sl']=$value;
			}
		}
	}
}
?>

<script type="text/javascript">
	function xacnhanxoa(){
		if(window.confirm("Bạn có muốn xóa k?")){
			return true;
		}
		return false;
	}
</script>
<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active"> GIỎ HÀNG</li>
	</ul>
	<h3>  GIỎ HÀNG [ <small><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']): "0" ?> Sản phẩm </small>]
		<a href="products.php" class="btn btn-large pull-right">
			<i class="icon-arrow-left"></i> Tiếp tục mua hàng 
		</a>
	</h3>	
	<hr class="soft"/>
	<?php
	if(!(isset($_SESSION['customer']))){
		?>
		<table class="table table-bordered">
			<tr><th> TÔI SẴN SÀNG ĐĂNG NHẬP  </th></tr>
			<tr> 
				<td>
					<form class="form-horizontal" method="POST">
						<div class="control-group">
							<label class="control-label" for="inputUsername">Tên dăng nhập</label>
							<div class="controls">
								<input type="text" id="inputUsername" name="inputUsername" placeholder="Username">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Mật khẩu</label>
							<div class="controls">
								<input type="password" id="inputPassword" name="inputPassword" placeholder="Password">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" name="login" class="btn">Đăng nhập</button> HOẶC <a href="register.php" class="btn">Đăng ký ngay!</a>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<a href="forgetpass.php" style="text-decoration:underline">Quên mật khẩu ?</a>
							</div>
						</div>
					</form>
				</td>
			</tr>
		</table>	
		<?php
	}
	?>	
	
	<?php 
	$total=0;
	$totaldiscount=0;
	$totalall=0;
	$ok=1;
	if(isset($_SESSION['cart'])){
		foreach ($_SESSION['cart'] as $key => $value) {
			if(isset($key)){
				$ok=2;
			}
		}
	}
	?>
	<form method="POST">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Product</th>
					<th>Description</th>
					<th>Quantity/Delete</th>
					<th>Price</th>
					<th>Discount</th>
					<th>Total</th>
				</tr>
			</thead>

			<tbody>

				<?php
				if($ok==2){
					if(isset($_SESSION['cart'])!=null){
						$arr_id=array();
						foreach($_SESSION['cart'] as $id=>$prd){
							$arr_id[] = $id;
						}
					// echo "<pre>";
					// print_r($arr_id);
					// session_destroy();
						$list=$objproduct->showListCart($arr_id);
						foreach ($list as $key => $value) {

							?>
							<tr>
								<input type="hidden" name="proid" value="<?php echo $value['pro_id']; ?>">
								<td> <img width="60" src="hinhanh/<?php echo $value['pro_image']; ?>" alt=""/></td>
								<td><?php echo $value['pro_name']; ?><br/></td>
								<td>
									<div class="input-append">
										<input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" onkeypress="return numberOnly(this, event);" size="16" name="num[<?php echo $value['pro_id']; ?>]" type="text" value="<?php echo $_SESSION['cart'][$value['pro_id']]['sl']; ?>" >
										<a href="delcart.php?id=<?php echo $value['pro_id']; ?>"><button class="btn btn-danger" type="button" onclick="return xacnhanxoa();" name="del"><i class="icon-remove icon-white"></i></button></a>
										<input type="hidden" value="<?php echo $value['pro_quantity']; ?>" name="quan" />
									</div>
								</td>
								<td><?php echo number_format($value['pro_price']); ?></td>
								<td><?php echo number_format($value['pro_discount']*$_SESSION['cart'][$value['pro_id']]['sl']); ?></td>
								<td><?php echo number_format($value['pro_price']*$_SESSION['cart'][$value['pro_id']]['sl']); ?></td>
							</tr>
							<?php
							$total+=$value['pro_price']*$_SESSION['cart'][$value['pro_id']]['sl'];
							$totaldiscount+=$value['pro_discount']*$_SESSION['cart'][$value['pro_id']]['sl'];
							$totalall=$total-$totaldiscount;
						}
					}
				}else{
					echo "Không có hóa đơn nào";
				}
				?>
				<tr>
					<td colspan="6"><input type="submit" name="capnhat" value="Cập nhật giỏ hàng"></td>
				</tr>
				<tr>
					<td colspan="5" style="text-align:right">Total Price:	</td>
					<td> <?php echo number_format($total); ?></td>
				</tr>
				<tr>
					<td colspan="5" style="text-align:right">Total Discount:	</td>
					<td> <?php echo number_format($totaldiscount); ?></td>
				</tr>
				<tr>
					<td colspan="5" style="text-align:right"><strong>TOTAL (<?php echo number_format($total)." - ".number_format($totaldiscount); ?>) =</strong></td>
					<td class="label label-important" style="display:block"> <strong> <?php echo number_format($totalall); $_SESSION['total']=$totalall; ?> </strong></td>
				</tr>

			</tbody>
		</table>
	</form>
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
	<a href="products.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<?php
	if(isset($_SESSION['customer'])){
		
		?>
		<a href="payment.php" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
		<?php
	}else{
		?>
		<h4 class="pull-right">Bạn hãy đăng nhập để được thanh toán</h4>
		<?php
	}
	?>
</div>

<?php

include('footer.php');

include('themes_section.php');

?>
