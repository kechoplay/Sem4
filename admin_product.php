<?php
/**
* 
*/
class Product
{
	
	function &getInstance()
	{
		static $instance;

		if (is_null($instance)) {
			$instance = new Product();
		}

		return $instance;
	}

	public function listProduct($where=null,$order=null,$start=null,$limit=null)
	{
		$data=array();
		if(is_array($where)){
			$where= (count($where) ? ' where '.implode(' and ', $where) : '');
		}else{
			$where=$where;
		}

		if(is_null($order)){
			$order=' order by pro_name asc';
		}else{
			$order=$order;
		}

		if(is_numeric($start) && is_numeric($limit)){
			$slimit=' limit '.$start.','.$limit;
		}else{
			$slimit="";
		}

		$sql='select * from sanpham a join danhmuc b on a.cat_id=b.cat_id'.$where.$order.$slimit;
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)>0){
			while($fetch=mysql_fetch_array($query)){
				$data[]=$fetch;
			}
		}
		return $data;
	}

	public function randomRow($where=null)
	{
		$data=array();
		$sql='select * from sanpham a join danhmuc b on a.cat_id=b.cat_id'.$where.' order by RAND() limit 2';
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)>0){
			while($fetch=mysql_fetch_array($query)){
				$data[]=$fetch;
			}
		}
		return $data;
	}

	public function showListProById($proid){
		$data=array();
		$sql="select * from sanpham where pro_id=$proid";
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)>0){
			$fetch=mysql_fetch_array($query);
			$data=$fetch;
			
		}
		return $data;
	}

	public function showListCart($catid){
		$data=array();
		if(is_array($catid)){
			$id=implode(',', $catid);
			$sql="SELECT * FROM sanpham WHERE pro_id IN ($id) ORDER BY pro_id ASC";
			$query=mysql_query($sql);
			while($fetch=mysql_fetch_array($query)){
				$data[]=$fetch;
			}
		}
		
		return $data;
	}

	public function search($where=null)
	{
		$data=array();
		if(is_array($where)){
			$wheres=(count($where) ? ' where ' .implode(' and ', $where) : '');
		}else{
			$wheres=$where;
		}
		
		$sql="select * from sanpham a join danhmuc b on a.cat_id=b.cat_id".$wheres." order by pro_name asc";
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)>0){
			while($fetch=mysql_fetch_array($query)){
				$data[]=$fetch;
				// echo "<pre>";
				// print_r($data);
			}
		}else{
			echo "<script>alert(\"khong tim duoc ket qua tuong ung\")</script>";
		}
		return $data;
	}

	public function addProduct($set=null){
		if(is_array($set)){
			$set=(count($set) ? implode('', $set) : '');
		}else{
			$set=$set;
		}
		$que=mysql_query("insert into sanpham ".$set);
		if($que){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_product.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			// echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
	}

	public function updateProduct($set=null,$proid)
	{
		if(is_array($set)){
			$set=(count($set) ? implode('', $set) : '');
		}else{
			$set=$set;
		}
		$que=mysql_query("update sanpham set ".$set." where pro_id=$proid");
		if($que){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_product.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			// echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
	}

	public function updateProductBest($proid)
	{
		$fetch=$this->showListProById($proid);
		$view=$fetch[8]+1;
		$que=mysql_query("update sanpham set pro_view=$view where pro_id=$proid");
	}

	public function deleteProduct($proid)
	{
		$query=mysql_query("delete from sanpham where pro_id=$proid");
		if($query){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_product.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
		// echo $query;
	}
}
?>