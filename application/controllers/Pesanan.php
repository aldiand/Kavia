<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_pesanan');
  }

  public function index() {
    $data['dataPesanan'] = $this->M_pesanan->select_all();

    $data['page'] = "pesanan";
    $data['judul'] = "Data Pesanan Aktif";
    $data['deskripsi'] = "Manage Data Pesanan";

    $data['modal_tambah_pesanan'] = show_my_modal('modals/modal_tambah_pesanan', 'tambah-pesanan', $data);

    $this->template->views('pesanan/home', $data);
  }

  public function id($id='') {
    $data['dataPesanan'] = $this->M_pesanan->select_by_id($id);

    $data['page'] = "pesanan";
    $data['judul'] = "Detail Pesanan";
    $data['deskripsi'] = "Manage Data Pesanan";

    $data['modal_tambah_pesanan'] = show_my_modal('modals/modal_tambah_pesanan', 'tambah-pesanan', $data);

    $this->template->views('pesanan/detail', $data);
  }

  public function tampil() {
		$data['dataPesanan'] = $this->M_pesanan->select_all();
		$this->load->view('pesanan/list_data', $data);
	}

  	public function prosesTambah() {
  		$this->form_validation->set_rules('nama_pemesan', 'Nama', 'trim|required');
  		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
  		$this->form_validation->set_rules('no_telp', 'Nomer Telp', 'trim|required');
  		$this->form_validation->set_rules('pesanan', 'Pesanan', 'trim|required');
  		$this->form_validation->set_rules('deskripsi_pesanan', 'Deskripsi', 'trim|required');
  		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
  		$this->form_validation->set_rules('harga_kisaran', 'Harga', 'trim|required');
  		$this->form_validation->set_rules('tanggal_estimasi', 'Estimasi', 'trim|required');
  		$this->form_validation->set_rules('dp', 'DP', 'trim|required');

  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_pesanan->insert($data);

  			if ($result > 0) {
  				$out['status'] = '';
  				$out['msg'] = show_succ_msg('Data Pesanan Berhasil ditambahkan', '20px');
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data Pesanan Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
		$data['dataPesanan'] = $this->M_pesanan->select_by_id($id);
		echo show_my_modal('modals/modal_update_pesanan', 'update-pesanan', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('nama_pemesan', 'Nama', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('no_telp', 'Nomer Telp', 'trim|required');
    $this->form_validation->set_rules('pesanan', 'Pesanan', 'trim|required');
    $this->form_validation->set_rules('deskripsi_pesanan', 'Deskripsi', 'trim|required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
    $this->form_validation->set_rules('harga_kisaran', 'Harga', 'trim|required');
    $this->form_validation->set_rules('tanggal_estimasi', 'Estimasi', 'trim|required');
    $this->form_validation->set_rules('dp', 'DP', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pesanan->update($data, $this->input->post('id'));

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pesanan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pesanan Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_pesanan->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Pesanan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pesanan Gagal dihapus', '20px');
		}
	}


}
