<?php

class Users_model extends CI_Model
{
	public function getCustomers($search_val='', $status='')
	{
		$this->db->select('*');
		 $this->db->from('customers');

		 if (!empty($search_val)) {
			 $this->db->or_like('customer_id', $search_val);
			 $this->db->or_like('first_name', $search_val);
			 $this->db->or_like('last_name', $search_val);
			 $this->db->or_like('phone_number', $search_val);
			 $this->db->or_like('email', $search_val);
			 $this->db->or_like('address', $search_val);
		 }
		 $this->db->order_by("customer_id", "DESC");

		 $query = $this->db->get();
			 $result = $query->result();
			 return $result;
	}
}
