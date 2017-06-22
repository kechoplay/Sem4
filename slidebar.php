<?php

$wheres=array();

$wheres[]="parent_id = 0";
$wheres[]="cat_status=1";
$listCate=$objcate->showListCate($wheres);

$where=' where pro_status=1';
$ran=$objproduct->randomRow($where);

// $pro=array_rand($lpro,2);
// echo "<pre>";
// print_r($ran);
?>
<div id="mainBody">
	<div class="container">
		<div class="row">
			<!-- Sidebar ================================================== -->
			<div id="sidebar" class="span3">
				<div class="well well-small">
					<a id="myCart" href="cart.php">
						<img src="themes/images/ico-cart.png" alt="cart"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : "0" ?> sản phẩm trong giỏ hàng  
					</a>
				</div>
				<ul id="sideManu" class="nav nav-tabs nav-stacked">
					<?php
					// echo "<pre>";
					// 			print_r($where);
					foreach ($listCate as $key => $value) {

						?>
						<li class="subMenu open"><a> <?php echo $value[1]; ?></a>
							<ul>
								<?php							
								$listchild=$objcate->getCatByParent($value[0]);			
								foreach ($listchild as $keys => $values) {
									?>
									<li>
										<a class="active" href="products.php?catid=<?php echo $values[0]; ?>">
											<i class="icon-chevron-right"></i><?php echo $values[1]; ?> 
										</a>
									</li>
									<?php
								}
								?>
							</ul>
						</li>
						<?php
					}
					?>
				</ul>
				<br/>
				<?php
				// foreach ($pro as $key => $value) {
				// 	$ran=$objproduct->showListProById($value);
				foreach ($ran as $keys => $values) {
					?>
					<div class="thumbnail">
						<a  href="product_details.php?proid=<?php echo $values['pro_id']; ?>&catid=<?php echo $values['cat_id']; ?>">
							<img src="hinhanh/<?php echo $values['pro_image'] ?>" alt=""/>
						</a>
						<div class="caption">
							<h5><?php echo $values['pro_name'] ?></h5>
							<h4 style="text-align:center">
								<a class="btn" href="product_details.php?proid=<?php echo $values['pro_id']; ?>&catid=<?php echo $values['cat_id']; ?>"> 
									<i class="icon-zoom-in"></i>
								</a> 
								<a class="btn" href="addcart.php?proid=<?php echo $values['pro_id']; ?>">Add to 
									<i class="icon-shopping-cart"></i>
								</a> 
								<?php
								if($values['pro_discount']==0){
									?>
									<a class="btn btn-primary" href="#"><?php echo number_format($values['pro_price']); ?></a>
										<?php
									}else{
										?>
										<a class="btn btn-primary" href="#"><?php echo number_format($values['pro_price']-$values['pro_discount']); ?>
										</a>
										<a class="btn btn-primary" style="text-decoration:line-through;" href="#"><?php echo number_format($values['pro_price']); ?>
										</a>
										<?php 
									}
									?>
								</h4>
							</div>
						</div><br/>
						<?php
					// }
					}
					?>
				</div>
			<!-- Sidebar end=============================================== -->