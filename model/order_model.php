<?php

include_once '../commons/dbconnection.php';
$dbconnection= new dbConnection();

class order{
    
     public function getAllOrders($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM orders WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM orders ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
        public function getOrdersItem($order_id = null)
	{
		if(!$order_id) {
			return false;
		}

		$sql = "SELECT * FROM orders_product WHERE order_id = ?";
		$query = $this->db->query($sql, array($order_id));
		return $query->result_array();
	}
          public function countOrderItem($order_id)
	{
		if($order_id) {
			$sql = "SELECT * FROM orders_product WHERE order_id = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}
        public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('orders');

			$this->db->where('order_id', $id);
			$delete_item = $this->db->delete('orders_item');
			return ($delete == true && $delete_item) ? true : false;
		}
	}
        public function countTotalPaidOrders()
	{
		$sql = "SELECT * FROM order WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
 
    
    
    
    
}