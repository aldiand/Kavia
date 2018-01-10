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
}