<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bbp extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_bbp');
    $this->load->model('M_bahanPenolong');
  }

  public function index() {
    $data['dataBbTerpakai'] = $this->M_bbp->select_all();

    $data['page'] = "Biaya Bahan Penolong";
    $data['judul'] = "Data Biaya Bahan Penolong";
    $data['deskripsi'] = "Manage Data Biaya Bahan Penolong";

    $data['modal_tambah_bbp'] = show_my_modal('modals/modal_tambah_bbp', 'tambah-bbp', $data);

    $this->template->views('bbp/home', $data);
  }
  public function tampil() {
		$data['dataBbp'] = $this->M_bbp->select_all();
		$this->load->view('bbp/list_data', $data);
	}

  public function tampil2($id='') {
    $data['dataBbp'] = $this->M_bbp->select_by_produksi($id);
    $this->load->view('bbp/list_data', $data);
  }

  	public function prosesTambah() {
  		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
  		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
  		$this->form_validation->set_rules('id_bahan_penolong', 'Bahan Penolong', 'trim|required');
  		$this->form_validation->set_rules('id_produksi', 'Produksi', 'trim|required');

  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_bbp->insert($data);

  			if ($result > 0) {
  				$out['status'] = '';
  				$out['msg'] = show_succ_msg('Data Biaya Bahan Penolong Berhasil ditambahkan', '20px');
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data Biaya Bahan Penolong Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
    $data['dataBahanPenolong'] = $this->M_bahanPenolong->select_all();
		$data['dataBbp'] = $this->M_bbp->select_by_id($id);
		echo show_my_modal('modals/modal_update_biaya_bp', 'update-bbp', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
    $this->form_validation->set_rules('id_bahan_penolong', 'Bahan Penolong', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_bbp->update($data, $this->input->post('id'));

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Biaya Bahan Penolong Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Biaya Bahan Penolong Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_bbp->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Biaya Bahan Penolong Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Biaya Bahan Penolong Gagal dihapus', '20px');
		}
	}

}