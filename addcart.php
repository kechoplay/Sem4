<?php
include_once 'ketnoi.php';
session_start();

$prod=null;
$proid=$_GET['proid'];
$sql="select * from sanpham where pro_id=$proid";
$query=mysql_query($sql);
$fetch=mysql_fetch_array($query);
$price=$fetch['pro_price'];
$quantity=$fetch['pro_quantity'];
if (isset($_POST['addcart'])) {
	$number=($_POST['number']);
	$quan=($_POST['quan']);
	if($number>$quan || $number<=0){
		echo "<script>alert ('xin bạn chọn lại số lượng');</script>";
		header("location:javascript://history.go(-1)");
		exit();
	}
	if ($_POST['number']) {
		$num=$_POST['number'];
	}else{
		$num=1;
	}
	if(isset($_SESSION['cart'][$proid])){
		$prod=$_SESSION['cart'][$proid]['sl']+$num;
	}else{
		$prod=$num;
	}
	$_SESSION['cart'][$proid]=array(
		"id"=>$proid,
		"sl"=>$prod,
		"price"=>$price,
		"quantity"=>$quantity,
		);
}else{
	
	if(isset($_SESSION['cart'][$proid])){
		$prod=$_SESSION['cart'][$proid]['sl']+1;
	}else{
		$prod=1;
	}
	$_SESSION['cart'][$proid]=array(
		"id"=>$proid,
		"sl"=>$prod,
		"price"=>$price,
		"quantity"=>$quantity,
		);
}
// echo $price;
header("location:cart.php");
exit();
// echo "<pre>";
// print_r($_SESSION['cart']);
?>