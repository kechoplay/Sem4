<?php
include_once 'admin_product.php';
$set_lang=mysql_query("SET NAMES 'utf-8'");

/**
* 
*/
class Orders extends Product
{
	
	function &getInstance()
	{
		static $instance;

		if (is_null($instance)) {
			$instance = new Orders();
		}

		return $instance;
	}

	public function listOrder($where=null,$order=null)
	{
		$data=array();
		if (is_array($where)) {
			$where=(count($where) ? ' where ' . implode(' and ', $where) : '');
		}else{
			$where=$where;
		}
		if (is_null($order)) {
			$order=' order by ord_date desc';
		}else{
			$order=$order;
		}

		$sql='select * from hoadon'.$where.$order;
		$query=mysql_query($sql);
		if ($num_row=mysql_num_rows($query)>0) {
			while ($row=mysql_fetch_array($query)) {
				$data[]=$row;
			}
		}
		return $data;
	}

	public function listOrderDetail($where=null)
	{
		$data=array();
		if (is_array($where)) {
			$where=(count($where) ? implode(' and ', $where) : '');
		}else{
			$where=$where;
		}

		$sql='select * from hoadonchitiet a join hoadon b on a.ord_id=b.ord_id join sanpham c on a.pro_id=c.pro_id where'.$where;
		$query=mysql_query($sql);
		if ($num_row=mysql_num_rows($query)>0) {
			while($row=mysql_fetch_array($query))
				$data[]=$row;
		}
		return $data;
	}

	public function addOrder($feild=null,$cart=null)
	{
		if (is_array($feild)) {
			$feild=(count($feild) ? "'".implode("','", $feild)."'" : "");
		}
		$sql="insert into hoadon(cus_id,name,mobile,address,total,ord_payment) values ($feild)";
		$query=mysql_query($sql);
		$id=mysql_insert_id();
		if (is_array($cart)) {
			foreach ($cart as $key => $value) {
				$sql1="insert into hoadonchitiet(ord_id,pro_id,number,price) values(".$id.",".$value['id'].",".$value['sl'].",".$value['price'].")";
				mysql_query($sql1);
				$pro=parent::showListProById($value['id']);
				$quan=$pro[7];
				$countbuy=$pro[8];
				$sql2="update sanpham set pro_quantity=".($quan-$value['sl']).",pro_count_buy=".($value['sl']+$countbuy)." where pro_id=".$value['id'];
				mysql_query($sql2);
			}
			unset($_SESSION['cart']);
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			echo "<script>alert('Thanh toán thành công');</script>";
		}
		// return $sql;
	}

	public function updateOrder($status,$ordid)
	{
		$sql="update hoadon set ord_status=$status where ord_id=$ordid";
		$query=mysql_query($sql);
		
		echo "<meta http-equiv=\"refresh\" content=\"0,url=admin_order.php\">";
		
		// return $sql;
	}
}

?>