<?php
/**
* 
*/
class Customer
{
	
	function &getInstance()
	{
		static $instance;

		if (is_null($instance)) {
			$instance = new Customer();
		}

		return $instance;
	}

	public function login($us,$pw){
		if ($us=="" || $pw=="") {
			echo "<script>alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu')</script>";

		}else{
			$pw=md5($pw);
			$sql="select * from khachhang where username like '$us' and password like '$pw'";
			$query=mysql_query($sql);
			$fetch=mysql_fetch_array($query);
			if($num_row=mysql_num_rows($query)>0){
				if($fetch['status']==1){
					$_SESSION['customer']=array(
						'user'=>$us,
						'pass'=>$pw,
						'id'=>$fetch['cus_id'],
						'email'=>$fetch['email'],
						'address'=>$fetch['address'],
						'mobile'=>$fetch['mobile'],
						'fullname'=>$fetch['fullname'],
						);
				}else{
					echo "<script>alert('Tài khoản không hợp lệ')</script>";
				}
			}else{
				echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng')</script>";
			}
		}
	}

	public function getListCustomer()
	{
		$data=array();
		$sql="select * from khachhang";
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)>0)
		{
			while ($row=mysql_fetch_array($query)) {
				$data[]=$row;
			}
		}
		return $data;
	}

	public function selectCusById($cusid)
	{
		$data=array();
		$sql="select * from khachhang where cus_id=$cusid";
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)){
			$fetch=mysql_fetch_array($query);
			$data=$fetch;
		}
		return $data;
	}

	public function addCustomer($feild){
		if(is_array($feild)){
			$feild=(count($feild) ? "'".implode("','", $feild)."'" : "");
		}
		$sql='insert into khachhang(username,password,fullname,email,mobile,address,status) values ($feild,$status)';
		$que=mysql_query("insert into khachhang(username,password,fullname,email,mobile,address,status) values ($feild)");
		if($que){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_customer.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			// echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
		// return $sql;
	}

	public function updateCustomer($status,$cusid)
	{
		$que=mysql_query("update khachhang set status=$status where cus_id=$cusid");
		if($que){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_customer.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
	}

	public function updateKh($fullname,$email,$mobile,$address,$cusid)
	{
		$que=mysql_query("update khachhang set fullname='$fullname',email='$email',mobile='$mobile',address='$address' where cus_id=$cusid");
		if($que){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=account.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
	}

	public function updatePass($pass,$user)
	{
		$que=mysql_query("update khachhang set password='$pass' where username='$user'");
	}
}
?>