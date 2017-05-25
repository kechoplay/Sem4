<?php
include_once 'admin_header.php';

$objpro=new Product();

$objcate=new Category();
// $listCate=$objcate->showListPro();
$where=array();
$where[]="parent_id <> 0";
$where[]="cat_status=1";
$order=" order by cat_id asc";
$listCateId=$objcate->showListCate($where,$order);
// echo "<pre>";
// print_r($listCateId);

if(isset($_GET['proid'])){
	$proid=$_GET['proid'];
    $pro=$objpro->showListProById($proid);
//     echo "<pre>";
// print_r($pro);
}
$data=array();

if(isset($_POST["save"])){
    $set[]=array();
    $error=array();
    $proname=$_POST['proname'];
    $cate=$_POST['cate'];
    $proprice=$_POST['proprice'];
    $prodiscount=$_POST['prodiscount'];
    
    $prodes=htmlentities($_POST['prodes']);

    $proquan=$_POST['proquan'];
    $prostatus=$_POST['status'];
    
    if(empty($proname)){
        $error['proname']='Không được để trống trường nội dung nào!';
    }
    if(empty($proprice)){
        $error['proprice']="Không được để trống trường nội dung nào!";
    }
    if(!($_FILES['sua_image']['name']) && empty($_POST['image'])){
        $error['proimage']="Không được để trống trường nội dung nào!";
    }
    if(empty($prodes)){
        $error['prodes']="Không được để trống trường nội dung nào!";
    }
    if(empty($proquan)){
        $error['proquan']="Không được để trống trường nội dung nào!";
    }
    if($_POST["cate"] ==0){
        $error['cate']="Bạn hãy chọn 1 danh mục";
    }
    if(!$error){
        if(isset($_GET['proid'])){
            if (($_FILES['sua_image']['name'])!=null) {
                if($_FILES['sua_image']['type'] == "image/jpeg" || $_FILES['sua_image']['type'] == "image/png" || $_FILES['sua_image']['type'] == "image/gif"){
                    $name=$_FILES['sua_image']['name'];
                    $path=$_FILES['sua_image']['tmp_name'];
                    $new_path="../hinhanh/".$name;
                    $image_upload=move_uploaded_file($path,$new_path);
                    $image_name=$name;
                }else{
                    $error['proimage']="Vui lòng chọn file";
                }
            }else{
                $image_name=$_POST['image'];
            }

            $proid=$_GET['proid'];
            $set='cat_id='.$cate.',pro_name="'.$proname.'",pro_price='.$proprice.',pro_discount='.$prodiscount.',pro_image="'.$image_name.'",pro_description="'.$prodes.'",pro_quantity='.$proquan.',pro_status='.$prostatus;

            $objpro->updateProduct($set,$proid);
        }else{
            if($_FILES['sua_image']['type'] == "image/jpeg" || $_FILES['sua_image']['type'] == "image/png" || $_FILES['sua_image']['type'] == "image/gif"){
                $name=$_FILES['sua_image']['name'];
                $path=$_FILES['sua_image']['tmp_name'];
                $new_path="../hinhanh/".$name;
                $image_upload=move_uploaded_file($path,$new_path);
                $set="(cat_id,pro_name,pro_price,pro_discount,pro_image,pro_description,pro_quantity,pro_status) values ($cate,'$proname',$proprice,$prodiscount,'$name','$prodes',$proquan,$prostatus)";
                $objpro->addProduct($set);
            }else{
                $error['proimage']="Vui lòng chọn file";
            }
        }
    }
}
?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm
					<small><?=isset($_GET['proid']) ? "Sửa" : "Thêm" ?></small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="cate" class="form-control">
                            <option value="0">Hãy chon danh mục</option>
                            <?php isset($_GET['proid']) ? cateParentId($listCateId,0,"--",$pro[1]) : cateParentId($listCateId,0,"--",0) ?>
                        </select>
                        <?=isset($error['cate']) ? $error['cate'] : ""; ?>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="proname" value="<?=isset($_GET['proid']) ? $pro[2] : '' ?>" placeholder="Nhập tên sản phẩm" />
                        <?=isset($error['proname']) ? $error['proname'] : ""; ?>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="proprice" onkeypress="return numberOnly(this, event);" value="<?=isset($_GET['proid']) ? ($pro[3]) : '' ?>" placeholder="Nhập giá gốc" />
                        <?=isset($error['proprice']) ? $error['proprice'] : "" ?>
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mãi</label>
                        <input class="form-control" name="prodiscount" onkeypress="return numberOnly(this, event);" value="<?=isset($_GET['proid']) ? ($pro[4]) : '' ?>" placeholder="Nhập giá khuyến mãi" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label><br>
                        <img src="../hinhanh/<?=isset($_GET['proid']) ? $pro[5] : 'avatar_2x.png' ?>" style="width:150px">
                        <input type="file" name="sua_image">
                        <input type="hidden" name="image" value="<?=isset($_GET['proid']) ? $pro[5] : '' ?>">
                        <?=isset($error['proimage']) ? $error['proimage'] : ""; ?>
                    </div>
                    <div class="form-group">
                      <label>Miêu tả</label>
                      <textarea class="ckeditor" id="" rows="3" name="prodes"><?=isset($_GET['proid']) ? $pro[6] : '' ?></textarea>

                      <?=isset($error['prodes']) ? $error['prodes'] : "" ?>
                  </div>
                  <div class="form-group">
                    <label>Số lượng nhập</label>
                    <input class="form-control" name="proquan" max="9999" min="0" type="number" value="<?= isset($_GET['proid']) ? $pro[7] : 0 ?>" />
                    <?=isset($error['proquan']) ? $error['proquan'] : "" ?>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <?php
                    if(isset($pro[10])){
                        if($pro[10]==1){
                            ?>
                            <label class="radio-inline">
                                <input name="status" value="1" checked="" type="radio">Hiện
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="2" type="radio">Ẩn
                            </label>
                            <?php
                        }elseif($pro[10]==2){
                            ?>
                            <label class="radio-inline">
                                <input name="status" value="1" type="radio">Hiện
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="2" checked="" type="radio">Ẩn
                            </label>
                            <?php
                        }
                    }else{
                        ?>
                        <label class="radio-inline">
                            <input name="status" value="1" checked="" type="radio">Hiện
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="2" type="radio">Ẩn
                        </label>
                        <?php
                    }
                    ?>
                </div>
                <button type="submit" name="save" class="btn btn-default">Lưu</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
        <!-- <div class="col-lg-4">
            <button type="button" class="btn btn-primary" id="addImage">Add Image</button>
            <div id="insert" style="margin:20px;"></div>
        </div> -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#addImage').click(function(){
            $('#insert').append('<div class="form-group"><input type="file" name="fileDetail[]"></div>');
        });
    });
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

include_once 'admin_footer.php';

?>