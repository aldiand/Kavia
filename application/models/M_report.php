<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_report extends CI_Model {
    public function get_jurnal() {
        $this->db->order_by("id", "desc");
		$data = $this->db->get('t_jurnal');
		return $data->result();
    }

    public function insert_jurnal($kode_akun, $reff, $posisi, $nominal) {
		$jurnal = array(
			'kode_akun' => $kode_akun,
			'reff' => $reff,
			'tanggal' => date('Y-m-d'),
			'posisi' => $posisi,
			'nominal' => $nominal,
			);
		$this->db->insert('t_jurnal',$jurnal);
	}

	public function get_jurnal_by_date($tgl_awal, $tgl_akhir) {
		$this->db->where('tanggal >=', $tgl_awal);
		$this->db->where('tanggal <=', $tgl_akhir);
		$this->db->select('a.kode_akun, tanggal, reff, nama, a.posisi, nominal');
		$this->db->from('t_jurnal a');
		$this->db->join('t_coa b', 'b.kode = a.kode_akun');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function get_jurnal_by_period($month, $year) {
		$this->db->where("YEAR(tanggal)", $year);
		$this->db->where("MONTH(tanggal)", $month);
		$this->db->select('a.kode_akun, tanggal, reff, nama, a.posisi, nominal');
		$this->db->from('t_jurnal a');
		$this->db->join('t_coa b', 'b.kode = a.kode_akun');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function get_buku_besar($kode_akun){
		$this->db->where('a.kode_akun', $kode_akun);
		$this->db->select('a.kode_akun, nama, reff, tanggal, a.posisi, nominal');
		$this->db->from('t_jurnal a');
		$this->db->join('t_coa b', 'b.kode_akun = a.kode_akun');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function GetDataBukuBesar ($no_akun,$tgl_awal, $tgl_akhir)
	{
		$this->db->where('tanggal >=', $tgl_awal);
		$this->db->where('tanggal <=', $tgl_akhir);
		$this->db->where('a.kode_akun', $no_akun);
		$this->db->select('a.kode_akun, reff, tanggal, nama, a.posisi, nominal');
		$this->db->from('t_jurnal a');
		$this->db->join('t_coa b', 'b.kode = a.kode_akun');
		$this->db->order_by('tanggal');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function bb_akhir() {
		$this->db->select('SUM(jumlah*harga) as total', false);
		$this->db->where('active', 1);
		$data = $this->db->get('t_bbb')->result();
		return $data[0]->total;
	}

	public function bb_pembelian() {
		$this->db->select('SUM(jumlah*harga_beli) as total', false);
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-m'));
		$data = $this->db->get('t_bb_masuk')->result();
		return $data[0]->total;
	}

	public function total_bb() {
		$this->db->select("sum(t_bb_terpakai.jumlah*t_bbb.harga) AS total");
		$this->db->from('t_bb_terpakai');
		$this->db->join('t_bbb', 't_bbb.id = t_bb_terpakai.id_bbb');
		$this->db->where("DATE_FORMAT(t_bb_terpakai.tanggal,'%Y-%m')", date('Y-m'));
		$data = $this->db->get()->result();
		return $data[0]->total;
	}

	public function bp_akhir() {
		$this->db->select('SUM(jumlah*harga) as total', false);
		$this->db->where('active', 1);
		$data = $this->db->get('t_bahan_penolong')->result();
		return $data[0]->total;
	}

	public function bp_pembelian() {
		$this->db->select('SUM(jumlah*harga_beli) as total', false);
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-m'));
		$data = $this->db->get('t_bp_masuk')->result();
		return $data[0]->total;
	}

	public function total_bp() {
		$this->db->select("sum(t_biaya_bahan_penolong.jumlah*t_bahan_penolong.harga) AS total");
		$this->db->from('t_biaya_bahan_penolong');
		$this->db->join('t_bahan_penolong', 't_bahan_penolong.id = t_biaya_bahan_penolong.id_bahan_penolong');
		$this->db->where("DATE_FORMAT(t_biaya_bahan_penolong.tanggal,'%Y-%m')", date('Y-m'));
		$data = $this->db->get()->result();
		return $data[0]->total;
	}

	public function btkl_perproject() {
		$this->db->select('SUM(t_pegawai.gaji) AS biaya');
		$this->db->from('t_btkl');
		$this->db->join('t_pegawai', 't_pegawai.id = t_btkl.id_pegawai');
		$this->db->where("DATE_FORMAT(t_btkl.tanggal,'%Y-%m')", date('Y-m'));
		$this->db->where("t_pegawai.tipe_gaji", 'perproject');
		$data = $this->db->get()->result();
		return $data[0]->biaya;
	}

	public function btkl_perpesanan() {
		$this->db->select('SUM(t_pegawai.gaji) AS biaya');
		$this->db->from('t_btkl');
		$this->db->join('t_pegawai', 't_pegawai.id = t_btkl.id_pegawai');
		$this->db->where("DATE_FORMAT(t_btkl.tanggal,'%Y-%m')", date('Y-m'));
		$this->db->where("t_pegawai.tipe_gaji", 'perpesanan');
		$data = $this->db->get()->result();
		return $data[0]->biaya;
	}

	public function btktl() {
		$this->db->select('sum(nominal) as total');
		$this->db->where("kode_akun", '515');
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-m'));
		$data = $this->db->get('t_jurnal')->result();
		return $data[0]->total;
	}

	public function beban_listrik() {
		$this->db->select('SUM(harga_per_bulan) as total', false);
		$this->db->where('active', 1);
		$data = $this->db->get('t_overhead')->result();
		return $data[0]->total;
	}

	public function penjualan() {
		$this->db->select('sum(nominal) as total');
		$this->db->where("kode_akun", '411');
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-m'));
		$data = $this->db->get('t_jurnal')->result();
		return $data[0]->total;
	}
}
