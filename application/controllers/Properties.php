<?php


class Properties extends CI_Controller {
    function __construct() {

        parent::__construct();
        if (empty($_SESSION['username'])) {
            return redirect(base_url().'auth');
        }
        $this->load->model('admin_model');

    }

    public function add_properties()
    {
      if ($this->session->userdata('userpermissions')[3]['add_status']=='') {
        redirect('Admin/dashboard');
      }
      $data = array(
        'title' => 'Add Properties',
        'active_menu' => 'add_properties'
      );

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_properties');
      $this->load->view('footer');
    }

    public function save_properties()
    {

      if($this->session->userdata('user_type') == "admin") {
        $item_id = $this->input->post('item_id');
      } else {
        $item_id =  $this->input->post('item_id');
      }

      $data = array(
        'name' => $this->input->post('name'),
        'lot_size' => $this->input->post('lot_size'),
        'amountpersquaremeter' => $this->input->post('amountpersquaremeter'),
        'cost' => $this->input->post('cost'),
        'sku' => $this->input->post('sku'),
        'payment_terms' => $this->input->post('payment_term'),
      );

      if (empty($this->input->post('item_id'))) {
        $this->session->set_flashdata(array('response' => 'success', 'msg' => "Successfully added properties"));
        $res = $this->Constant_model->insert_alltable('properties',$data);
      }else{
        $this->session->set_flashdata(array('response' => 'success', 'msg' => "Successfully updated properties"));
        $res = $this->Constant_model->updateData('properties',$data,'id',$item_id);
      }
      redirect(base_url().'properties/view_properties');
    }

    public function view_properties($value='')
    {
      if ($this->session->userdata('userpermissions')[3]['view_status']=='') {
        redirect('Admin/dashboard');
      }
      $data = array(
        'title' => 'View Properties',
        'active_menu' => 'view_properties'
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('view_properties');
      $this->load->view('footer');
    }


    public function getProperties($value='')
    {
      $search_val = $this->input->post('search')['value'];
      if($search_val != "") {
        $result = $this->Admin_model->getProperties($search_val, $status='');
      } else {
        $result = $this->Constant_model->get_alltable_desc('id','properties');
      }
        $data = array();
        $sno = 1;
        foreach ($result as $value) {


          $sub_array = array();
          $sub_array[] = $sno; $buttons = "";

          $sub_array[] = $value->name;
          $sub_array[] = $value->lot_size;
          $sub_array[] = $value->amountpersquaremeter;
          $sub_array[] = $value->cost;
          $sub_array[] = $value->sku;
          $sub_array[] = $value->payment_terms;


          $buttons = "<a href='".site_url('properties/edit_properties/'.hashids_encrypt($value->id))."' class='btn small-btn'><i class='icon-pencil'></i> Edit </a>
         <a href='".site_url('properties/delete_properties/'.hashids_encrypt(@$value->id))."' class='btn small-btn' onclick='return confirm(Are you sure you want to delete?)''><i class='icon-trash'></i> Delete </a>";
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

    public function edit_properties($id)
    {
      if ($this->session->userdata('userpermissions')[3]['edit_status']=='') {
        redirect('Admin/dashboard');
      }
      $id = hashids_decrypt($id);
       $data = array(
        'title' => 'Edit Properties',
        'active_menu' => 'add_properties',
        'form_data' => $this->Constant_model->getOneCol('properties','id',$id),
      );

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_properties');
      $this->load->view('footer');
    }

    public function delete_properties($id)
    {
      if ($this->session->userdata('userpermissions')[3]['delete_status']=='') {
        redirect('Admin/dashboard');
      }
      $id = hashids_decrypt($id);
      $res = $this->Constant_model->deleteData('properties',$id);
      $this->session->set_flashdata(array('response' => 'success', 'msg' => "Deleted Properties successfully!"));
        return redirect(base_url().'properties/view_properties');
    }

    //  stocks funcation

  

    // stocks funcation end


}

?>
