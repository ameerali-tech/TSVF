<?php
class Sales extends CI_Controller {
    function __construct() {

        parent::__construct();
        if (empty($_SESSION['username'])) {
            return redirect(base_url().'auth');
        }
        $this->load->model('Sales_model');

    }

    public function index()
    {
      $data = array(
        'title' => 'Add Sale',
        'active_menu' => 'sales',
        'items' => $this->Sales_model->get_Items(),
      );

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('sales/add_sale');
      $this->load->view('footer');
    }

    public function add_sale()
    {
        $arr = [
          'item_id'=>$this->input->post('item_id'),
          'sale_qty'=>$this->input->post('qty')
        ];
        $id=$this->Sales_model->add_sale($arr);
        if ($id>0) {
            $row=$this->Sales_model->get_item($arr);
            $arr1 = [
              'item_qty'=>$row->item_qty-$arr['sale_qty']
            ];
            $is_update=$this->Sales_model->update_qty($arr1,$arr);
            if (!empty($is_update)) {
              $this->session->set_flashdata("success","Sale has been done successfully..!");
              redirect('sales/index');
            }
        }
    }
}
