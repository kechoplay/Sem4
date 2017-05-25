<?php

/**
* 
*/
class User
{
	
	function &getInstance()
	{
		static $instance;

		if (is_null($instance)) {
			$instance = new Customer();
		}

		return $instance;
	}

	public function loginAdmin($username,$password)
	{
		$username = addslashes($username);
		$password = addslashes($password);


		if (!$username || !$password) {
			echo "<script>alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.')</script>";
		}
		$password = md5($password);
            // if($username=='admin'){
		$query = mysql_query("SELECT * FROM admin WHERE user='$username' and pass='$password'");
		$num_row=mysql_num_rows($query);
		$fetch=mysql_fetch_array($query);

		if($num_row>0){
			if($fetch['status']==1){
				$_SESSION['Name'] = $username;
				$_SESSION['Pass'] = $password;
				$_SESSION['id'] = $fetch['id'];
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$query=mysql_query("update admin set last_access='".date('Y-m-d H:i:s')."' where user='$username'");
				header('location:index.php');
			}else{
				echo "<script>alert('Tai khoan chua được kích hoạt')</script>";
			}
		}else{
			echo "<script>alert ('Tai khoan khong hop le')</script>";
		}        
	}

	public function getProfile($where=null)
	{
		if (is_array($where)) {
			$where=(count($where) ? ' where '.implode(' and ', $where) : '');
		}else{
			$where=$where;
		}
		$sql="select * from admin".$where;
		$query=mysql_query($sql);
		if ($num_row=mysql_num_rows($query)) {
			$row=mysql_fetch_array($query);
			$data=$row;
		}
		return $data;
	}

	public function listUser($where=null)
	{
		$data=array();
		if(is_array($where)){
			$where= (count($where) ? ' where '.implode(' and ', $where) : '');
		}else{
			$where=$where;
		}
		$sql="select * from admin".$where;
		$query=mysql_query($sql);
		if ($num_row=mysql_num_rows($query)) {
			while ($row=mysql_fetch_array($query)) {
				$data[]=$row;
			}
		}
		return $data;
	}

	public function updateAccount($name=null,$email=null,$new_pass=null,$id)
	{
		if(is_null($new_pass)){
			$sql="update admin set fullname='$name', email='$email' where id=$id";
		}
		else{
			$sql="update admin set fullname='$name', email='$email', pass='$new_pass' where id=$id";
		}
		$query=mysql_query($sql);
		if($query){
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Cập nhật thông tin thành công")</script>';
		}else{
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("That bai")</script>';
		}
	}

	public function addUser($user,$pass,$name,$email,$level,$status)
	{
		$sql="insert into admin(user,pass,fullname,email,level,status) values ('$user','$pass','$name','$email',$level,$status)";
		$query=mysql_query($sql);
		if($query){
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("That bai")</script>';
		}
	}

	public function updateUser($name,$email,$level,$status,$id)
	{
		$sql="update admin set fullname='$name', email='$email', level='$level', status='$status' where id=$id";
		$query=mysql_query($sql);
		if($query){
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Cập nhật thông tin thành công")</script>';
		}else{
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("That bai")</script>';
		}
	}

}
?>