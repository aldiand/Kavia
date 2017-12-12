<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('jenis') == '') {
			redirect('Auth');
		}
	}
	
}

/* End of file MY_Auth.php */
/* Location: ./application/core/MY_Auth.php */
