<?php


class Supplier extends CI_Controller {
    function __construct() {

        parent::__construct();
        if (empty($_SESSION['username'])) {
            return redirect(base_url().'auth');
        }
        $this->load->model('Admin_model');

    }

    public function add_supplier()
    {
      if ($this->session->userdata('userpermissions')[4]['add_status']=='') {
        redirect('Admin/dashboard');
      }
       $data = array(
        'title' => 'Add Supplier',
        'active_menu' => 'add_supplier',
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_supplier');
      $this->load->view('footer');
    }

    public function save_supplier()
    {// echo "<pre>"; print_r($_POST); die();
      if (!empty($_FILES)) {
          $img = img_upload($_FILES, 'app-assets/images/product_img/');
        }if(@$img['status'] == 'error') {
          $img = '404.png';
      }
      $data = array(
        'supplier_name' => $_POST['supplier_name'],
        'payment_method' => $_POST['payment_method'],
        'credit_days' => $_POST['credit_days'],
        'user_status' => $_POST['user_status'],
        'contact_person' => $_POST['contact_person'],
        'city' => $_POST['city'],
        'mobile_num' => $_POST['mobile_num'],
        'address' => $_POST['address'],
        'person_name' => $_POST['person_name'],
        'person_designation' => $_POST['person_designation'],
        'person_number' => $_POST['person_number'],
      );
      if (empty($_POST['user_id'])) {
        $this->session->set_flashdata(array('response' => 'success', 'msg' => "Successfully added supplier"));
        $res = $this->Constant_model->insert_alltable('suppliers',$data);
      }else{
        $this->session->set_flashdata(array('response' => 'success', 'msg' => "Successfully updated supplier"));
        $res = $this->Constant_model->updateData('suppliers',$data,'supplier_id',$_POST['user_id']);
      }
      redirect(base_url().'Supplier/view_supplier');
    }

    public function view_supplier($value='')
    {
      if ($this->session->userdata('userpermissions')[4]['view_status']=='') {
        redirect('Admin/dashboard');
      }
      $data = array(
        'title' => 'View Supplier',
        'active_menu' => 'view_supplier'
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('view_supplier');
      $this->load->view('footer');
    }


    public function getSupplier($value='')
    {
      $search_val = $this->input->post('search')['value'];
      if($search_val != "") {
        $result = $this->Admin_model->getSupplier($search_val, $status='');
      } else {
        $result = $this->Admin_model->getSupplier();
      }
        $data = array();
        $sno = 1;
        foreach ($result as $value) {
        if ($value->user_status == 'active') {
            $class = 'badge badge-success';
          }else{ $class = 'badge badge-danger';  };

          $sub_array = array();
          $sub_array[] = $sno; $buttons = "";
          $sub_array[] = $value->supplier_name;
          $sub_array[] = $value->payment_method;
          $sub_array[] = $value->credit_days;
          $sub_array[] = $value->contact_person;
          $sub_array[] = $value->city;
          $sub_array[] = $value->mobile_num;
          $sub_array[] = $value->address;
          $sub_array[] = $value->person_name;
          $sub_array[] = $value->person_designation;
          $sub_array[] = $value->person_number;
         // / $sub_array[] = get_date($value->created_at);
          $sub_array[] = '<span class="'.$class.'">'.$value->user_status.'</span>';

          $buttons = "<a href='".site_url('Supplier/edit_supplier/'.hashids_encrypt($value->supplier_id))."' class='btn small-btn'><i class='icon-pencil'></i> Edit </a>
         <a href='".site_url('Supplier/delete_supplier/'.hashids_encrypt(@$value->supplier_id))."' class='btn small-btn' onclick='return confirm(Are you sure you want to delete?)''><i class='icon-trash'></i> Delete </a>";
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

    public function edit_supplier($id)
    {
      if ($this->session->userdata('userpermissions')[4]['edit_status']=='') {
        redirect('Admin/dashboard');
      }
      $id = hashids_decrypt($id);
      $data = array(
        'title' => 'Edit Supplier',
        'active_menu' => 'add_supplier',
        'user_data' => $this->Constant_model->getOneCol('suppliers','supplier_id',$id)
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_supplier');
      $this->load->view('footer');
    }

    public function delete_supplier($id)
    {
      if ($this->session->userdata('userpermissions')[4]['delete_status']=='') {
        redirect('Admin/dashboard');
      }
      $id = hashids_decrypt($id);
      $res = $this->Constant_model->deleteData('suppliers','supplier_id',$id);
      $this->session->set_flashdata(array('response' => 'success', 'msg' => "Deleted Item successfully!"));
        return redirect(base_url().'Supplier/view_supplier');
    }

}

?>
