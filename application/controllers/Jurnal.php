<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends AUTH_Controller {
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
        $this->load->model('M_coa');
        $this->load->model('M_report');
	}

	public function index() {
		$data['page'] 			= "jurnal";
		$data['judul'] 			= "Jurnal";
		$data['deskripsi'] 		= "Pilih waktu jurnal";
		$this->template->views('jurnal/home', $data);
    }
    
    public function view_jurnal() {
		$data['page'] 			= "jurnal";
		$data['judul'] 			= "Jurnal";
        $data['deskripsi'] 		= "Pilih waktu jurnal";
        $data['jurnal'] = $this->M_report->get_jurnal_by_period($_POST['bulan'], $_POST['tahun']);
		$this->template->views('jurnal/home', $data);

    }

    public function bukuBesar() { 
      $data['page'] 			= "Buku Besar";
      $data['judul'] 			= "Buku Besar";
      $data['deskripsi'] 		= "Pilih buku besar";
      $data['akun'] = $this->M_coa->select_all();
		$this->template->views('jurnal/bukubesar', $data);
    }

    public function view_bukuBesar(){
      $data['page'] 			= "Buku Besar";
      $data['judul'] 			= "Buku Besar";
      $data['deskripsi'] 		= "Pilih buku besar";
			$no_akun = $_POST['no_akun'];
      $data['akun'] = $this->M_coa->select_all();
      $data['dataakun'] = $this->M_coa->select_by_id($no_akun);
      $data['jurnal'] = $this->M_report->GetDataBukuBesarPeriod($no_akun,$_POST['bulan'], $_POST['tahun']);      
      $data['saldo_awal'] = $this->M_report->get_saldo_awal($no_akun,$_POST['bulan'], $_POST['tahun']);      
      $this->template->views('jurnal/bukubesar', $data);
    }
}