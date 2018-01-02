<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BbTerpakai extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_bbb');
    $this->load->model('M_bahanBaku');
  }

  public function index() {
    $data['dataBbTerpakai'] = $this->M_bbb->select_all();

    $data['page'] = "Biaya Bahan Baku";
    $data['judul'] = "Data Biaya Bahan Baku";
    $data['deskripsi'] = "Manage Data Biaya Bahan Baku";

    $data['modal_tambah_bbTerpakai'] = show_my_modal('modals/modal_tambah_bbTerpakai', 'tambah-bbTerpakai', $data);

    $this->template->views('bbTerpakai/home', $data);
  }
  public function tampil() {
		$data['dataBbTerpakai'] = $this->M_bbb->select_all();
		$this->load->view('bbTerpakai/list_data', $data);
	}

  public function tampil2($id='') {
    $data['dataBbb'] = $this->M_bbb->select_by_produksi($id);
    $this->load->view('bbTerpakai/list_data', $data);
  }

  	public function prosesTambah() {
      $data = $this->input->post();
      $jumlah = $this->M_bahanBaku->get_stok_by_id($data['id_bbb']);
  		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
  		$this->form_validation->set_rules('jumlah', 'Jumlah', "trim|required|less_than_equal_to[$jumlah]");
  		$this->form_validation->set_rules('id_bbb', 'Bahan Baku', 'trim|required');
  		$this->form_validation->set_rules('id_produksi', 'Produksi', 'trim|required');

  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_bbb->insert($data);

  			if ($result > 0) {
          $result = $this->M_bahanBaku->pakaiStok($data['id_bbb'], $data['jumlah']);
          if ($result > 0){
    				$out['status'] = '';
    				$out['msg'] = show_err_msg('Data Bahan Baku Gagal di update', '20px');
          } else {
    				$out['status'] = '';
    				$out['msg'] = show_succ_msg('Data Biaya Bahan Baku Berhasil ditambahkan', '20px');
          }
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data Biaya Bahan Baku Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
    $data['dataBahanBaku'] = $this->M_bahanBaku->select_all();
		$data['dataBbb'] = $this->M_bbb->select_by_id($id);
		echo show_my_modal('modals/modal_update_biaya_bb', 'update-bbTerpakai', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
    $this->form_validation->set_rules('id_bbb', 'Bahan Baku', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_bbb->update($data, $this->input->post('id'));

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Biaya Bahan Baku Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Biaya Bahan Baku Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_bbb->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data BbTerpakai Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data BbTerpakai Gagal dihapus', '20px');
		}
	}

}
