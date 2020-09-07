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
      $id = hashids_decrypt($id);
      $res = $this->Constant_model->deleteData('properties',$id);
      $this->session->set_flashdata(array('response' => 'success', 'msg' => "Deleted Properties successfully!"));
        return redirect(base_url().'properties/view_properties');
    }

    //  stocks funcation
    public function add_stock($value='')
    {
      $data = array(
        'title' => 'Add Stock',
        'active_menu' => 'add_stock',
      );
      $data['warehouse_data'] = $this->Constant_model->get_alltable_desc('warehouse');
      $data['properties_data'] = $this->Constant_model->get_alltable_desc('properties');

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_stock');
      $this->load->view('footer');
    }

    public function save_stock($value='')
    {
      $properties_id = hashids_decrypt($_POST['properties_id']);

      if($this->session->userdata('user_type') == "admin") {
        $warehouse_id = $_POST['warehouse_id'];
      } else {
        $warehouse_id = $this->session->userdata('warehouse_id');
      }

      $data = array(
        'warehouse_id' => $warehouse_id,
        'added_by' => $_SESSION['user_id'],
        'Properties_id' => $Properties_id,
        'qty' => $_POST['qty'],
      );
      $this->Constant_model->insert_alltable('stock',$data);
      $this->Constant_model->insert_alltable('inventory',$data);
      $properties_data = $this->Constant_model->getOneCol('properties','id',$properties_id);
      $properties_qty = $properties_data->properties_qty+$_POST['qty'];
      $update_data = array('properties_qty' => $properties_qty);
      $this->Constant_model->updateData('properties',$update_data,$properties_id);
      return redirect(base_url().'properties/view_stock');
    }

    public function view_stock($value='')
    {
      $data = array(
        'title' => 'Stock History',
        'active_menu' => 'view_stock'
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('view_stock');
      $this->load->view('footer');
    }

    public function getStocks($value='')
    {
      $search_val = $this->input->post('search')['value'];
      if($search_val != "") {
        $result = $this->admin_model->getStocks($search_val, $status='');
      } else {
        $result = $this->admin_model->getStocks();
      }
        $data = array();
        $sno = 1;
        foreach ($result as $value) {


          $sub_array = array();
          $sub_array[] = $sno; $buttons = "";

          $sub_array[] = $value->warehouse_name;
          $sub_array[] = $value->itam_name;
          $sub_array[] = $value->qty;
          $sub_array[] = $value->first_name.' '.$value->last_name;
          $sub_array[] = get_date($value->created_at);


          $buttons = "<a href='".site_url('properties/delete_stock/'.hashids_encrypt(@$value->id))."' class='btn small-btn' onclick='return confirm(Are you sure you want to delete?)''><i class='icon-trash'></i> Delete </a>";
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

    public function delete_stock($id)
    {
      $id = hashids_decrypt($id);

      $stock_data = $this->Constant_model->getOneCol('stock','id',$id);
      $properties_data = $this->Constant_model->getOneCol('properties','id',$stock_data->properties_id); $update_qty = $properties_data->properties_qty - $stock_data->qty;
      $update_properties_qty = array('properties_qty' => $update_qty); print_r($update_properties_qty);

      $this->Constant_model->updateData('properties',$update_properties_qty,$properties_data->id);

      $res = $this->Constant_model->deleteData('stock',$id);
      $this->session->set_flashdata(array('response' => 'success', 'msg' => "Deleted Stock successfully!"));
        return redirect(base_url().'properties/view_stock');
    }

    // stocks funcation end


}

?>
