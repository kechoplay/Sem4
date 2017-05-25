<?php

include('header.php');

include('slidebar.php');

$where=array();
$where[]="parent_id <> 0";
$where[]="cat_status=1";
$listCate=$objcate->showListCate($where);
if(isset($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}
$max_result=5;
$index_row=$max_result*$page-$max_result;

if(isset($_GET['search'])){
	$where=array();
	$cate=$_GET['cate'];
	$name=$_GET['name'];
	$minprice=$_GET['minprice'];
	$maxprice=$_GET['maxprice'];
	if($name){
		$where[]="pro_name like '%".$name."%'";
	}
	if($minprice){
		$where[]="pro_price >=".$minprice;
		if($maxprice){
			$where[]="pro_price <=".$maxprice;
		}
	}
	if($cate!=0){
		$where[]="a.cat_id=".$cate;
	}
	$where[]="pro_status=1";
	$searchs=$objproduct->search($where);
	// echo "<pre>";
	// print_r($searchs);
}
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
<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Tìm kiếm</li>
	</ul>
	<div>
		<form method="GET">
			<table class="">
				<tr>
					<td>Tìm theo danh mục : </td>
					<td style="padding-left:52px">
						<select class="srchTxt" name="cate">
							<option value="0">All</option>
							<?php
							foreach ($listCate as $key => $value) {
								?>
								<option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
								<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Tìm kiếm theo tên : </td>
					<td style="padding-left:52px;"><input type="text" name="name">

					</td>
				</tr>
				<tr>
					<td>Tìm kiếm theo giá : </td>
					<td>Giá min :<input type="text" onkeypress="return numberOnly(this, event);" name="minprice" id="minprice"></td>
				</tr>
				<tr>
					<td></td>
					<td>Giá max:<input type="text" onkeyup="mixMoney(this)" onkeypress="return numberOnly(this, event);" value="" name="maxprice" id="maxprice"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="search" value="Search"></td>
				</tr>
			</table>
		</form>
	</div>
	<?php
	if(isset($_GET['search'])){
		if(!empty($searchs)){
			?>
			<h3> 
				<small class="pull-right"> <?php echo count($searchs);?> sản phẩm có sẵn </small>
			</h3>	
			<p>

			</p>
			<hr class="soft"/>

			<div id="myTab" class="pull-right" style="margin-bottom:20px;">
				<a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
				<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
			</div>
			<br class="clr"/>
			<div class="tab-content">
				<div class="tab-pane" id="listView">
					<?php
					foreach ($searchs as $key => $value) {
						?>
						<div class="row">
							<div class="span2">
								<img src="hinhanh/<?php echo $value['pro_image']; ?>" alt=""/>
							</div>
							<div class="span4">
								<h3>Có sẵn</h3>				
								<hr class="soft"/>
								<h5><?php echo $value['pro_name']; ?> </h5>
								<p>
								</p>
								<a class="btn btn-small pull-right" href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>">Xem chi tiết</a>
								<br class="clr"/>
							</div>
							<div class="span3 alignR">
								<form class="form-horizontal qtyFrm">
									<h3><?php echo number_format($value['pro_price']-$value['pro_discount']); ?> VNĐ </h3>
									<h4 style="text-decoration:line-through;"><?php echo number_format($value['pro_price']); ?> VNĐ</h4>
									<br/>

									<a href="addcart.php?proid=<?php echo $value['pro_id']; ?>" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
									<a href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>

								</form>
							</div>
						</div>
						<hr class="soft"/>
						<?php
					}
					?>
				</div>

				<div class="tab-pane active" id="blockView">
					<ul class="thumbnails">
						<?php
						foreach ($searchs as $key => $value) {

							?>
							<li class="span3">
								<div class="thumbnail">
									<a href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>"><img src="hinhanh/<?php echo $value['pro_image']; ?>" style="max-width:96%;" alt=""/></a>
									<div class="caption">
										<h5><?php echo $value['pro_name']; ?></h5>
										<p> 
											
										</p>
										<h4 style="text-align:center">
											<a class="btn" href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>"> 
												<i class="icon-zoom-in"></i>
											</a>
											<a class="btn" href="addcart.php?proid=<?php echo $value['pro_id']; ?>">Thêm vào <i class="icon-shopping-cart"></i>
											</a>
											<a class="btn btn-primary" href="#"><?php echo number_format($value['pro_price']-$value['pro_discount']); ?>
											</a>
											<a class="btn btn-primary" style="text-decoration:line-through;" href="#"><?php echo number_format($value['pro_price']); ?>
											</a>
										</h4>
									</div>
								</div>
							</li>
							<?php
						}
						?>
					</ul>
					<hr class="soft"/>
				</div>
			</div>
			<?php
		}
	}
	?>

</div>
<?php
			// }

include('footer.php');

include('themes_section.php');

?>