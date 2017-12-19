<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_produksi');
  }

  public function index() {
    $data['dataProduksi'] = $this->M_produksi->select_all_uncomplete();

    $data['page'] = "produksi";
    $data['judul'] = "Data Produksi Aktif";
    $data['deskripsi'] = "Manage Data Produksi";

    $data['modal_tambah_produksi'] = show_my_modal('modals/modal_tambah_produksi', 'tambah-produksi', $data);

    $this->template->views('produksi/home', $data);
  }

  public function riwayat() {
    $data['dataProduksi'] = $this->M_produksi->select_all_complete();

    $data['page'] = "riwayat";
    $data['judul'] = "Data Produksi";
    $data['deskripsi'] = "Riwayat Produksi";


    $this->template->views('produksi/riwayat', $data);

  }

  public function id($id='') {
    $data['dataProduksi'] = $this->M_produksi->select_by_id($id);

    $data['page'] = "produksi";
    $data['judul'] = "Detail Produksi";
    $data['deskripsi'] = "Manage Data Produksi";

    $data['modal_tambah_produksi'] = show_my_modal('modals/modal_tambah_produksi', 'tambah-produksi', $data);

    $this->template->views('produksi/detail', $data);
  }

  public function tampil() {
		$data['dataProduksi'] = $this->M_produksi->select_all();
		$this->load->view('produksi/list_data', $data);
	}

    public function tampil2() {
  		$data['dataProduksi'] = $this->M_produksi->select_all_uncomplete();
  		$this->load->view('produksi/list_data', $data);
  	}

  	public function prosesTambah() {
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_produksi->insert($data);

  			if ($result > 0) {
  				$out['status'] = '';
  				$out['msg'] = show_succ_msg('Data Produksi Berhasil ditambahkan', '20px');
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data Produksi Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
		$data['dataProduksi'] = $this->M_produksi->select_by_id($id);
		echo show_my_modal('modals/modal_update_produksi', 'update-produksi', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_produksi->update($data, $this->input->post('id'));

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Produksi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Produksi Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_produksi->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Produksi Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Produksi Gagal dihapus', '20px');
		}
	}


}
