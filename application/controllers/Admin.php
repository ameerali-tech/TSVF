<?php


class Admin extends CI_Controller {
    function __construct() {

        parent::__construct();
        if (empty($_SESSION['username'])) {
            return redirect(base_url().'auth');
        }
        $this->load->model('admin_model');

    }

    public function dashboard()
    {
      if($this->session->userdata('user_type') != "admin") {
        redirect('Items/inventory');
      }

      $data = array(
        'title' => 'Dashboard',
        'active_menu' => 'dashboard',
      );

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('dashboard');
      $this->load->view('footer');
    }

    // role Controller
    public function add_role()
    {
      $data = array(
        'title' => 'Add Role',
        'active_menu' => 'add_role',
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_role');
      $this->load->view('footer');
    }

    public function save_role()
    { //echo "<pre>";
      // print_r($_POST); die();
      $i=0;
      $role_data = array('role_name' => $_POST['role_name']);
      $id = $this->Constant_model->insertDataReturnLastId('role', $role_data);
      foreach ($_POST as $key => $value) {
        if ($key != 'warehouse_id' && $key != 'role_name' && $key != 'key_name') {
            $data = array(
              'role_id' => $id,
            );
          $role_permission = array_merge($data,$value);

          $this->Constant_model->insert_alltable('role_permission',$role_permission);
        }
      }
      $this->session->set_flashdata(array('response' => 'success', 'msg' => "Add Role successfully!"));
      return redirect(base_url().'admin/view_role');

    }

    public function view_role($value='')
    {
      $data = array(
        'title' => 'Role List',
        'active_menu' => 'view_role',
        'role_data' => $this->Constant_model->get_alltable_desc('role'),
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('view_role');
      $this->load->view('footer');
    }

    public function edit_role($id)
    {
      $id = hashids_decrypt($id);
      $data = array(
        'title' => 'Edit Role',
        'active_menu' => 'add_role',
        'role_data' => $this->Constant_model->getDataOneColumn('role_permission','role_id',$id),
        'role_name' => $this->Constant_model->getOneCol('role','id',$id),
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('edit_role');
      $this->load->view('footer');
    }

    public function update_role()
    {// echo "<pre>";
      $id = hashids_decrypt($_POST['role_id']);
      $this->Constant_model->CustomDeleteData('role_permission','role_id',$id);
      $role_data = array('role_name' => $_POST['role_name']);
      $this->Constant_model->updateData('role', $role_data, $id);
      foreach ($_POST as $key => $value) {
        if ($key != 'role_id' && $key != 'role_name') {
          $data = array(
            'role_id' => $id,
          ); //print_r($value);
          $role_permission = array_merge($data,$value);
          $this->Constant_model->insert_alltable('role_permission',$role_permission);
        }
      }
      $this->session->set_flashdata(array('response' => 'success', 'msg' => "Updated Role successfully!"));
      return redirect(base_url().'admin/view_role');

    }

      public function delete_role($id)
      {
        $id = hashids_decrypt($id);
        $this->Constant_model->CustomDeleteData('role_permission','role_id',$id);
        $res = $this->Constant_model->deleteData('role',$id);
        if ($res) {
          $this->session->set_flashdata(array('response' => 'success', 'msg' => "Role deleted successfully!"));
          return redirect(base_url().'admin/view_role');
        }

      }

    // role Controller end

    public function add_users($value='')
    {
      if($this->session->userdata('user_type') != "admin") {
        redirect('Items/inventory');
      }
      $data = array(
        'title' => 'Add Users',
        'active_menu' => 'add_users',
        'warehouse_data' => $this->Constant_model->get_alltable_desc('warehouse'),
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_users');
      $this->load->view('footer');
    }

    public function save_user()
    {
      $data = array(
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'ph_num' => $_POST['ph_num'],
        'username' => $_POST['username'],
        'password' => $this->encryption->encrypt($_POST['password']),
        'user_type' => 'employee',
      );
      if (empty($_POST['user_id'])) {
        $res = $this->Constant_model->insert_alltable('users',$data);
        $this->session->set_flashdata(array('response' => 'success', 'msg' => "Users Added successfully!"));
      }else{
        $res = $this->Constant_model->updateData('users', $data, $_POST['user_id']);
        $this->session->set_flashdata(array('response' => 'success', 'msg' => "Users Added successfully!"));
      }

          return redirect(base_url().'admin/view_users');

    }

    public function view_users()
    {
      if($this->session->userdata('user_type') != "admin") {
        redirect('Properties/inventory');
      }
      $data = array(
        'title' => 'View Users',
        'active_menu' => 'view_user'
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('view_users');
      $this->load->view('footer');
      $this->admin_model->get_Users();
    }

    public function getUsers()
    {
      $search_val = $this->input->post('search')['value'];
      if($search_val != "") {
        $result = $this->admin_model->uers_search($search_val, $status='');
      } else {
        $result = $this->admin_model->get_Users();
      }
        $data = array();
        $sno = 1;
        foreach ($result as $value) {

          $sub_array = array();
          $sub_array[] = $sno; $buttons = "";

          $sub_array[] = $value->first_name;
          $sub_array[] = $value->last_name;
          $sub_array[] = $value->email;
          $sub_array[] = $value->username;
          $sub_array[] = $value->ph_num;
          $sub_array[] = $value->user_type;


          $buttons = "<a href='".site_url('admin/edit_users/'.hashids_encrypt($value->id))."' class='btn small-btn'><i class='icon-pencil'></i> Edit </a>
         <a href='".site_url('admin/delete_user/'.hashids_encrypt(@$value->id))."' class='btn small-btn' onclick='return confirm(Are you sure you want to delete?)''><i class='icon-trash'></i> Delete </a>";
          $sub_array[] = $buttons;
          $data[] = $sub_array;
          $sno++;
        }
        $output = array(
         'draw'    => @intval($this->input->post['draw']),
         'recordsTotal'  => count($result),
         'recordsFiltered' => count($result),
         'data'    => $data
        );
        echo json_encode($output);
    }

    public function edit_users($id)
    {
      if($this->session->userdata('user_type') != "admin") {
        redirect('Items/inventory');
      }
      $id = hashids_decrypt($id);
      $data = array(
        'title' => 'Edit Users',
        'active_menu' => 'add_users',
        'user_data' => $this->Constant_model->getOneCol('users','id',$id),
        'warehouse_data' => $this->Constant_model->get_alltable_desc('warehouse'),
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_users');
      $this->load->view('footer');
    }
    public function delete_user($id)
    {
      $id = hashids_decrypt($id);
        $res = $this->Constant_model->deleteData('users',$id);
        if ($res) {
          $this->session->set_flashdata(array('response' => 'success', 'msg' => "User deleted successfully!"));
          return redirect(base_url().'admin/view_users');
        }
    }
}

?>
