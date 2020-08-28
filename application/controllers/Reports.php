<?php
class Reports extends CI_Controller {
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
        'title' => 'Reports',
        'active_menu' => 'reports',
        'items' => $this->Sales_model->getAllItems(),
      );

      $this->load->view('header',$data);
      $this->load->view('sidebar');
      $this->load->view('reports/index.php');
      $this->load->view('footer');
    }

    public function new_report()
    {
        $data['arr'] = [
          'item_id'=>$this->input->post('item_id'),
          'from_date'=>$this->input->post('from_date'),
          'to_date'=>$this->input->post('to_date')
        ];
        $data['rows']=$this->Sales_model->getReport($data['arr']);
        $this->load->view('reports/view_report',$data);

    }
}
