<?php

include('header.php');

include('banner.php');

include('slidebar.php');

$objproduct=new Product();

$where=' where pro_status=1';
$order=' order by pro_count_buy desc';
$order1=' order by pro_id desc';
$order2=' order by pro_view desc';
$limit=3;
$start=0;
$buy=$objproduct->listProduct($where,$order,$start,$limit);

$new=$objproduct->listProduct($where,$order1,$start,$limit);

$view=$objproduct->listProduct($where,$order2,$start,$limit);
?>

<div class="span9">
	<h4>Sản phẩm mới nhất </h4>
	<ul class="thumbnails">
		<?php
		foreach ($new as $key => $value) {

			?>
			<li class="span3">

				<div class="thumbnail">
					<div class="tag1"><img src="themes/images/new2.png"/></div>
					<a  href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>">
						<img src="hinhanh/<?php echo $value['pro_image'] ?>" alt=""/>
					</a>
					<div class="caption">
						<h5><?php echo $value['pro_name'] ?></h5>
						<p> 

						</p>
						<h4 style="text-align:center">
							<a class="btn" href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>"> 
								<i class="icon-zoom-in"></i>
							</a> 
							<a class="btn" href="addcart.php?proid=<?php echo $value['pro_id']; ?>">Add to 
								<i class="icon-shopping-cart"></i>
							</a> 
							<?php
							if($value['pro_discount']==0){
								?>
								<a class="btn btn-primary" href="#"><?php echo number_format($value['pro_price']); ?></a>
								<?php 
							}else{
								?>
								<a class="btn btn-primary" href="#"><?php echo number_format($value['pro_price']-$value['pro_discount']); ?>
								</a>
								<a class="btn btn-primary" style="text-decoration:line-through;" href="#"><?php echo number_format($value['pro_price']); ?>
								</a>
								<?php } ?>
							</h4>
						</div>
					</div>

				</li>
				<?php
			}
			?>
		</ul>	
		<h4>Sản phẩm bán chạy nhất </h4>
		<ul class="thumbnails">
			<?php
			foreach ($buy as $key => $value) {

				?>
				<li class="span3">

					<div class="thumbnail">
						<a  href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>">
							<img src="hinhanh/<?php echo $value['pro_image'] ?>" alt=""/>
						</a>
						<div class="caption">
							<h5><?php echo $value['pro_name'] ?></h5>
							<p> 

							</p>

							<h4 style="text-align:center">
								<a class="btn" href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>"> 
									<i class="icon-zoom-in"></i>
								</a> 
								<a class="btn" href="addcart.php?proid=<?php echo $value['pro_id']; ?>">Add to 
									<i class="icon-shopping-cart"></i>
								</a> 
								<?php
								if($value['pro_discount']==0){
									?>
									<a class="btn btn-primary" href="#"><?php echo number_format($value['pro_price']); ?></a>
									<?php 
								}else{
									?>
									<a class="btn btn-primary" href="#"><?php echo number_format($value['pro_price']-$value['pro_discount']); ?>
									</a>
									<a class="btn btn-primary" style="text-decoration:line-through;" href="#"><?php echo number_format($value['pro_price']); ?>
									</a>
									<?php } ?>
								</h4>
							</div>
						</div>

					</li>
					<?php
				}
				?>
			</ul>
			<h4>Sản phẩm xem nhiều nhất </h4>
			<ul class="thumbnails">
				<?php
				foreach ($view as $key => $value) {

					?>
					<li class="span3">

						<div class="thumbnail">
							<a  href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>">
								<img src="hinhanh/<?php echo $value['pro_image'] ?>" alt=""/>
							</a>
							<div class="caption">
								<h5><?php echo $value['pro_name'] ?></h5>
								<p> 

								</p>

								<h4 style="text-align:center">
									<a class="btn" href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>"> 
										<i class="icon-zoom-in"></i>
									</a> 
									<a class="btn" href="addcart.php?proid=<?php echo $value['pro_id']; ?>">Add to 
										<i class="icon-shopping-cart"></i>
									</a> 
									<?php
									if($value['pro_discount']==0){
										?>
										<a class="btn btn-primary" href="#"><?php echo number_format($value['pro_price']); ?></a>
										<?php 
									}else{
										?>
										<a class="btn btn-primary" href="#"><?php echo number_format($value['pro_price']-$value['pro_discount']); ?>
										</a>
										<a class="btn btn-primary" style="text-decoration:line-through;" href="#"><?php echo number_format($value['pro_price']); ?>
										</a>
										<?php } ?>
									</h4>
								</div>
							</div>

						</li>
						<?php
					}
					?>
				</ul>
			</div>

			<?php

			include('footer.php');

			include('themes_section.php');

			?>
