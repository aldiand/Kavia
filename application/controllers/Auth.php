<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
	}

	public function index() {
		$session = $this->session->userdata('jenis');
		if ($session == '') {
			$this->load->view('login');
		} else {
			redirect('Home');
		}
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			$data = $this->M_auth->login($username, $password);

			if ($data == false) {
				$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
				redirect('Auth');
			} else {
				$session = [
					'userdata' => $data,
					'status' => "Loged in"
				];
				$this->session->set_userdata($session);
				redirect('Home');
			}
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
		}
	}

	public function login_now() {
		 $this->session->set_userdata('jenis', $_POST['jenis']);
		 redirect('Home');
	}

	public function login_alt() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			if($username == "produksi" && $password == "produksi123") { 
				$session = [
					'userdata' => $data,
					'jenis' => "produksi"
				];
				$this->session->set_userdata($session);
				redirect('Home');

			} else if ($username == "pemilik" && $password == "pemilik123"){
				$session = [
					'userdata' => $data,
					'jenis' => "pemilik"
				];
				$this->session->set_userdata($session);
				redirect('Home');

			} else if ($username == "admin" && $password == "admin123") {
				$session = [
					'userdata' => $data,
					'jenis' => "admin"
				];
				$this->session->set_userdata($session);
				redirect('Home');

			} else {
				$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
				redirect('Auth');

			}

			
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
