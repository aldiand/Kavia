<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_produksi');
    $this->load->model('M_pesanan');
    $this->load->model('M_overhead');
    $this->load->model('M_bahanBaku');
    $this->load->model('M_bahanPenolong');
    $this->load->model('M_pegawai');
    $this->load->model('M_bbb');
    $this->load->model('M_bbp');
    $this->load->model('M_btkl');
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
    $data['dataBahanBaku'] = $this->M_bahanBaku->select_all();
    $data['dataOverhead'] = $this->M_overhead->select_all();
    $data['dataBahanPenolong'] = $this->M_bahanPenolong->select_all();
    $data['dataPegawai'] = $this->M_pegawai->select_all_btkl();

    $data['total_biaya_bb'] = $this->M_bbb->get_biaya_by_produksi($id);
    $data['total_biaya_bp'] = $this->M_bbp->get_biaya_by_produksi($id);
    $data['total_biaya_tkl'] = $this->M_btkl->get_biaya_by_produksi($id);
    $data['total_jam_tkl'] = $this->M_btkl->get_totaljam_by_produksi($id);


    $data['page'] = "produksi";
    $data['judul'] = "Detail Produksi";
    $data['deskripsi'] = "Manage Data Produksi";

    $data['modal_tambah_produksi'] = show_my_modal('modals/modal_tambah_produksi', 'tambah-produksi', $data);
    $data['modal_tambah_bb'] = show_my_modal('modals/modal_tambah_biaya_bb', 'tambah-bb-produksi', $data);
    $data['modal_tambah_bop'] = show_my_modal('modals/modal_tambah_biaya_bop', 'tambah-bop-produksi', $data);
    $data['modal_tambah_bbp'] = show_my_modal('modals/modal_tambah_biaya_bbp', 'tambah-bbp-produksi', $data);
    $data['modal_tambah_btkl'] = show_my_modal('modals/modal_tambah_biaya_btkl', 'tambah-btkl-produksi', $data);

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
      $this->M_pesanan->setStatus($this->input->post('id_pesanan'), 1);
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

    public function setSelesai() {
  		$id = $_POST['id'];
  		$result = $this->M_produksi->setStatus($id, 2);
    		if ($result > 0) {
    			echo show_succ_msg('Produksi Selesai', '20px');
    		} else {
    			echo show_err_msg('Produksi Gagal di Update', '20px');
    		}
    }
}
