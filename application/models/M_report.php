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
		$this->db->order_by('reff');
		$this->db->order_by('kode_akun');
		$query = $this->db->get();
		return $query->result_array();
	}
}
