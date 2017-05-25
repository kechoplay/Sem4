<?php
/**
* 
*/
class Category
{
	
	function &getInstance()
	{
		static $instance;

		if (is_null($instance)) {
			$instance = new Category();
		}

		return $instance;
	}

	public function showListCate($where=null,$order=null)
	{
		$data=array();
		if(is_array($where)){
			$where= (count($where) ? ' where '.implode(' and ', $where) : '');
		}else{
			$where=$where;
		}
		if(is_null($order)){
			$order=" order by sort_order asc";
		}else{
			$order=$order;
		}
		$sql="select * from danhmuc".$where.$order;
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)>0){
			while($fetch=mysql_fetch_array($query)){
				$data[]=$fetch;
			}
		}
		return $data;
	}

	public function showListCateid($id)
	{
		$data=array();
		$sql="select * from danhmuc where cat_id=$id";
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)>0){
			$fetch=mysql_fetch_array($query);
			$data=$fetch;
		}
		return $data;
	}

	public function getCatByParent($catid)
	{
		$data=array();
		$sql="select * from danhmuc where parent_id=$catid and cat_status=1";
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)>0){
			while($fetch=mysql_fetch_array($query))
			$data[]=$fetch;
		}
		return $data;
	}

	public function addCategory($name,$parent,$sort_order,$status){

		$que=mysql_query("insert into danhmuc(cat_name,parent_id,sort_order,cat_status) values ('$name',$parent,$sort_order,$status)");
		if($que){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_category.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
	}

	public function updateCategory($catname,$parent,$sort_order,$status,$catid)
	{
		$que=mysql_query("update danhmuc set cat_name='$catname',parent_id=$parent,sort_order=$sort_order,cat_status=$status where cat_id=$catid");
		if($que){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_category.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
	}

	public function deleteCategory($catid)
	{
		
		$query=mysql_query("delete from danhmuc where cat_id=$catid");
		if($query){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_category.php\">";
			echo "<script>alert('Thành công')</script>";
		}
		else{
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo "<script>alert('That bại')</script>";
		}
		
	}
}
?>