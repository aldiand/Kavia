<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BahanMasuk extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_BahanMasuk');
    $this->load->model('M_bahanBaku');
  }

  public function index() {
    $data['dataBahanMasuk'] = $this->M_BahanMasuk->select_all();
    $data['dataBahanBaku'] = $this->M_bahanBaku->select_all();

    $data['page'] = "bahan Masuk";
    $data['judul'] = "Data Bahan Masuk";
    $data['deskripsi'] = "Manage Data Bahan Masuk";

        $data['modal_tambah_bahanMasuk'] = show_my_modal('modals/modal_tambah_BahanMasuk', 'tambah-BahanMasuk', $data);

    $this->template->views('BahanMasuk/home', $data);
  }
  public function tampil() {
		$data['dataBahanMasuk'] = $this->M_BahanMasuk->select_all();
		$this->load->view('BahanMasuk/list_data', $data);
	}

  	public function prosesTambah() {
  		$this->form_validation->set_rules('harga_beli', 'Harga', 'trim|required');
  		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');

  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_BahanMasuk->insert($data);

  			if ($result > 0) {
          $result = $this->M_BahanMasuk->tambahStok($data['id_bbb'], $data['jumlah']);
          if ($result > 0){
    				$out['status'] = '';
    				$out['msg'] = show_err_msg('Data Bahan Baku Gagal di update', '20px');
          } else {
    				$out['status'] = '';
    				$out['msg'] = show_succ_msg('Data Bahan Masuk Berhasil ditambahkan', '20px');
          }
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data BahanMasuk Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
		$data['dataBahanMasuk'] = $this->M_BahanMasuk->select_by_id($id);
		echo show_my_modal('modals/modal_update_BahanMasuk', 'update-BahanMasuk', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('nama_bahan_Masuk', 'Nama', 'trim|required');
    $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
    $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_BahanMasuk->update($data, $this->input->post('id'));

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Bahan Masuk Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Bahan Masuk Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_BahanMasuk->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data BahanMasuk Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data BahanMasuk Gagal dihapus', '20px');
		}
	}

}
