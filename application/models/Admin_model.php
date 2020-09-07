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

  //  Stocks query

  public function getStocks($search_val='', $status='')
   {
      $this->db->select('stock.*,items.name as itam_name,warehouse.warehouse_name, users.first_name,users.last_name');
      $this->db->from('stock');
      $this->db->join('items','stock.item_id = items.id');
      $this->db->join('users','users.id = stock.added_by');
      $this->db->join('warehouse','warehouse.id = stock.warehouse_id');

      if (!empty($search_val)) {
        $this->db->or_like('warehouse.warehouse_name', $search_val);
        $this->db->or_like('items.name', $search_val);
      }
      $this->db->order_by("items.id", "DESC");

      $query = $this->db->get();
        $result = $query->result();
        return $result;
   }


   public function getBillData($search_val='', $status='')
   {
      $this->db->select('purchase_bills.*,warehouse.warehouse_name');
      $this->db->from('purchase_bills');
      $this->db->join('warehouse','warehouse.id = purchase_bills.warehouse_id');

      if (!empty($search_val)) {
        $this->db->or_like('warehouse.warehouse_name', $search_val);
        $this->db->or_like('items.name', $search_val);
      }
      $this->db->order_by("purchase_bills.id", "DESC");

      $query = $this->db->get();
        $result = $query->result();
        return $result;
   }

   public function getBillInfo($id)
   {
     $this->db->select('purchase_bills_items.*,items.name as item_name');
      $this->db->from('purchase_bills_items');
      $this->db->join('items','items.id = purchase_bills_items.item_id');
      $this->db->where('purchase_bills_items.bill_id',$id);

      $query = $this->db->get();
        $result = $query->result();
        return $result;
   }

   public function getSupplier($search_val='', $status='')
   {
     $this->db->select('*');
      $this->db->from('suppliers');

      if (!empty($search_val)) {
        $this->db->or_like('supplier_id', $search_val);
        $this->db->or_like('supplier_name', $search_val);
        $this->db->or_like('payment_method', $search_val);
        $this->db->or_like('credit_days', $search_val);
        $this->db->or_like('user_status', $search_val);
        $this->db->or_like('contact_person', $search_val);
        $this->db->or_like('city', $search_val);
        $this->db->or_like('mobile_num', $search_val);
        $this->db->or_like('address', $search_val);
        $this->db->or_like('person_name', $search_val);
        $this->db->or_like('person_designation', $search_val);
        $this->db->or_like('person_number', $search_val);
      }
      $this->db->order_by("supplier_id", "DESC");

      $query = $this->db->get();
        $result = $query->result();
        return $result;
   }
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
