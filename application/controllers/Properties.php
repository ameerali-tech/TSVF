<?php


class Properties extends CI_Controller {
    function __construct() {

        parent::__construct();
        if (empty($_SESSION['username'])) {
            return redirect(base_url().'auth');
        }
        $this->load->model('admin_model');

    }

    public function add_item()
    {
      $data = array(
        'title' => 'Add Item',
        'active_menu' => 'add_item',
        'warehouses' => $this->Constant_model->get_alltable_desc('warehouse'),
      );

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_item');
      $this->load->view('footer');
    }

    public function save_item()
    {

      if($this->session->userdata('user_type') == "admin") {
        $warehouse_id = $_POST['warehouse_id'];
      } else {
        $warehouse_id = $this->session->userdata('warehouse_id');
      }

      $data = array(
        'name' => $_POST['name'],
        'size' => $_POST['size'],
        'color' => $_POST['color'],
        'weight' => $_POST['weight'],
        'warehouse_id' => $warehouse_id,
        'notes' => $_POST['notes'],
      );

      if (empty($_POST['item_id'])) {
        $this->session->set_flashdata(array('response' => 'success', 'msg' => "Successfully added item"));
        $res = $this->Constant_model->insert_alltable('items',$data);
      }else{
        $this->session->set_flashdata(array('response' => 'success', 'msg' => "Successfully updated item"));
        $res = $this->Constant_model->updateData('items',$data,$_POST['item_id']);
      }
      redirect(base_url().'items/view_item');
    }

    public function view_item($value='')
    {
      $data = array(
        'title' => 'View Items',
        'active_menu' => 'view_item'
      );
      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('view_item');
      $this->load->view('footer');
    }


    public function getItems($value='')
    {
      $search_val = $this->input->post('search')['value'];
      if($search_val != "") {
        $result = $this->admin_model->getItems($search_val, $status='');
      } else {
        $result = $this->Constant_model->get_alltable_desc('items');
      }
        $data = array();
        $sno = 1;
        foreach ($result as $value) {


          $sub_array = array();
          $sub_array[] = $sno; $buttons = "";

          $sub_array[] = $value->name;
          $sub_array[] = $value->size;
          $sub_array[] = $value->color;
          $sub_array[] = $value->weight;
          $sub_array[] = $value->item_qty;
          $sub_array[] = get_date($value->created_at);
          $sub_array[] = $value->notes;


          $buttons = "<a href='".site_url('items/edit_item/'.hashids_encrypt($value->id))."' class='btn small-btn'><i class='icon-pencil'></i> Edit </a>
         <a href='".site_url('items/delete_item/'.hashids_encrypt(@$value->id))."' class='btn small-btn' onclick='return confirm(Are you sure you want to delete?)''><i class='icon-trash'></i> Delete </a>";
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

    public function edit_item($id)
    {
      $id = hashids_decrypt($id);
       $data = array(
        'title' => 'Edit Item',
        'active_menu' => 'add_item',
        'form_data' => $this->Constant_model->getOneCol('items','id',$id),
        'warehouses' => $this->Constant_model->get_alltable_desc('warehouse'),
      );

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_item');
      $this->load->view('footer');
    }

    public function delete_item($id)
    {
      $id = hashids_decrypt($id);
      $res = $this->Constant_model->deleteData('items',$id);
      $this->session->set_flashdata(array('response' => 'success', 'msg' => "Deleted Item successfully!"));
        return redirect(base_url().'items/view_item');
    }

    //  stocks funcation
    public function add_stock($value='')
    {
      $data = array(
        'title' => 'Add Stock',
        'active_menu' => 'add_stock',
      );
      $data['warehouse_data'] = $this->Constant_model->get_alltable_desc('warehouse');
      $data['item_data'] = $this->Constant_model->get_alltable_desc('items');

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('add_stock');
      $this->load->view('footer');
    }

    public function save_stock($value='')
    {
      $item_id = hashids_decrypt($_POST['item_id']);

      if($this->session->userdata('user_type') == "admin") {
        $warehouse_id = $_POST['warehouse_id'];
      } else {
        $warehouse_id = $this->session->userdata('warehouse_id');
      }

      $data = array(
        'warehouse_id' => $warehouse_id,
        'added_by' => $_SESSION['user_id'],
        'item_id' => $item_id,
        'qty' => $_POST['qty'],
      );
      $this->Constant_model->insert_alltable('stock',$data);
      $this->Constant_model->insert_alltable('inventory',$data);
      $item_data = $this->Constant_model->getOneCol('items','id',$item_id);
      $item_qty = $item_data->item_qty+$_POST['qty'];
      $update_data = array('item_qty' => $item_qty);
      $this->Constant_model->updateData('items',$update_data,$item_id);
      return redirect(base_url().'items/view_stock');
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


          $buttons = "<a href='".site_url('items/delete_stock/'.hashids_encrypt(@$value->id))."' class='btn small-btn' onclick='return confirm(Are you sure you want to delete?)''><i class='icon-trash'></i> Delete </a>";
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
      $item_data = $this->Constant_model->getOneCol('items','id',$stock_data->item_id); $update_qty = $item_data->item_qty - $stock_data->qty;
      $update_item_qty = array('item_qty' => $update_qty); print_r($update_item_qty);

      $this->Constant_model->updateData('items',$update_item_qty,$item_data->id);

      $res = $this->Constant_model->deleteData('stock',$id);
      $this->session->set_flashdata(array('response' => 'success', 'msg' => "Deleted Stock successfully!"));
        return redirect(base_url().'items/view_stock');
    }

    // stocks funcation end


}

?>
