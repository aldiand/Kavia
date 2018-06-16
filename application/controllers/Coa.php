<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coa extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_coa');
  }

  public function index() {
    $data['dataCoa'] = $this->M_coa->select_all();

    $data['page'] = "COA";
    $data['judul'] = "Data COA";
    $data['deskripsi'] = "Manage Data COA";

    $data['modal_tambah_coa'] = show_my_modal('modals/modal_tambah_coa', 'tambah-coa', $data);

    $this->template->views('coa/home', $data);
  }
  public function tampil() {
		$data['dataCoa'] = $this->M_coa->select_all();
		$this->load->view('coa/list_data', $data);
	}

  	public function prosesTambah() {
  		$this->form_validation->set_rules('kode', 'kode', 'trim|required|is_unique[t_coa.kode]');
  		$this->form_validation->set_rules('nama', 'nama', 'trim|required');

		$this->form_validation->set_message('is_unique', '%s sudah ada di database');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('numeric', '%s hanya boleh berisi Angka 1-9');
  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_coa->insert($data);

  			if ($result > 0) {
  				$out['status'] = '';
  				$out['msg'] = show_succ_msg('Data COA Berhasil ditambahkan', '20px');
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data COA Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
		$data['dataCoa'] = $this->M_coa->select_by_real_id($id);
		echo show_my_modal('modals/modal_update_coa', 'update-coa', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_coa->update($data, $this->input->post('id'));

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data COA Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data COA Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_coa->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Coa Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Coa Gagal dihapus', '20px');
		}
	}

}
