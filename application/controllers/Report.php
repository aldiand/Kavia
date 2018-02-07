<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends AUTH_Controller {
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
	}

	public function index() {
		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Hello World";
		$this->template->views('home', $data);
    }
    
    public function KartuHPP() { 
        $data['dataPesanan'] = $this->M_pesanan->select_all_complete();

        $data['page'] = "Kartu HPP";
        $data['judul'] = "Kartu Harga Pokok Pesanan";
        $data['deskripsi'] = "Lihat Pesanan";
    
    
        $this->template->views('report/kartuhpp', $data);
    }

    public function Jurnal() { 
        $data['page'] = "jurnal";
        $data['judul'] = "Jurnal";
        $data['deskripsi'] = "";  

        $this->template->views('report/jurnal', $data);
    }

    public function LihatKartuHPP($id){ 
        $data['dataPesanan'] = $this->M_pesanan->select_by_id($id);
        $data['dataBbb'] = $this->M_bbb->select_by_pesanan($id);
        $data['dataBbp'] = $this->M_bbp->select_by_pesanan($id);
        $data['dataBtkl'] = $this->M_btkl->select_by_pesanan($id);
        $data['dataOverhead'] = $this->M_produksi->select_overhead_by_pesanan($id);
    
        $data['page'] = "pesanan";

        $data['page'] = "Kartu HPP";
        $data['judul'] = "Kartu Harga Pokok Pesanan";
        $data['deskripsi'] = "Lihat HPP";
    
          $data['total_biaya_bb'] = $this->M_bbb->get_biaya_by_pesanan($id);
          $data['total_biaya_bp'] = $this->M_bbp->get_biaya_by_pesanan($id);
          $data['total_biaya_tkl'] = $this->M_btkl->get_biaya_by_pesanan($id) * getValueKesulitan($id);
          $data['total_biaya_overhead'] = $this->M_produksi->get_overhead_by_pesanan($id);
    
        $data['total_biaya'] = $data['total_biaya_bb'] + $data['total_biaya_bp'] + $data['total_biaya_tkl'] + $data['total_biaya_overhead'];
    
        $this->template->views('report/lihatkartuhpp', $data);

    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
