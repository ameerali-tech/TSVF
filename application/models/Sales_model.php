<?php

class Sales_model extends CI_Model
{

	function get_Items()
  {

    $this->db->select('*');
    $this->db->from('items');
    $this->db->where('items.warehouse_id', $_SESSION['warehouse_id']);
    $this->db->where('items.item_qty >','0');
		return $this->db->get()->result();

	}

  function add_sale($arr)
  {
      $this->db->insert('sales',$arr);
      return $this->db->insert_id();

  }

  function get_item($arr)
  {
    $this->db->where('id',$arr['item_id']);
    return $this->db->get('items')->row();
  }

  function update_qty($arr1,$arr)
  {
    $this->db->where('item_id',$arr['item_id']);
    $this->db->update('inventory',[
			'qty' => $arr1['item_qty']
		]);

    $this->db->where('id',$arr['item_id']);
    return $this->db->update('items',$arr1);
  }

  function getAllItems()
  {
    $this->db->select('*');
    $this->db->from('items');
    return $this->db->get()->result();
  }

  function getReport($arr)
  {
    $this->db->select('*');
    $this->db->from('items i');
    $this->db->join('sales s','s.item_id=i.id');
    if (!empty($arr['item_id']) && $arr['item_id']!='all') {

      $this->db->where('s.item_id',$arr['item_id']);

    }
    $this->db->where('DATE_FORMAT(s.sale_date,"%Y-%m-%d")>=',$arr['from_date']);
    $this->db->where('DATE_FORMAT(s.sale_date,"%Y-%m-%d")<=',$arr['to_date']);
    return $this->db->get()->result();

  }

}
