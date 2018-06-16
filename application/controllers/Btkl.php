<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Btkl extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_btkl');
    $this->load->model('M_pegawai');
    $this->load->model('M_report');
  }

  public function index() {
    $data['dataPegawai'] = $this->M_pegawai->select_all_btkl();

    $data['page'] = "Biaya Bahan Penolong";
    $data['judul'] = "Data Biaya Bahan Penolong";
    $data['deskripsi'] = "Manage Data Biaya Bahan Penolong";

    $data['modal_tambah_btkl'] = show_my_modal('modals/modal_tambah_btkl', 'tambah-btkl', $data);

    $this->template->views('btkl/home', $data);
  }
  public function tampil() {
		$data['dataBtkl'] = $this->M_btkl->select_all();
		$this->load->view('btkl/list_data', $data);
	}

  public function tampil2($id='') {
    $data['dataBtkl'] = $this->M_btkl->select_by_produksi($id);
    $this->load->view('btkl/list_data', $data);
  }

  	public function prosesTambah() {
  		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
    	$this->form_validation->set_rules('id_pegawai', 'Pegawai', 'trim|required');
  		$this->form_validation->set_rules('jam_masuk', 'jam masuk', 'trim|required');

			$this->form_validation->set_message('is_unique', '%s sudah ada di database');
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			$this->form_validation->set_message('numeric', '%s hanya boleh berisi Angka 1-9');
			
  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_btkl->insert($data);

  			if ($result > 0) {
					//$harga = $this->M_pegawai->get_gaji_by_id($data['id_pegawai']);
					//$total_jam = $data['jam_keluar']-$data['jam_masuk'];
					//$this->M_report->insert_jurnal(513, $result, 'd', ($total_jam*$harga));
					//$this->M_report->insert_jurnal(511, $result, 'c', ($total_jam*$harga));
  				$out['status'] = '';
  				$out['msg'] = show_succ_msg('Data BTKL Berhasil ditambahkan', '20px');
  			} else {
  				$out['status'] = '';
  				$out['msg'] = show_err_msg('Data BTKL Gagal ditambahkan', '20px');
  			}
  		} else {
  			$out['status'] = 'form';
  			$out['msg'] = show_err_msg(validation_errors());
  		}

  		echo json_encode($out);
  	}


	public function update() {
		$id = trim($_POST['id']);
    $data['dataPegawai'] = $this->M_pegawai->select_all_btkl();
		$data['dataBtkl'] = $this->M_btkl->select_by_id($id);
		echo show_my_modal('modals/modal_update_biaya_tkl', 'update-btkl', $data);
	}

  public function prosesUpdate() {
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
    $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'trim|required');
    $this->form_validation->set_rules('jam_keluar', 'jam keluar', 'trim|required');

		$this->form_validation->set_message('is_unique', '%s sudah ada di database');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('numeric', '%s hanya boleh berisi Angka 1-9');
		
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_btkl->update($data, $this->input->post('id'));

			if ($result > 0) {
        $harga = $this->M_pegawai->get_gaji_by_id($data['id_pegawai']);
        $total_jam = substr($data['jam_keluar'],0,2)-substr($data['jam_masuk'],0,2) + 1;
        $this->M_report->insert_jurnal(513, $this->input->post('id'), 'd', ($total_jam*$harga*getValueKesulitanByProduksi($this->input->post('id_produksi'))));
        $this->M_report->insert_jurnal(511, $this->input->post('id'), 'c', ($total_jam*$harga*getValueKesulitanByProduksi($this->input->post('id_produksi'))));
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data BTKL Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data BTKL Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_btkl->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data BTKL Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data BTKL Gagal dihapus', '20px');
		}
	}

}
