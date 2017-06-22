<?php

include('header.php');

include('slidebar.php');

$proid=$_GET['proid'];
$catid=$_GET['catid'];
$objproduct=new Product();

$where=array();
$where[]='pro_id!='.$proid;
$where[]='a.cat_id='.$catid;
$where[]='pro_status=1';
$start=0;
$limit=5;
$objproduct->updateProductBest($proid);

$listid=$objproduct->showListProById($proid);

$lq=$objproduct->listProduct($where,null,$start,$limit);

if(isset($_POST['addcart'])){
  $number=int($_POST['number']);
  $quan=int($_POST['quan']);
  if($number>$quan || $number<=0){
    echo "<script>alert 'xin bạn chọn lại số lượng'</script>";
  }
}

// echo $proid;
// echo "<pre>";
// print_r($lq);
?>
<script type="text/javascript">
  function changequan(val){
    var quan=$('#quan').val();
    if (Number(val)>Number(quan) || Number(val)<=0) {
      alert("xin bạn chọn lại số lượng");
    }
  }
</script>
<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
		<li><a href="products.php">Sản phẩm</a> <span class="divider">/</span></li>
		<li class="active">Chi tiết sản phẩm</li>
	</ul>	
	<div class="row">	  
		<div id="gallery" class="span3">
			<a href="hinhanh/<?php echo $listid[5] ?>" title="<?php echo $listid[2] ?>">
				<img src="hinhanh/<?php echo $listid[5] ?>" style="width:100%" alt="<?php echo $listid[2] ?>"/>
			</a>
			<!-- <div id="differentview" class="moreOptopm carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<a href="hinhanh/<?php  ?>"> <img style="height:70px" src="hinhanh/<?php  ?>" alt=""/></a>
						<a href="hinhanh/<?php  ?>"> <img style="height:70px" src="hinhanh/<?php  ?>" alt=""/></a>
					</div>
					<div class="item">
						<a href="hinhanh/<?php  ?>" > <img style="height:65px" src="hinhanh/<?php  ?>" alt=""/></a>
					</div>
				</div><!-- 
               
       <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
       <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>  -->

       <!-- </div> -->
     </div>
     <div class="span6">
      <h3><?php echo $listid[2] ?></h3>
      <small></small>
      <hr class="soft"/>
      <form class="form-horizontal qtyFrm" method="POST" action="addcart.php?proid=<?php echo $listid[0] ?>">
        <div class="control-group">
          <label class="control-label">
            <?php
            if($listid[4]==0){
              ?>
              <span><?php echo number_format($listid[3]); ?> VNĐ</span>
              <?php 
            }else{
              ?>
              <span><?php echo number_format($listid[3]-$listid[4]); ?> VNĐ</span><br>
              <span style="text-decoration:line-through; font-size:15px;"><?php echo number_format($listid[3]); ?> VNĐ</span>
              <?php
            }
            ?>
          </label>
          <div class="controls">
            <input type="number" value="1" id="number" min="1" max="<?php echo $listid[7] ?>" class="span1" <?php echo ($listid[7])!=0 ? "" : "disabled" ?> name="number" onchange="changequan(this.value)" placeholder="Qty."/>
            Sô lượng : <?php echo ($listid[7])!=0 ? $listid[7] : "Hết hàng" ?>
            <input type="hidden" name="quan" id="quan" value="<?php echo $listid[7] ?>">
            <button type="submit" name="addcart" class="btn btn-large btn-primary pull-right"> Thêm giỏ hàng 
              <i class=" icon-shopping-cart"></i>
            </button>
          </div>
        </div>
      </form>
      <hr class="soft clr"/>
      <p>

      </p>
      <a class="btn btn-small pull-right" href="#detail">Xem chi tiết</a>
      <br class="clr"/>
      <a href="#" name="detail"></a>
      <hr class="soft"/>
    </div>

    <div class="span9">
     <ul id="productDetail" class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Chi tiết</a></li>
      <li><a href="#profile" data-toggle="tab">Sản phẩm liên quan</a></li>

    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in" id="home">
        <?php
        echo html_entity_decode($listid[6]);
        ?>
      </div>

      <div class="tab-pane fade" id="profile">
        <div id="myTab" class="pull-right">
          <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
          <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
        </div>
        <br class="clr"/>
        <hr class="soft"/>
        <div class="tab-content">
          <div class="tab-pane" id="listView">
           <?php
           foreach ($lq as $key => $value) {

            ?>
            <div class="row">	  
             <div class="span2">
              <a href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>">
               <img src="hinhanh/<?php echo $value['pro_image'] ?>" alt=""/>
             </a>
           </div>
           <div class="span4">
            <h3>Có sẵn</h3>       
            <hr class="soft"/>
            <h5><?php echo $value[2] ?> </h5>
            <p>

            </p>
            <a class="btn btn-small pull-right" href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>">Xem chi tiết</a>
            <br class="clr"/>
          </div>
          <div class="span3 alignR">
            <form class="form-horizontal qtyFrm">
              <?php
              if($value['pro_discount']==0){
                ?>
                <h3><?php echo number_format($value['pro_price']); ?> VNĐ </h3>
                <?php
              }else{
                ?>
                <h3><?php echo number_format($value['pro_price']-$value['pro_discount']); ?> VNĐ </h3>
                <h4 style="text-decoration:line-through;"><?php echo number_format($value['pro_price']); ?> VNĐ</h4>
                <?php
              }
              ?>
              <br/>
              <div class="btn-group">
                <?php
                if($value['pro_quantity']>0){
                  ?>
                  <a href="addcart.php?proid=<?php echo $value['pro_id']; ?>" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
                  <?php
              }else{
                ?>
                <a class="btn btn-large btn-primary"> Hết hàng</i></a>
                <?php
              }
              ?>
                <a href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>
              </div>
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
        foreach ($lq as $key => $value) {
          ?>
          <li class="span3">
            <div class="thumbnail">
              <a href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>">
                <img src="hinhanh/<?php echo $value['pro_image'] ?>" alt=""/>
              </a>
              <div class="caption">
                <h5><?php echo $value[2] ?></h5>
                <p>  </p>
                <h4 style="text-align:center">
                  <a class="btn" href="product_details.php?proid=<?php echo $value['pro_id']; ?>&catid=<?php echo $value['cat_id']; ?>">
                    <i class="icon-zoom-in"></i>
                  </a> 
                  <?php
                  if($value['pro_quantity']>0){
                    ?>
                    <a class="btn" href="addcart.php?proid=<?php echo $value['pro_id']; ?>">Thêm vào 
                      <i class="icon-shopping-cart"></i>
                    </a> 
                    <?php
                  }else{
                    ?>
                    <a class="btn">da het hang</a>
                    <?php
                  }
                  ?>
                  <?php
                  if($value['pro_discount']==0){
                    ?>
                    <a class="btn btn-primary" href="#"><?php echo number_format($value['pro_price']); ?> .VNĐ</a>
                    <?php 
                  }else{
                    ?>
                    <a class="btn btn-primary" href="#"><?php echo number_format($value['pro_price']-$value['pro_discount']); ?> .VNĐ</a>
                    <a class="btn btn-primary" style="text-decoration:line-through;" href="#"><?php echo number_format($value['pro_price']); ?> .VNĐ</a>
                    <?php } ?>
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
    <br class="clr">
  </div>
</div>
</div>

</div>

<?php

include('footer.php');

include('themes_section.php');

?>
