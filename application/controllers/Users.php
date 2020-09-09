<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
  function __construct() {

      parent::__construct();
      if (empty($_SESSION['username'])) {
          return redirect(base_url().'auth');
      }
      $this->load->model('admin_model');
      $this->load->model('Constant_model');
      $this->load->model('Users_model');
  }

  public function add_customers() {
    if ($this->session->userdata('userpermissions')[2]['add_status']=='') {
      redirect('Admin/dashboard');
    }
    $data = array(
      'title' => 'Add Customers',
      'active_menu' => 'add_customers',
    );
    $this->load->view('header',$data);
    $this->load->view('sidebar');
    $this->load->view('add_customers');
    $this->load->view('footer');
  }

  public function save_customers() {

    $data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'phone_number' => $this->input->post('phone_number'),
      'email' => $this->input->post('email'),
      'address' => $this->input->post('address'),
      'customer_status' => $this->input->post('customer_status'),
    );
    if (empty($_POST['user_id'])) {
      $this->session->set_flashdata(array('response' => 'success', 'msg' => "Successfully added Customer"));
      $res = $this->Constant_model->insert_alltable('customers',$data);
    }else{
      $this->session->set_flashdata(array('response' => 'success', 'msg' => "Successfully updated Customer"));
      $res = $this->Constant_model->updateData('customers',$data,'customer_id',$_POST['user_id']);
    }
    redirect(base_url().'Users/view_customers');
  }

  public function view_customers($value='') {
    if ($this->session->userdata('userpermissions')[2]['view_status']=='') {
      redirect('Admin/dashboard');
    }
    $data = array(
      'title' => 'View Customer',
      'active_menu' => 'view_customers'
    );
    $this->load->view('header',$data);
    $this->load->view('sidebar');
    $this->load->view('view_customers');
    $this->load->view('footer');
  }

  public function getCustomers($value='')
  {
    $search_val = $this->input->post('search')['value'];
    if($search_val != "") {
      $result = $this->Users_model->getCustomers($search_val, $status='');
    } else {
      $result = $this->Users_model->getCustomers();
    }
      $data = array();
      $sno = 1;
      foreach ($result as $value) {
      if ($value->customer_status == 'active') {
          $class = 'badge badge-success';
        }else{ $class = 'badge badge-danger';  };

        $sub_array = array();
        $sub_array[] = $sno; $buttons = "";
        $sub_array[] = $value->first_name;
        $sub_array[] = $value->last_name;
        $sub_array[] = $value->phone_number;
        $sub_array[] = $value->email;
        $sub_array[] = $value->address;
       // / $sub_array[] = get_date($value->created_at);
        $sub_array[] = '<span class="'.$class.'">'.$value->customer_status.'</span>';

        $buttons = "<a href='".site_url('Users/edit_customers/'.hashids_encrypt($value->customer_id))."' class='btn small-btn'><i class='icon-pencil'></i> Edit </a>
       <a href='".site_url('Users/delete_customer/'.hashids_encrypt(@$value->customer_id))."' class='btn small-btn' onclick='return confirm(Are you sure you want to delete?)''><i class='icon-trash'></i> Delete </a>";
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

  public function edit_customers($id)
  {
    if ($this->session->userdata('userpermissions')[2]['edit_status']=='') {
      redirect('Admin/dashboard');
    }
    $id = hashids_decrypt($id);
    $data = array(
      'title' => 'Edit Customers',
      'active_menu' => 'add_customers',
      'user_data' => $this->Constant_model->getOneCol('customers','customer_id',$id)
    );
    $this->load->view('header',$data);
    $this->load->view('sidebar');
    $this->load->view('add_customers');
    $this->load->view('footer');
  }

  public function delete_supplier($id)
  {
    if ($this->session->userdata('userpermissions')[2]['delete_status']=='') {
      redirect('Admin/dashboard');
    }
    $id = hashids_decrypt($id);
    $res = $this->Constant_model->deleteData('customers','customer_id',$id);
    $this->session->set_flashdata(array('response' => 'success', 'msg' => "Deleted Customer successfully!"));
      return redirect(base_url().'Users/view_customers');
  }

}
