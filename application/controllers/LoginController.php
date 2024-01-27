<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	public function index()
	{
		$this->load->view('loginpage');
	}

	public function adminPanel(){
		$this->load->view('Template/header');
		$this->load->view('Template/sidebar');
		$this->load->view('Template/dashboard');
	}

	//==============chklogin================
	public function chklogin(){
		$email = $this->input->post('txtemail');
		$pwd = $this->input->post('txtpwd');
		$this->db->where('admin_email', $email);
		$this->db->where('admin_password', $pwd);
		$data = $this->db->get('admin')->result();
		if(count($data) > 0){
			echo "1";
		}
		else{
			echo "0";
		}
	}
}
?>
