<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('MLogin');
	}

	public function index()
	{
		if (isset($_POST['btn_login'])){
				$username = $_POST['txt_user'];
				$password = md5($_POST['txt_pass']);
				$notif = $this->MLogin->GoLogin($username,$password);
				if($notif == "Gudang"){
					$this->load->library('session');
					$this->session->set_userdata('username',$username);
					$this->session->set_userdata('Cek','Gudang');
					redirect(site_url('Welcome'));

				}
				elseif ($notif == "Kasir") {
					$this->load->library('session');
					$this->session->set_userdata('username',$username);
					$this->session->set_userdata('Cek','Kasir');
					redirect(site_url('Welcome'));
				}
				elseif ($notif == "Admin") {
					$this->load->library('session');
					$this->session->set_userdata('username',$username);
					$this->session->set_userdata('Cek','Admin');
					redirect(site_url('Welcome'));
				}						
				else{
					$this->load->library('session');
					$this->session->sess_destroy();
					redirect(site_url('Login'));
				}
			}

		$this->load->view('VLogin');
	}

}