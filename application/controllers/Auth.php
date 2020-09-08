<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	 public function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $this->load->model('Auth_model');
       $this->load->model('Constant_model');
    }
	public function index()
	{
		if ($this->session->userdata('user_type') == 'admin' || $this->session->userdata('user_type') == 'partner_admin') {
			return redirect('admin/dashboard');
		}
		$this->load->view('login');
	}
	public function login()
	{

		$username = strip_tags($this->input->post('username'));
		$password = strip_tags($this->input->post('password'));
		$data = array(
			'username' =>$username,
			'password' =>$password
		);
		$res = $this->Auth_model->login_verify($data);

			if ($res['valid']) {
				$user_data = array(
					'user_id' =>$res['user_id'] ,
          'username' =>$res['username'] ,
          'first_name' =>$res['first_name'],
          'last_name' =>$res['last_name'],
          'email' =>$res['email'],
          'user_type' =>$res['user_type'],
					'user_role_id' =>$res['user_role_id'],
          'status' =>$res['status'],
					'userpermissions'=>$this->Constant_model->getRows2('role_permission','role_id',$res['user_role_id']),
				);
				 if(empty($user_data['user_type'])) {
					 $this->session->set_flashdata('alert_msg', array('failure', 'in', "You are not authorized to login please ask your admin"));
									 return redirect(base_url().'Auth');
				 }

				 $this->session->set_userdata($user_data);
 				return redirect(base_url().'admin/dashboard');

			} else {
				$this->session->set_flashdata('alert_msg', array('failure', 'Login', $res['error']));
                return redirect(base_url().'Auth');
			}
	}


	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}


	// change password code

	public function change_password()
	{
		if (empty($this->session->userdata('name'))) {
            return redirect(base_url().'login');
        }

        $this->load->view('change_password');
	}

	public function CheckPass()
	{
		if (empty($this->session->userdata('name'))) {
			return redirect('login');
		}
		$data = $this->db->simple_query("SELECT * FROM `users` WHERE password = '".md5($_POST['pass'])."' AND id = '".$_SESSION['user_id']."'");
		echo $data->num_rows;
	}

	public function update_pass()
	{
		if (empty($this->session->userdata('name'))) {
			return redirect('login');
		}
		$data = array('password' => md5($_POST['password']));
		$res = $this->Constant_model->updateData('users', $data, $_SESSION['user_id']);
		if ($res) {
			$this->session->set_flashdata('alert_msg', array('success', 'add', "Success! Your Password has been changed!"));
            return redirect('change-password');
		}
	}


}
