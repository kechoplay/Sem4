<?php
include_once 'quantri/admin_product.php';
$objproduct=new Product();

session_start();

$sort=$_POST['sort'];
switch ($sort) {
	case 'pro_name asc':
		$list=$objproduct->showListPro();
		?>
		<div class="tab-pane" id="listView">
			<?php
			foreach ($list as $key => $value) {
				?>
				<div class="row">
					<div class="span2">
						<img src="hinhanh/<?php echo $value['pro_image']; ?>" alt=""/>
					</div>
					<div class="span4">
						<h3>New | Available</h3>				
						<hr class="soft"/>
						<h5><?php echo $value['pro_name']; ?> </h5>
						<p>
							Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
							that is why our goods are so popular..
						</p>
						<a class="btn btn-small pull-right" href="product_details.php?proid=<?php echo $value['pro_id']; ?>">View Details</a>
						<br class="clr"/>
					</div>
					<div class="span3 alignR">
						<form class="form-horizontal qtyFrm">
							<h3> <?php echo number_format($value['pro_price']); ?> VNĐ</h3>
							<label class="checkbox">
								<input type="checkbox">  Adds product to compair
							</label><br/>

							<a href="addcart.php?proid=<?php echo $value['pro_id']; ?>" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
							<a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>

						</form>
					</div>
				</div>
				<hr class="soft"/>
				<?php
			}
			?>
			<hr class="soft"/>
		</div>

		<div class="tab-pane active" id="blockView">
			<ul class="thumbnails">
				<?php
				foreach ($list as $key => $value) {

					?>
					<li class="span3">
						<div class="thumbnail">
							<a href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>"><img src="hinhanh/<?php echo $value['pro_image']; ?>" alt=""/></a>
							<div class="caption">
								<h5><?php echo $value['pro_name']; ?></h5>
								<p> 
									I'm a paragraph. Click here 
								</p>
								<h4 style="text-align:center">
									<a class="btn" href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>"> 
										<i class="icon-zoom-in"></i>
									</a>
									<a class="btn" href="addcart.php?proid=<?php echo $value['pro_id']; ?>">Add to <i class="icon-shopping-cart"></i>
									</a>
									<a class="btn btn-primary" href="#"><?php echo number_format($value['pro_price']); ?>
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
		<?php
		break;
	
	case '':
		# code...
		break;
}
?>