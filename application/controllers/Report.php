<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends AUTH_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('M_report');
        $this->load->model('M_pesanan');
        $this->load->model('M_produksi');
        $this->load->model('M_overhead');
        $this->load->model('M_bahanBaku');
        $this->load->model('M_bahanPenolong');
        $this->load->model('M_pegawai');
        $this->load->model('M_bbb');
        $this->load->model('M_bbp');
        $this->load->model('M_btkl');
        $this->load->model('M_grafik');
        $this->load->model('M_bahanMasuk');
        $this->load->model('M_bbb');
        $this->load->model('M_bp_masuk');
        $this->load->model('M_bbp');
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
    
    public function LaporanPerhitunganHargaJual() { 
        $data['dataPesanan'] = $this->M_pesanan->select_all_complete();

        $data['page'] = "Perhitungan Harga Jual";
        $data['judul'] = "Laporan Perhitungan Harga Jual";
        $data['deskripsi'] = "Lihat Pesanan";
    
    
        $this->template->views('report/laporanperhitunganhargajual', $data);
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
        $data['dataOverhead2'] = $this->M_pesanan->getOverhead($id);
    
        $data['page'] = "pesanan";

        $data['page'] = "Kartu HPP";
        $data['judul'] = "Kartu Harga Pokok Pesanan";
        $data['deskripsi'] = "Lihat HPP";
    
          $data['total_biaya_bb'] = $this->M_bbb->get_biaya_by_pesanan($id);
          $data['total_biaya_bp'] = $this->M_bbp->get_biaya_by_pesanan($id);
          $data['total_biaya_tkl'] = $this->M_btkl->get_biaya_by_pesanan($id);
          $data['total_biaya_overhead'] = $this->M_produksi->get_overhead_by_pesanan($id);
    
        $data['total_biaya'] = $data['total_biaya_bb'] + $data['total_biaya_bp'] + $data['total_biaya_tkl'] + $data['total_biaya_overhead'];
    
        $this->template->views('report/lihatkartuhpp', $data);

    }

    public function LihatLaporanPerhitunganHargaJual($id){ 
        $data['dataPesanan'] = $this->M_pesanan->select_by_id($id);
        $data['dataBbb'] = $this->M_bbb->select_by_pesanan($id);
        $data['dataBbp'] = $this->M_bbp->select_by_pesanan($id);
        $data['dataBtkl'] = $this->M_btkl->select_by_pesanan($id);
        $data['dataOverhead'] = $this->M_produksi->select_overhead_by_pesanan($id);
        $data['dataOverhead2'] = $this->M_pesanan->getOverhead($id);

        $data['page'] = "Perhitungan Harga Jual";
        $data['judul'] = "Laporan Perhitungan Harga Jual";
        $data['deskripsi'] = "";
    
          $data['total_biaya_bb'] = $this->M_bbb->get_biaya_by_pesanan($id);
          $data['total_biaya_bp'] = $this->M_bbp->get_biaya_by_pesanan($id);
          $data['total_biaya_tkl'] = $this->M_btkl->get_biaya_by_pesanan($id);
          $data['total_biaya_overhead'] = $this->M_produksi->get_overhead_by_pesanan($id);
    
        $data['total_biaya'] = $data['total_biaya_bb'] + $data['total_biaya_bp'] + $data['total_biaya_tkl'] + $data['total_biaya_overhead'];
    
        $this->template->views('report/lihatlaporanperhitunganhargajual', $data);

    }

    public function Bahan() {

        $data['page'] = "report bahan";
        $data['judul'] = "Laporan Bahan";
        $data['deskripsi'] = "Laporan Data Bahan";
        $data['modal_grafik_bahan'] = show_my_modal('modals/modal_grafik_bahan', 'info-grafik', $data);

        $this->template->views('report/bahan.php', $data);
    }

    public function Penjualan() {
            
        $data['page'] = "Report Penjualan";
        $data['judul'] = "Laporan Penjualan";
        $data['deskripsi'] = "Laporan Data Penjualan";
        
        $this->template->views('report/penjualan.php', $data);
    }
    public function view_penjualan() {
        if(!empty($_POST['bulan']) && !empty($_POST['tahun'])) {
            $data['bulan_ke'] = $_POST['bulan'];
            $data['tahun_ke'] = $_POST['tahun'];
            $data['dataPesanan'] = $this->M_pesanan->select_by_month_year($_POST['bulan'], $_POST['tahun']);
        } else if (!empty($_POST['bulan'])) {
            $data['bulan_ke'] = $_POST['bulan'];
            $data['dataPesanan'] = $this->M_pesanan->select_by_month($_POST['bulan']);
        } else if (!empty($_POST['tahun'])) {
            $data['tahun_ke'] = $_POST['tahun'];
            $data['dataPesanan'] = $this->M_pesanan->select_by_year($_POST['tahun']);
        }
        $data['page'] = "Report Penjualan";
        $data['judul'] = "Laporan Penjualan";
        $data['deskripsi'] = "Laporan Data Penjualan";

        $this->template->views('report/penjualan.php', $data);
    }

     public function tampilBb() {
		$data['dataBahanBaku'] = $this->M_bahanBaku->select_all_with_unactive();
		$this->load->view('report/list_data_bb', $data);
	}

      public function tampilBp() {
		$data['dataBahanPenolong'] = $this->M_bahanPenolong->select_all_with_unactive();
		$this->load->view('report/list_data_bp', $data);
    }
    
    public function reportBb($id) {

        $data['dataChart'] = $this->getGrafikBbData($id, Date('Y'));

        $data['page'] = "report bahan";
        $data['judul'] = "Laporan Bahan";
        $data['deskripsi'] = "Laporan Data Bahan Baku";

        $data['dataBahanMasuk'] = $this->M_bahanMasuk->select_by_id_bbb($id);
        $data['dataBbb'] = $this->M_bbb->select_by_id_bbb($id);
        
        $data['dataBahan'] = $this->M_bahanBaku->select_by_id($id);

        $this->template->views('report/bahanBaku_detail', $data);
    }

    public function reportBp($id) {        
        $data['dataChart'] = $this->getGrafikBpData($id, Date('Y'));

        $data['page'] = "report bahan";
        $data['judul'] = "Laporan Bahan";
        $data['deskripsi'] = "Laporan Data Bahan Penolong";

        $data['dataBahanMasuk'] = $this->M_bp_masuk->select_by_id_bahan($id);
        $data['dataBbp'] = $this->M_bbp->select_by_id_bahan($id);

        $data['dataBahan'] = $this->M_bahanPenolong->select_by_id($id);

        $this->template->views('report/bahanPenolong_detail', $data);
    }

    public function getGrafikBbData ($id, $year) {
        foreach($this->M_grafik->grafikBbMasuk($id,$year) as $row)
            {
            $data['grafikMasuk'][]=(float)$row['Januari'];
            $data['grafikMasuk'][]=(float)$row['Februari'];
            $data['grafikMasuk'][]=(float)$row['Maret'];
            $data['grafikMasuk'][]=(float)$row['April'];
            $data['grafikMasuk'][]=(float)$row['Mei'];
            $data['grafikMasuk'][]=(float)$row['Juni'];
            $data['grafikMasuk'][]=(float)$row['Juli'];
            $data['grafikMasuk'][]=(float)$row['Agustus'];
            $data['grafikMasuk'][]=(float)$row['September'];
            $data['grafikMasuk'][]=(float)$row['Oktober'];
            $data['grafikMasuk'][]=(float)$row['November'];
            $data['grafikMasuk'][]=(float)$row['Desember'];
        }
        foreach($this->M_grafik->grafikBbKeluar($id,$year) as $row)
            {
            $data['grafikKeluar'][]=(float)$row['Januari'];
            $data['grafikKeluar'][]=(float)$row['Februari'];
            $data['grafikKeluar'][]=(float)$row['Maret'];
            $data['grafikKeluar'][]=(float)$row['April'];
            $data['grafikKeluar'][]=(float)$row['Mei'];
            $data['grafikKeluar'][]=(float)$row['Juni'];
            $data['grafikKeluar'][]=(float)$row['Juli'];
            $data['grafikKeluar'][]=(float)$row['Agustus'];
            $data['grafikKeluar'][]=(float)$row['September'];
            $data['grafikKeluar'][]=(float)$row['Oktober'];
            $data['grafikKeluar'][]=(float)$row['November'];
            $data['grafikKeluar'][]=(float)$row['Desember'];
        }
        $json =  json_encode($data);
        if($this->input->method()=="post"){
            echo($json);
        }
        return $json;
    }
    
    public function getGrafikBpData ($id, $year) {
        foreach($this->M_grafik->grafikBpMasuk($id,$year) as $row)
            {
            $data['grafikMasuk'][]=(float)$row['Januari'];
            $data['grafikMasuk'][]=(float)$row['Februari'];
            $data['grafikMasuk'][]=(float)$row['Maret'];
            $data['grafikMasuk'][]=(float)$row['April'];
            $data['grafikMasuk'][]=(float)$row['Mei'];
            $data['grafikMasuk'][]=(float)$row['Juni'];
            $data['grafikMasuk'][]=(float)$row['Juli'];
            $data['grafikMasuk'][]=(float)$row['Agustus'];
            $data['grafikMasuk'][]=(float)$row['September'];
            $data['grafikMasuk'][]=(float)$row['Oktober'];
            $data['grafikMasuk'][]=(float)$row['November'];
            $data['grafikMasuk'][]=(float)$row['Desember'];
        }
        foreach($this->M_grafik->grafikBpKeluar($id,$year) as $row)
            {
            $data['grafikKeluar'][]=(float)$row['Januari'];
            $data['grafikKeluar'][]=(float)$row['Februari'];
            $data['grafikKeluar'][]=(float)$row['Maret'];
            $data['grafikKeluar'][]=(float)$row['April'];
            $data['grafikKeluar'][]=(float)$row['Mei'];
            $data['grafikKeluar'][]=(float)$row['Juni'];
            $data['grafikKeluar'][]=(float)$row['Juli'];
            $data['grafikKeluar'][]=(float)$row['Agustus'];
            $data['grafikKeluar'][]=(float)$row['September'];
            $data['grafikKeluar'][]=(float)$row['Oktober'];
            $data['grafikKeluar'][]=(float)$row['November'];
            $data['grafikKeluar'][]=(float)$row['Desember'];
        }
        $json =  json_encode($data);
        if($this->input->method()=="post"){
            echo($json);
        }
        return $json;
    }

    public function HPProduksi() {
		$data['wip_awal'] = 0;
		$data['bb_akhir'] = ($result = $this->M_report->bb_akhir()) ? $result:0;
		$data['bb_pembelian'] =  ($result = $this->M_report->bb_pembelian()) ? $result:0;
		$data['total_bb'] =  ($result =$this->M_report->total_bb()) ? $result:0;
		$data['bb_jumlah'] = $data['bb_akhir'] + $data['total_bb'];
		$data['bb_awal'] = $data['bb_jumlah'] - $data['bb_pembelian'];
		
        $data['bp_akhir'] = ($result = $this->M_report->bp_akhir()) ? $result:0;
		$data['bp_pembelian'] = ($result = $this->M_report->bp_pembelian()) ? $result:0;
        $data['total_bp'] = ($result = $this->M_report->total_bp()) ? $result:0;
		$data['bp_jumlah'] = $data['bp_akhir'] + $data['total_bp'];
		$data['bp_awal'] = $data['bp_jumlah'] - $data['bp_pembelian'];
        
        $data['btkl_perproject'] = ($result = $this->M_report->btkl_perproject()) ? $result:0;
		$data['btkl_perpesanan'] = ($result = $this->M_report->btkl_perpesanan()) ? $result:0;
		$data['total_btkl'] = $data['btkl_perproject'] + $data['btkl_perpesanan'];
        
        $data['btktl'] = ($result = $this->M_report->btktl()) ? $result:0;
		$data['beban_listrik'] = ($result = $this->M_report->beban_listrik()) ? $result:0;
		$data['total_bop'] = $data['btktl'] + $data['beban_listrik'];
        
		$data['total_biaya'] = $data['total_bop'] + $data['total_bp'] + $data['total_bb'] + $data['total_btkl'];
        $data['wip_akhir'] = 0;
		$data['HPProduksi'] = $data['total_biaya'] + $data['wip_awal'] - $data['wip_akhir'];
        //var_dump($data);
        $this->template->views('report/HPProduksi', $data);
    }

    public function HPPenjualan() {
        $data['penjualan'] = ($result = $this->M_report->penjualan()) ? $result:0;
        $data['wip_awal'] = 0;
		$data['bb_akhir'] = ($result = $this->M_report->bb_akhir()) ? $result:0;
		$data['bb_pembelian'] =  ($result = $this->M_report->bb_pembelian()) ? $result:0;
		$data['total_bb'] =  ($result =$this->M_report->total_bb()) ? $result:0;
		$data['bb_jumlah'] = $data['bb_akhir'] + $data['total_bb'];
		$data['bb_awal'] = $data['bb_jumlah'] - $data['bb_pembelian'];
		
        $data['bp_akhir'] = ($result = $this->M_report->bp_akhir()) ? $result:0;
		$data['bp_pembelian'] = ($result = $this->M_report->bp_pembelian()) ? $result:0;
        $data['total_bp'] = ($result = $this->M_report->total_bp()) ? $result:0;
		$data['bp_jumlah'] = $data['bp_akhir'] + $data['total_bp'];
		$data['bp_awal'] = $data['bp_jumlah'] - $data['bp_pembelian'];
        
        $data['btkl_perproject'] = ($result = $this->M_report->btkl_perproject()) ? $result:0;
		$data['btkl_perpesanan'] = ($result = $this->M_report->btkl_perpesanan()) ? $result:0;
		$data['total_btkl'] = $data['btkl_perproject'] + $data['btkl_perpesanan'];
        
        $data['btktl'] = ($result = $this->M_report->btktl()) ? $result:0;
		$data['beban_listrik'] = ($result = $this->M_report->beban_listrik()) ? $result:0;
		$data['total_bop'] = $data['btktl'] + $data['beban_listrik'];
        
		$data['total_biaya'] = $data['total_bop'] + $data['total_bp'] + $data['total_bb'] + $data['total_btkl'];
        $data['wip_akhir'] = 0;
		$data['HPProduksi'] = $data['total_biaya'] + $data['wip_awal'] - $data['wip_akhir'];
        
        $data['fg_awal'] = 0;
        $data['fg_akhir'] = 0;
        $data['HPPenjualan'] = $data['penjualan'] - $data['HPProduksi'] + $data['fg_awal'] - $data['fg_akhir'];

        $this->template->views('report/HPPenjualan', $data);
    }

    public function labarugi() {
        $data['wip_awal'] = 0;
		$data['bb_akhir'] = ($result = $this->M_report->bb_akhir()) ? $result:0;
		$data['bb_pembelian'] =  ($result = $this->M_report->bb_pembelian()) ? $result:0;
		$data['total_bb'] =  ($result =$this->M_report->total_bb()) ? $result:0;
		$data['bb_jumlah'] = $data['bb_akhir'] + $data['total_bb'];
		$data['bb_awal'] = $data['bb_jumlah'] - $data['bb_pembelian'];
		
        $data['bp_akhir'] = ($result = $this->M_report->bp_akhir()) ? $result:0;
		$data['bp_pembelian'] = ($result = $this->M_report->bp_pembelian()) ? $result:0;
        $data['total_bp'] = ($result = $this->M_report->total_bp()) ? $result:0;
		$data['bp_jumlah'] = $data['bp_akhir'] + $data['total_bp'];
		$data['bp_awal'] = $data['bp_jumlah'] - $data['bp_pembelian'];
        
        $data['btkl_perproject'] = ($result = $this->M_report->btkl_perproject()) ? $result:0;
		$data['btkl_perpesanan'] = ($result = $this->M_report->btkl_perpesanan()) ? $result:0;
		$data['total_btkl'] = $data['btkl_perproject'] + $data['btkl_perpesanan'];
        
        $data['btktl'] = ($result = $this->M_report->btktl()) ? $result:0;
		$data['beban_listrik'] = ($result = $this->M_report->beban_listrik()) ? $result:0;
		$data['total_bop'] = $data['btktl'] + $data['beban_listrik'];
        
		$data['total_biaya'] = $data['total_bop'] + $data['total_bp'] + $data['total_bb'] + $data['total_btkl'];
        $data['wip_akhir'] = 0;
		$data['HPProduksi'] = $data['total_biaya'] + $data['wip_awal'] - $data['wip_akhir'];
        
        $data['fg_awal'] = 0;
        $data['fg_akhir'] = 0;
        $data['penjualan'] = ($result = $this->M_report->penjualan()) ? $result:0;
        $data['HPPenjualan'] = $data['HPProduksi'] + $data['fg_awal'] - $data['fg_akhir'];
        $data['laba_kotor'] = $data['penjualan'] - $data['HPPenjualan'] ;

        $this->template->views('report/labarugi', $data);
    }
}
