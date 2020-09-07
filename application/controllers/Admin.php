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

    // Quotes Start

    public function add_quotes()
    {
      $data = array(
        'title' => 'Add Quotes',
        'active_menu' => 'add_quotes',
        'customerdata'=> $this->Constant_model->get_alltable('customers'),
        'propertiesdata'=> $this->Constant_model->get_alltable('properties'),
      );

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_quotes');
      $this->load->view('footer');
    }

    public function save_quotes()
    {
      $data = array(
        'customer_id' => $this->input->post('customer_id'),
        'property_id' => $this->input->post('property_id'),
        'total_amount' => $this->input->post('total_amount'),
        'payment_method' => $this->input->post('payment_method'),
        'notes' => $this->input->post('notes'),
      );
      $payment_date=$this->input->post('payment_date');
      $amount=$this->input->post('amount');
      $status=$this->input->post('status');

      // echo "<pre>";print_r($data); echo "<br>";

      $id = $this->Constant_model->insertDataReturnLastId('quotes',$data);
      $id=1;
         $more_arr=[];
         for($f=0;$f<count($payment_date);$f++){
           $more_arr[$f]=[
               'quote_id'=>$id,
               'payment_date' => $payment_date[$f],
               'amount' => $amount[$f],
               'status' => $status[$f],
           ];
         }
         // echo "<pre>";print_r($more_arr);exit;
         $this->Constant_model->insertMultiple($more_arr, 'payments');

         $msg = "Quote Added Successfully!";
      if (empty($_POST['quote_id'])) {
        $this->session->set_flashdata(array('response' => 'success', 'msg' => "Quote Added successfully!"));
      }else{
        $res = $this->Constant_model->updateData('quotes', $data,'quote_id',$_POST['quote_id']);
        $this->session->set_flashdata(array('response' => 'success', 'msg' => "Quote Added successfully!"));
      }

          return redirect(base_url().'admin/view_quotes');
    }

    public function edit_quotes($id)
    {
      $id = hashids_decrypt($id);
      $data = array(
        'title' => 'Edit Quotes',
        'active_menu' => 'edit_quotes',
        'customerdata'=> $this->Constant_model->get_alltable('customers'),
        'propertiesdata'=> $this->Constant_model->get_alltable('properties'),
        'quotes_data' => $this->Constant_model->getOneCol('quotes','quote_id',$id),
        "record_more" => $this->Constant_model->getRows2('payments','quote_id',$id),
      );

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_quotes');
      $this->load->view('footer');
    }

    public function view_quotes()
    {
      $data = array(
        'title' => 'View Quotes',
        'active_menu' => 'view_quotes',
      );

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('view_quotes');
      $this->load->view('footer');
    }
    public function getQuotes($value='')
    {
      $search_val = $this->input->post('search')['value'];
      if($search_val != "") {
        $result = $this->admin_model->getQuotes($search_val, $status='');
      } else {
        $result = $this->admin_model->getQuotes();
      }
        $data = array();
        $sno = 1;
        foreach ($result as $value) {
          $sub_array = array();
          $sub_array[] = $sno; $buttons = "";
          $sub_array[] = $value->first_name;
          $sub_array[] = $value->name;
          $sub_array[] = $value->total_amount;
          $sub_array[] = $value->payment_method;
          $sub_array[] = $value->notes;
         // / $sub_array[] = get_date($value->created_at);
          $buttons .= "<a href='javascript:void(0)' onclick='showViewModal(".$value->quote_id.")' class='btn small-btn'><i class='icon-eye'></i> View </a>";
          $buttons .= "<a href='".site_url('Admin/edit_quotes/'.hashids_encrypt($value->quote_id))."' class='btn small-btn'><i class='icon-pencil'></i> Edit </a>
         <a href='".site_url('Supplier/delete_supplier/'.hashids_encrypt(@$value->quote_id))."' class='btn small-btn' onclick='return confirm(Are you sure you want to delete?)''><i class='icon-trash'></i> Delete </a>";
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

    public function delete_quotes()
    {

    }

    public function view_details_popup($id) {
      $data = array(
        'title' => "Order details",
        "record" => $this->admin_model->get_quote_data($id),
      );
      $data=$this->load->view("quote_details_popup",$data,TRUE);

      // print_r($html);
      echo json_encode($data);


    }

    // Quotes End

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
        'role_data' => $this->Constant_model->get_alltable_desc('role_id','role'),
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
        'role_name' => $this->Constant_model->getOneCol('role','role_id',$id),
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
        $res = $this->Constant_model->deleteData('role','role_id',$id);
        if ($res) {
          $this->session->set_flashdata(array('response' => 'success', 'msg' => "Role deleted successfully!"));
          return redirect(base_url().'admin/view_role');
        }

      }

    // role Controller end

    public function add_users($value='')
    {
      if($this->session->userdata('user_type') != "admin") {
        // redirect('Items/inventory');
      }
      $data = array(
        'title' => 'Add Users',
        'active_menu' => 'add_users',
        'roles' => $this->Constant_model->get_alltable('role'),
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
        'user_role_id'=> $_POST['user_role_id'],
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
        $res = $this->Constant_model->updateData('users', $data,'id',$_POST['user_id']);
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
        // echo "<pre>";print_r($result);exit();
      }
        $data = array();
        $sno = 1;
        foreach ($result as $value) {

          $sub_array = array();
          $sub_array[] = $sno; $buttons = "";
          $sub_array[] = $value->first_name;
          $sub_array[] = $value->last_name;
          $sub_array[] = $value->email;
          $sub_array[] = $value->ph_num;
          $sub_array[] = $value->username;
          $sub_array[] = $value->role_name;
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
        // print_r($this->db->last_query());exit();
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
        'roles' => $this->Constant_model->get_alltable('role'),
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
