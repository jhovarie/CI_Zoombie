<?php

class Model_products extends CI_Model {

	function __construct() {
		parent::__construct();
	}


	function getall_products(){
		//$query = $this->db->query('SELECT * FROM products');
		//$this->db->where('id !=',4);
		//$this->db->where('id =',4);
		//$this->db->order_by('id', 'DESC');
		//$this->db->order_by('id', 'ASC');
		//$this->db->like('productname', 'o');
		//$this->db->limit(3);
		//$this->db->limit(2,0); //param limit, startindex
		$query = $this->db->get('products');
		return $query->result(); 
	}

	function search_products_pg($keyword,$perpage,$pageindex) {
		$this->db->like('product', $keyword);
		$this->db->limit($perpage,$pageindex); //param limit, startindex
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('products');
		return $query->result(); 
	} 
	function search_products_pg2($keyword) {
		$this->db->like('product', $keyword);
		//$this->db->limit($perpage,$pageindex); //param limit, startindex
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('products');
		return $query->result(); 
	} 

	function getproductwhereid($id) {
		$query = $this->db->query('SELECT * FROM products where id='.$id);
		return $query->row_array();
	}

	function update_products($order) {
		$this->db->where('id = ',$order['id']);
		$this->db->update('products', $order);
		//$this->db->update('products', $order, "id = ".$order['id']);
	}

	function insert_products($order) {//the products array gets
		$sql = $this->db->insert_string('products', $order);
		$query = $this->db->query($sql);
		if($query === TRUE) {
			return TRUE;
		} else {
			$last_query = $this->db->last_query();
			return $last_query;
		}
	}

	function delete_product($id) {
		$this->db->delete('products', array('id' => $id));
	}

	function search_products($keyword) {
		$this->db->like('product', $keyword);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('products');
		return $query->result(); 
	} 

}

?>