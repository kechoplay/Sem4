<?php

/**
* 
*/
class Slide
{
	
	function &getInstance()
	{
		static $instance;

		if (is_null($instance)) {
			$instance = new Slide();
		}

		return $instance;
	}

	public function showSlide($where=null,$order=null)
	{
		$data=array();
		if (is_array($where)) {
			$where=(count($where) ? ' where '.implode(' and ', $where) : '');
		}else{
			$where=$where;
		}

		if(is_null($order)){
			$order=" order by sli_id asc";
		}else{
			$order=$order;
		}
		$sql="select * from slide".$where.$order;
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)>0)
		{
			while ($fetch=mysql_fetch_array($query)) {
				$data[]=$fetch;
			}
		}
		return $data;
	}

	public function showSlideId($sliid)
	{
		$data=array();
		$sql="select * from slide where sli_id=$sliid";
		$query=mysql_query($sql);
		if($num_row=mysql_num_rows($query)>0)
		{
			$fetch=mysql_fetch_array($query);
			$data=$fetch;
			
		}
		return $data;
	}

	public function insertSLide($sliname,$sliimage,$slilink,$slistatus)
	{
		$sql="insert into slide(sli_name,sli_image,sli_link,sli_status) values('$sliname','$sliimage','$slilink',$slistatus)";
		$que=mysql_query($sql);
		if($que){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_slide.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			// echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
	}

	public function updateSlide($sliname,$sliimage,$slilink,$slistatus,$sliid)
	{
		$que=mysql_query("update slide set sli_name='$sliname',sli_image='$sliimage',sli_link='$slilink',sli_status=$slistatus where sli_id=$sliid");
		if($que){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_slide.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			// echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
	}

	public function deleteSlide($sliid)
	{
		$li=$this->showSlideId($sliid);
		$img=$li['sli_image'];
		$sql="delete from slide where sli_id=$sliid";
		if($query=mysql_query($sql)){
			echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_slide.php\">";
			echo '<script>alert("Thành công")</script>';
		}else{
			// echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo '<script>alert("Thất bại")</script>';
		}
	}
}

?>