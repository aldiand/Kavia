<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BahanBaku extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_bahanBaku');
  }

  public function index() {
    $data['dataBahanBaku'] = $this->M_bahanBaku->select_all();

    $data['page'] = "bahan baku";
    $data['judul'] = "Data Bahan Baku";
    $data['deskripsi'] = "Manage Data Bahan Baku";

    $data['modal_tambah_bahanBaku'] = show_my_modal('modals/modal_tambah_bahanBaku', 'tambah-bahanBaku', $data);

    $this->template->views('bahanBaku/home', $data);
  }
  public function tampil() {
		$data['dataBahanBaku'] = $this->M_bahanBaku->select_all();
		$this->load->view('bahanBaku/list_data', $data);
	}

  	public function prosesTambah() {
  		$this->form_validation->set_rules('nama_bahan_baku', 'Nama', 'trim|required');
  		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
  		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
  		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');

  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_bahanBaku->insert($data);

  			if ($result > 0) {
  				$out['status'] = '';
  				$out['msg'] = show_succ_msg('Data Bahan Baku Berhasil ditambahkan', '20px');
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data BahanBaku Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
		$data['dataBahanBaku'] = $this->M_bahanBaku->select_by_id($id);
		echo show_my_modal('modals/modal_update_bahanBaku', 'update-bahanBaku', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('nama_bahan_baku', 'Nama', 'trim|required');
    $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
    $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_bahanBaku->update($data, $this->input->post('id'));

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Bahan Baku Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Bahan Baku Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_bahanBaku->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data BahanBaku Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data BahanBaku Gagal dihapus', '20px');
		}
	}

}
