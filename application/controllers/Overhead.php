<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overhead extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_overhead');
  }

  public function index() {
    $data['dataOverhead'] = $this->M_overhead->select_all();

    $data['page'] = "overhead";
    $data['judul'] = "Data Overhead";
    $data['deskripsi'] = "Manage Data Overhead";

    $data['modal_tambah_overhead'] = show_my_modal('modals/modal_tambah_overhead', 'tambah-overhead', $data);

    $this->template->views('overhead/home', $data);
  }
  public function tampil() {
		$data['dataOverhead'] = $this->M_overhead->select_all();
		$this->load->view('overhead/list_data', $data);
	}

  	public function prosesTambah() {
      $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
      $this->form_validation->set_rules('harga_per_bulan', 'Harga', 'trim|required');
      $this->form_validation->set_rules('dibebankan_per_produksi', 'Dibebankan', 'trim|required');

  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_overhead->insert($data);

  			if ($result > 0) {
  				$out['status'] = '';
  				$out['msg'] = show_succ_msg('Data Overhead Berhasil ditambahkan', '20px');
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data Overhead Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
		$data['dataOverhead'] = $this->M_overhead->select_by_id($id);
		echo show_my_modal('modals/modal_update_overhead', 'update-overhead', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('harga_per_bulan', 'Harga', 'trim|required');
    $this->form_validation->set_rules('dibebankan_per_produksi', 'Dibebankan', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_overhead->update($data, $this->input->post('id'));

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Overhead Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Overhead Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_overhead->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Overhead Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Overhead Gagal dihapus', '20px');
		}
	}

}
