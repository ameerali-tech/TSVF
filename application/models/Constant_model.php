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
    
    public function Check_enrolled_courses($student_id,$course_id)
	{
		$this->db->select('*');
		$this->db->from('enrolled_courses');
		$this->db->where('student_id',$student_id);
        $this->db->where('course_id',$course_id);
		$result = $this->db->get();
		return $result->num_rows();
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
    public function count_row($table,$user_type,$belong_by='')
    {
          // $q = $this->db->count_all_results($value);
        if ($user_type == 'partner_admin') {
            $this->db->where('belong_by',$belong_by);
        }
        if ($user_type == 'teacher') {
            $this->db->where('belong_by',$belong_by);
        }
        
        $this->db->from($table);
        $q = $this->db->count_all_results(); 
        return $q;
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

    public function get_users_noti($user_id)
    {
        $this->db->select('news_feed.*');
        $this->db->from('news_feed');
        $this->db->join('news_feed_noti','news_feed_noti.feed_id = news_feed.id');
        $this->db->where('news_feed.deleted_at',NULL);
        $this->db->where('news_feed_noti.user_id',$user_id);
        $this->db->order_by("news_feed.id", "DESC");
        $this->db->limit('4');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function get_total_noti($user_id)
    {
        $this->db->select('news_feed.*');
        $this->db->from('news_feed');
        $this->db->join('news_feed_noti','news_feed_noti.feed_id = news_feed.id');
        $this->db->where('news_feed.deleted_at',NULL);
        $this->db->where('news_feed_noti.user_id',$user_id);
        $this->db->order_by("news_feed.id", "DESC");
        $q = $this->db->count_all_results(); 
        return $q;
    }

    public function get_exam_questions($exam_id,$tab_num)
    {
        $this->db->select('exams_questions.*');
        $this->db->from('exams_questions');
        $this->db->where('tab_num',$tab_num);
        $this->db->where('exam_id',$exam_id);
       // $this->db->order_by("exams_questions.id", "DESC");
        $this->db->where('exams_questions.deleted_at',NULL);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
}

?>