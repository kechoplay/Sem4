<?php

include_once 'admin_header.php';

$objcus=new Customer();

$data=array();
$error=array();

if(isset($_GET['cusid'])){
	$cusid=$_GET['cusid'];
	$cus=$objcus->selectCusById($cusid);
    // echo "<pre>";
    // print_r($cus);
}

if(isset($_POST['save'])){
	
	if (isset($_GET['cusid'])) {
		$cusid=$_GET['cusid'];
        $status=$_POST['status'];
        $objcus->updateCustomer($status,$cusid);
    }else{
        $us=$_POST['username'];
        $fn=$_POST['fullname'];
        $pw=$_POST['password'];
        $md5pw=md5($pw);
        $rpw=$_POST['repassword'];
        $em=$_POST['email'];
        $mb=$_POST['mobile'];
        $ad=$_POST['address'];
        $status=$_POST['status'];
        if($us=="" || $pw=="" || $rpw=="" || $fn=="" || $em=="" || $mb=="" || $ad=="")
        {
            $error['us']= "Bạn k thể để trống trường này";
            $error['pw']= "Bạn k thể để trống trường này";
            $error['rpw']= "Bạn k thể để trống trường này";
            $error['fn']= "Bạn k thể để trống trường này";
            $error['em']= "Bạn k thể để trống trường này";
            $error['mb']= "Bạn k thể để trống trường này";
            $error['ad']= "Bạn k thể để trống trường này";
        }
        if (mysql_num_rows(mysql_query("select * from khachhang where username like '$us'"))>0) 
        {
            $error['us']= "Tên đăng nhập đã tồn tại";

        }
        if(!preg_match("/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/", $pw))
        {
            $error['pw']= "Mật khẩu bắt đầu bằng chữ in hoa và có từ 6 đến 32 kí tự.";

        }
        if($rpw != $pw)
        {
            $error['rpw']= "Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu.";

        }
        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $em)) 
        {
            $error['em']= "Email này không hợp lệ. Vui long nhập email khác.";

        }
        if (mysql_num_rows(mysql_query("select * from khachhang where email like '$em'"))>0) 
        {
            $error['em']= "Email này đã có người dùng. Vui lòng chọn Email khác.";

        }
        if (!preg_match("/^[0-9]/", $mb))
        {
            $error['mb']= "Số điện thoại không hợp lệ. Vui lòng nhập lại.";

        }
        if(!$error){
            $data[]=$us;
            $data[]=$md5pw;
            $data[]=$fn;
            $data[]=$em;
            $data[]=$mb;
            $data[]=$ad;
            $data[]=$status;
           $objcus->addCustomer($data);
       }
   }
}
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách hàng
                    <small><?=isset($_GET['cusid']) ? 'Sửa' : 'Thêm' ?></small>
                </h1>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
                <div class="alert alert-block alert-error fade in" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert">×</button>

                </div>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Tên dăng nhập</label>
                        <input class="form-control" name="username" <?=isset($_GET['cusid']) ? "disabled" : "" ?> value="<?=isset($_GET['cusid']) ? $cus['username'] : '' ?>" placeholder="Điền tên đăng nhập" />
                        <?=isset($error['us']) ? $error['us'] : '' ?>
                    </div>
                    <?php
                    if(!isset($_GET['cusid'])){
                        ?>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="Điền mật khẩu" />
                            <?=isset($error['pw']) ? $error['pw'] : '' ?>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="repassword" placeholder="Điền lại mật khẩu" />
                            <?=isset($error['rpw']) ? $error['rpw'] : '' ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <label>Tên đầy đủ</label>
                        <input type="text" class="form-control" name="fullname" <?=isset($_GET['cusid']) ? "disabled" : "" ?> value="<?=isset($_GET['cusid']) ? $cus['fullname'] : '' ?>" placeholder="Điền tên đầy đủ" />
                        <?=isset($error['fn']) ? $error['fn'] : '' ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="<?=isset($_GET['cusid']) ? $cus['email'] : '' ?>" class="form-control" name="email" <?=isset($_GET['cusid']) ? "disabled" : "" ?> name="txtRePass" placeholder="Điền email" />
                        <?=isset($error['em']) ? $error['em'] : '' ?>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" value="<?=isset($_GET['cusid']) ? $cus['mobile'] : '' ?>" class="form-control" name="mobile" <?=isset($_GET['cusid']) ? "disabled" : "" ?> name="txtEmail" placeholder="Điền số điện thoại" />
                        <?=isset($error['mb']) ? $error['mb'] : '' ?>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <textarea class="form-control" name="address" <?=isset($_GET['cusid']) ? "disabled" : "" ?>><?=isset($_GET['cusid']) ? $cus['address'] : '' ?></textarea>
                        <?=isset($error['ad']) ? $error['ad'] : '' ?>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <?php
                        if(isset($cus['status'])){
                            if($cus['status']==1){
                                ?>
                                <label class="radio-inline">
                                    <input name="status" value="1" checked="" type="radio">Hiện
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="2" type="radio">Ẩn
                                </label>
                                <?php
                            }elseif($cus['status']==2){
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
                    <button type="submit" name="save" class="btn btn-default" onclick="return load_ajax();">Lưu</button>
                    <button type="reset" class="btn btn-default">Làm lại</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        <?php

        include_once 'admin_footer.php';

        ?>