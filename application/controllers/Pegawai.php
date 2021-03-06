<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_pegawai');
    $this->load->model('M_report');
  }

  public function index() {
    $data['dataPegawai'] = $this->M_pegawai->select_all();

    $data['page'] = "pegawai";
    $data['judul'] = "Data Pegawai";
    $data['deskripsi'] = "Manage Data Pegawai";

    $data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);
    $this->template->views('pegawai/home', $data);
  }
  public function tampil() {
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$this->load->view('pegawai/list_data', $data);
	}

  	public function prosesTambah() {
		$_POST['gaji'] = preg_replace('/\D/','',$_POST['gaji']);
    	$this->form_validation->set_rules('sid', 'ID', 'trim|required|is_unique_active[t_pegawai.sid]');
  		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'trim|required|alpha_dash_space');
  		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
  		$this->form_validation->set_rules('tipe_gaji', 'Tipe Gaji', 'trim|required');
  		$this->form_validation->set_rules('gaji', 'Gaji', 'trim|required|is_natural');
  		$this->form_validation->set_rules('no_telp', 'Nomer Telpon', 'trim|required|is_natural');
		$this->form_validation->set_message('is_unique', '%s sudah ada di database');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('is_natural', '%s hanya boleh berisi Angka 1-9');

  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
			if($data['tipe_gaji'] == 'tetap') {
				$data['beban_gaji'] = $data['gaji'];
			}

  			$result = $this->M_pegawai->insert($data);

  			if ($result > 0) {
  				$out['status'] = '';
  				$out['msg'] = show_succ_msg('Data Pegawai Berhasil ditambahkan', '20px');
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data Pegawai Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
		$data['dataPegawai'] = $this->M_pegawai->select_by_id($id);
		echo show_my_modal('modals/modal_update_pegawai', 'update-pegawai', $data);
	}

  public function prosesUpdate() {
		$_POST['gaji'] = preg_replace('/\D/','',$_POST['gaji']);
		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'trim|required|alpha_dash_space');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('tipe_gaji', 'Tipe Gaji', 'trim|required');
		$this->form_validation->set_rules('gaji', 'Gaji', 'trim|required|is_natural');
		$this->form_validation->set_rules('no_telp', 'Nomer Telpon', 'trim|required|is_natural');

		$this->form_validation->set_message('is_unique', '%s sudah ada di database');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('is_natural', '%s hanya boleh berisi Angka 1-9');
		$this->form_validation->set_message('numeric', '%s hanya boleh berisi Angka 1-9');
		
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			if($data['tipe_gaji'] == 'tetap') {
				$data['beban_gaji'] = $data['gaji'];
			}
			$result = $this->M_pegawai->update($data, $this->input->post('id'));

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_pegawai->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Pegawai Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pegawai Gagal dihapus', '20px');
		}
	}

	public function gaji() {
		$id = trim($_POST['id']);
		$data['dataPegawai'] = $this->M_pegawai->select_by_id($id);
		echo show_my_modal('modals/modal_penggajian', 'gaji-pegawai', $data);
	}
	
	public function prosesGaji() {
		$this->form_validation->set_rules('beban_gaji', 'Gaji', 'trim|required|is_natural');

		$this->form_validation->set_message('is_unique', '%s sudah ada di database');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('is_natural', '%s hanya boleh berisi Angka 1-9');
		
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pegawai->update_normal($data, $this->input->post('id'));

			$this->M_report->insert_jurnal(515, $data['id'], 'd', $data['beban_gaji']);
			$this->M_report->insert_jurnal(111, $data['id'], 'c', $data['beban_gaji']);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Penggajian Pegawai Berhasil', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Penggajian Pegawai Gagal', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
}
