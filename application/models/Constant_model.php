<?php
/**
* 
*/
class Constant_model extends CI_Model
{
		
		// Insert Data from Any Table;
	public function insert_alltable($table_name,$data)
	{
		return $this->db->insert("$table_name", $data);
	}
		// Get Data from Any Table;
	public function get_alltable($table_name)
	{  
        $this->db->from($table_name);
        
		$query = $this->db->get();
		return $query->result();
	}
        // Get Data from Any Table order by dec;
    public function get_alltable_desc($table_name)
    {
        $this->db->from($table_name);
        
        $this->db->order_by("id", "desc");
        $query = $this->db->get(); 
        return $query->result();
    }
	 // Delete Data from Any Table;
    public function deleteData($table, $id)
    {
        $this->db->where('id', $id);
        $this->db->delete("$table");
        return true;
    }


     // Delete Data from Any Table;
    public function CustomDeleteData($table, $col_name ,$id)
    {
        $this->db->where($col_name, $id);
        $this->db->delete("$table");
        return true;
    }
    
    public function insertDataReturnLastId($table, $data)
    {
        $this->db->insert("$table", $data);
        return $this->db->insert_id();
    }
    
   

	public function getDataOneColumn($table, $col1_name, $col1_value)
    {
        $this->db->where("$col1_name", $col1_value);
        
        $this->db->order_by("id", "desc");
        $query = $this->db->get("$table");
        $result = $query->result();
        return $result;
    }

    
    public function updateData($table, $data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update("$table", $data);
        return true;
    }
    public function update_Custom_Data($table,$c_name, $id,$data)
    {
        $this->db->where($c_name, $id);
        $this->db->update("$table", $data);
        return true;
    }
    public function getOneCol($table,$col,$id)
    {
        $this->db->where("$col",$id);
        $this->db->limit('1');
        $this->db->order_by('id','desc');
        $query = $this->db->get("$table");    
        return $query->row();
    }
   

    public function get_users($value,$user_id)
    {
        $this->db->select('users.id');
        $this->db->from('users');
        if ($value == 'all') {
            $this->db->where('user_type !=','admin');
        }if($value == 'partner_admin'){
            $this->db->where('user_type','partner_admin');
        }if($value == 'my_teachers'){
            $this->db->join('teachers','teachers.u_id = users.id');
            $this->db->where('teachers.u_id',$user_id);
        }
        if($value == 'my_students'){
            $this->db->join('students','students.u_id = users.id');
            $this->db->where('students.u_id',$user_id);
        }
        $this->db->where('status','active');
        $this->db->where('users.deleted_at',NULL);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

   
   

   
    
}

?>