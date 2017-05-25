<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
			<?php
			$where=" where sli_status=1";
			$litslide=$objslide->showSlide($where);
			// echo "<pre>";
			// print_r($litslide);
			for ($i=0; $i <count($litslide) ; $i++) { 
				if($i==0){
					?>
					<div class="item active">
						<div class="container" style="width:100%;">
							<a href="<?=$litslide[$i]['sli_link']?>"><img style="width:100%" src="hinhanh/slide/<?=$litslide[$i]['sli_image']?>" alt="special offers"/></a>
						</div>
					</div>
					<?php
				}else{
					?>
					<div class="item">
						<div class="container" style="width:100%;">
							<a href="register.html"><img style="width:100%" src="hinhanh/slide/<?=$litslide[$i]['sli_image']?>" alt=""/></a>
							<div class="carousel-caption">
								<h4>Second Thumbnail label</h4>
								<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>			
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div> 
</div>