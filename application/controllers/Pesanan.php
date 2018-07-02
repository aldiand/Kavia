<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends AUTH_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('M_pesanan');
    $this->load->model('M_produksi');
    $this->load->model('M_overhead');
    $this->load->model('M_bahanBaku');
    $this->load->model('M_bahanPenolong');
    $this->load->model('M_pegawai');
    $this->load->model('M_bbb');
    $this->load->model('M_bbp');
    $this->load->model('M_btkl');
    $this->load->model('M_report');
  }

  public function index() {
    $data['dataPesanan'] = $this->M_pesanan->select_all_uncomplete();

    $data['page'] = "pesanan";
    $data['judul'] = "Data Pesanan Aktif";
    $data['deskripsi'] = "Manage Data Pesanan";

    $data['modal_tambah_pesanan'] = show_my_modal('modals/modal_tambah_pesanan', 'tambah-pesanan', $data);

    $this->template->views('pesanan/home', $data);
  }

  public function riwayat() {
    $data['dataPesanan'] = $this->M_pesanan->select_all_complete();
    foreach($data['dataPesanan'] as $key => $value) {
      $data['dataPesanan'][$key]->harga = $this->M_pesanan->getTotal($value->id);
    }

    $data['page'] = "riwayat";
    $data['judul'] = "Data Pesanan";
    $data['deskripsi'] = "Riwayat Pesanan";


    $this->template->views('pesanan/riwayat', $data);

  }

  public function id($id='') {
    $data['dataPesanan'] = $this->M_pesanan->select_by_id($id);

    $data['page'] = "pesanan";
    $data['judul'] = "Detail Pesanan";
    $data['deskripsi'] = "Manage Data Pesanan";

      $data['total_biaya_bb'] = $this->M_bbb->get_biaya_by_pesanan($id);
      $data['total_biaya_bp'] = $this->M_bbp->get_biaya_by_pesanan($id);
      $data['total_biaya_tkl'] = $this->M_btkl->get_biaya_by_pesanan($id) * getValueKesulitan($id);
      $data['total_biaya_overhead'] = $this->M_produksi->get_overhead_by_pesanan($id);

          $data['total_biaya'] = $data['total_biaya_bb'] + $data['total_biaya_bp'] + $data['total_biaya_tkl'] + $data['total_biaya_overhead'];

    $data['modal_tambah_produksi'] = show_my_modal('modals/modal_tambah_produksi', 'tambah-produksi', $data);

    $this->template->views('pesanan/detail', $data);
  }

  public function detail($id='') {
    $data['dataPesanan'] = $this->M_pesanan->select_by_id($id);
    $data['dataBbb'] = $this->M_bbb->select_by_pesanan($id);
    $data['dataBbp'] = $this->M_bbp->select_by_pesanan($id);
    $data['dataBtkl'] = $this->M_btkl->select_by_pesanan($id);
    $data['dataOverhead'] = $this->M_produksi->select_overhead_by_pesanan($id);

    $data['page'] = "pesanan";
    $data['judul'] = "Harga Pokok Produksi";
    $data['deskripsi'] = "Detail Harga Pokok Produksi";

      $data['total_biaya_bb'] = $this->M_bbb->get_biaya_by_pesanan($id);
      $data['total_biaya_bp'] = $this->M_bbp->get_biaya_by_pesanan($id);
      $data['total_biaya_tkl'] = $this->M_btkl->get_biaya_by_pesanan($id)  * getValueKesulitan($id);
      $data['total_biaya_overhead'] = $this->M_produksi->get_overhead_by_pesanan($id);

    $data['total_biaya'] = $data['total_biaya_bb'] + $data['total_biaya_bp'] + $data['total_biaya_tkl'] + $data['total_biaya_overhead'];

    $data['modal_tambah_produksi'] = show_my_modal('modals/modal_tambah_produksi', 'tambah-produksi', $data);

    $this->template->views('pesanan/detail_biaya', $data);
  }

  public function tampil() {
		$data['dataPesanan'] = $this->M_pesanan->select_all_uncomplete();
		$this->load->view('pesanan/list_data', $data);
	}

  	public function prosesTambah() {
  		$this->form_validation->set_rules('nama_pemesan', 'Nama', 'trim|required');
  		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
  		$this->form_validation->set_rules('no_telp', 'Nomer Telp', 'trim|required');
  		$this->form_validation->set_rules('pesanan', 'Pesanan', 'trim|required');
  		$this->form_validation->set_rules('deskripsi_pesanan', 'Deskripsi', 'trim|required');
  		$this->form_validation->set_rules('sifat_pemesanan', 'Sifat Pemesanan', 'trim|required');
  		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
  		$this->form_validation->set_rules('kesulitan', 'Kesulitan', 'trim|required');
  		$this->form_validation->set_rules('dp', 'DP', 'trim|required|numeric');

      $this->form_validation->set_message('is_unique', '%s sudah ada di database');
      $this->form_validation->set_message('required', '%s tidak boleh kosong');
      $this->form_validation->set_message('numeric', '%s hanya boleh berisi Angka 1-9');

  		$data = $this->input->post();
  		if ($this->form_validation->run() == TRUE) {
  			$result = $this->M_pesanan->insert($data);

  			if ($result > 0) {

    $this->M_report->insert_jurnal(111, $result, 'd', $data['dp']);
    $this->M_report->insert_jurnal(213, $result, 'c', $data['dp']);
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
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
    $this->form_validation->set_rules('kesulitan', 'Kesulitan', 'trim|required');
    $this->form_validation->set_rules('dp', 'DP', 'trim|required|numeric');

		$this->form_validation->set_message('is_unique', '%s sudah ada di database');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
    $this->form_validation->set_message('numeric', '%s hanya boleh berisi Angka 1-9');
    
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

  public function setSelesai() {
		$id = $_POST['id'];
		$result = $this->M_pesanan->setStatusSelesai($id);
  		if ($result > 0) {
    		$data['lengkap'] = $this->M_pesanan->select_by_id($id);
        $data['total_biaya_bb'] = $this->M_bbb->get_biaya_by_pesanan($id);
        $data['total_biaya_bp'] = $this->M_bbp->get_biaya_by_pesanan($id);
        $data['total_biaya_tkl'] = $this->M_btkl->get_biaya_by_pesanan($id) * getValueKesulitan($id);
        $data['total_biaya_overhead'] = $this->M_produksi->get_overhead_by_pesanan($id);

        $data['total_biaya'] = $data['total_biaya_bb'] + $data['total_biaya_bp'] + $data['total_biaya_tkl'] + $data['total_biaya_overhead'];

    $this->M_report->insert_jurnal(214, $id, 'd', (130*$data['total_biaya']/100));
    $this->M_report->insert_jurnal(111, $id, 'c', (130*$data['total_biaya']/100) );
    $this->M_report->insert_jurnal(213, $id, 'c',  $data['lengkap'][0]->dp );

    $this->M_report->insert_jurnal(111, $id, 'd', (130*$data['total_biaya']/100) - $data['lengkap'][0]->dp );
    $this->M_report->insert_jurnal(411, $id, 'c', (130*$data['total_biaya']/100) - $data['lengkap'][0]->dp );

    // $this->M_report->insert_jurnal(111, $id, 'd', (130*$data['total_biaya']/100) - $data['lengkap'][0]->dp );
    // $this->M_report->insert_jurnal(411, $id, 'c', (130*$data['total_biaya']/100) - $data['lengkap'][0]->dp );
  			echo show_succ_msg('Pesanan Selesai', '20px');
  		} else {
  			echo show_err_msg('Pesanan Gagal di Update', '20px');
			}


      $data['total_biaya_bb'] = $this->M_bbb->get_biaya_by_pesanan($id);
      $data['total_biaya_bp'] = $this->M_bbp->get_biaya_by_pesanan($id);
      $data['total_biaya_tkl'] = $this->M_btkl->get_biaya_by_pesanan($id) * getValueKesulitan($id);
      $data['total_biaya_overhead'] = $this->M_produksi->get_overhead_by_pesanan($id);

			$data['total_biaya'] = $data['total_biaya_bb'] + $data['total_biaya_bp'] + $data['total_biaya_tkl'] + $data['total_biaya_overhead'];

  }
  public function setProses() {
		$id = $_POST['id'];
		$result = $this->M_pesanan->setStatus($id, 1);
  		if ($result > 0) {
  			echo show_succ_msg('Pesanan Selesai', '20px');
  		} else {
  			echo show_err_msg('Pesanan Gagal di Update', '20px');
  		}
  }

}
