<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BahanPenolong extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_bahanPenolong');
  }

  public function index() {
    $data['dataBahanPenolong'] = $this->M_bahanPenolong->select_all();

    $data['page'] = "bahan penolong";
    $data['judul'] = "Data Bahan Penolonf";
    $data['deskripsi'] = "Manage Data Bahan Penolong";

    $data['modal_tambah_bahanPenolong'] = show_my_modal('modals/modal_tambah_bahanPenolong', 'tambah-bahanPenolong', $data);

    $this->template->views('bahanPenolong/home', $data);
  }
  public function tampil() {
		$data['dataBahanPenolong'] = $this->M_bahanPenolong->select_all();
		$this->load->view('bahanPenolong/list_data', $data);
	}

  	public function prosesTambah() {
  		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
  		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
  		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');

  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_bahanPenolong->insert($data);

  			if ($result > 0) {
  				$out['status'] = '';
  				$out['msg'] = show_succ_msg('Data BahanPenolong Berhasil ditambahkan', '20px');
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data BahanPenolong Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
		$data['dataBahanPenolong'] = $this->M_bahanPenolong->select_by_id($id);
		echo show_my_modal('modals/modal_update_bahanPenolong', 'update-bahanPenolong', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
    $this->form_validation->set_rules('harga', 'Harga', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_bahanPenolong->update($data, $this->input->post('id'));

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Bahan Penolong Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Bahan Penolong Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_bahanPenolong->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Bahan Penolong Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Bahan Penolong Gagal dihapus', '20px');
		}
	}

}