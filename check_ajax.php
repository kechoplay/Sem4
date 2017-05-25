<?php

include_once 'ketnoi.php';

$us=$_POST['us'];
$pw=($_POST['pw']);
$rpw=($_POST['rpw']);
$pw5=md5($pw);
$fn=$_POST['fn'];
$em=$_POST['em'];
$mb=$_POST['mb'];
$ad=$_POST['ad'];

if($us=="" || $pw=="" || $rpw=="" || $fn=="" || $em=="" || $mb=="" || $ad=="")
{
	echo "Bạn k thể để trống trường này";
}
elseif (mysql_num_rows(mysql_query("select * from khachhang where username like '$us'"))>0) 
{
	echo "Tên đăng nhập đã tồn tại";
	
}
elseif(!preg_match("/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/", $pw))
{
	echo "Mật khẩu bắt đầu bằng chữ in hoa và có từ 6 đến 32 kí tự.";

}
elseif($rpw != $pw)
{
	echo "Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu.";
	
}
elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $em)) 
{
	echo "Email này không hợp lệ. Vui long nhập email khác.";
	
}
elseif (mysql_num_rows(mysql_query("select * from khachhang where email like '$em'"))>0) 
{
	echo "Email này đã có người dùng. Vui lòng chọn Email khác.";

}
elseif (!preg_match("/^[0-9]/", $mb))
{
	echo "Số điện thoại không hợp lệ. Vui lòng nhập lại.";
	
}
else
{
	$qur=mysql_query("insert into khachhang(username,password,fullname,email,mobile,address) values ('$us','$pw5','$fn','$em','$mb','$ad')");
	if($qur){
		echo "Quá trình đăng ký thành công";
		echo "<meta http-equiv=\"refresh\" content=\"2;url=login.php\">";
	}else{
		echo "<script>alert ('\"Đăng ký thất bại xin vui lòng thử lại\"')</script>";
		echo "<meta http-equiv=\"refresh\" content=\"2;url=register.php\">";

	}
}

?>