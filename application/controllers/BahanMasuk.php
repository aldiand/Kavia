<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BahanMasuk extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_bahanMasuk');
    $this->load->model('M_bahanBaku');
    $this->load->model('M_report');
  }

  public function index() {
    $data['dataBahanMasuk'] = $this->M_bahanMasuk->select_all();
    $data['dataBahanBaku'] = $this->M_bahanBaku->select_all();

    $data['page'] = "bahan Masuk";
    $data['judul'] = "Data Bahan Masuk";
    $data['deskripsi'] = "Manage Data Bahan Masuk";

        $data['modal_tambah_bahanMasuk'] = show_my_modal('modals/modal_tambah_bahanMasuk', 'tambah-BahanMasuk', $data);

    $this->template->views('bahanMasuk/home', $data);
  }
  public function tampil() {
		$data['dataBahanMasuk'] = $this->M_bahanMasuk->select_all();
		$this->load->view('bahanMasuk/list_data', $data);
	}

  	public function prosesTambah() {
  		$this->form_validation->set_rules('harga_beli', 'Harga', 'trim|required|is_natural');
  		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|is_natural');

		$this->form_validation->set_message('is_unique', '%s sudah ada di database');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('is_natural', '%s hanya boleh berisi Angka 1-9');

  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_bahanMasuk->insert($data);
  			if ($result > 0) {
				$result2 = $this->M_bahanMasuk->tambahStok($data['id_bbb'], $data['jumlah']);
				if ($result2 > 0){
					$this->M_report->insert_jurnal(215, $result, 'd', ($data['jumlah']*$data['harga_beli']));
					$this->M_report->insert_jurnal(111, $result, 'c', ($data['jumlah']*$data['harga_beli']));

					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Bahan Masuk Berhasil ditambahkan', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Bahan Baku Gagal di update', '20px');
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
		$data['dataBahanMasuk'] = $this->M_bahanMasuk->select_by_id($id);
		echo show_my_modal('modals/modal_update_BahanMasuk', 'update-BahanMasuk', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('nama_bahan_Masuk', 'Nama', 'trim|required');
    $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
    $this->form_validation->set_rules('harga', 'Harga', 'trim|required|is_natural');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|is_natural');

	$this->form_validation->set_message('is_unique', '%s sudah ada di database');
	$this->form_validation->set_message('required', '%s tidak boleh kosong');
	$this->form_validation->set_message('is_natural', '%s hanya boleh berisi Angka 1-9');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_bahanMasuk->update($data, $this->input->post('id'));

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
		$result = $this->M_bahanMasuk->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data BahanMasuk Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data BahanMasuk Gagal dihapus', '20px');
		}
	}

}
