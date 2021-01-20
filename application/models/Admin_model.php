<?php

/**
 *
 */
class Admin_model extends CI_Model
{

  // users query start
  public function get_Users()
  {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->join('role','users.user_role_id=role.role_id','LEFT');
      $this->db->where('users.user_type !=' ,'admin');
      $this->db->order_by("users.id", "DESC");


      $query = $this->db->get();
      $result = $query->result();
      return $result;
  }

  public function uers_search($search_val, $status)
  {
    $this->db->select('*');
      $this->db->from('users');


      $this->db->or_like('first_name', $search_val);
      $this->db->or_like('last_name', $search_val);
      $this->db->or_like('users.email', $search_val);
      $this->db->or_like('username', $search_val);
      $this->db->where('users.user_type !=' ,'admin');
      $this->db->order_by("users.id", "DESC");

      $query = $this->db->get();
        $result = $query->result();
        return $result;
  }
  // users query end

  

  
   public function getQuotes($search_val='', $status='')
   {
     $this->db->select('*');
      $this->db->from('quotes q');
      $this->db->join('customers c','q.customer_id=c.customer_id');
      $this->db->join('properties p','p.id=q.property_id');

      if (!empty($search_val)) {
        $this->db->or_like('quote_id', $search_val);
        $this->db->or_like('first_name', $search_val);
        $this->db->or_like('name', $search_val);
        $this->db->or_like('total_amount', $search_val);
        $this->db->or_like('payment_method', $search_val);
        $this->db->or_like('notes', $search_val);
      }
      $this->db->order_by("quote_id", "DESC");

      $query = $this->db->get();
        $result = $query->result();
        return $result;
   }

   public function get_quote_data($id)
   {
      $this->db->select('*');
      $this->db->from('quotes q');
      $this->db->join('customers c','q.customer_id=c.customer_id');
      $this->db->join('properties p','p.id=q.property_id');
      $this->db->where('q.quote_id',$id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
   }

  

}
