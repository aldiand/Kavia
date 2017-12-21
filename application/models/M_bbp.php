<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bbp extends CI_Model {
	public function select_all() {
		$data = $this->db->get('t_biaya_bahan_penolong');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_biaya_bahan_penolong');
		return $data->result();
  }

  public function select_by_produksi($id_produksi) {
			$this->db->select('t_biaya_bahan_penolong.*, t_bahan_penolong.nama, (t_biaya_bahan_penolong.jumlah*t_bahan_penolong.harga) AS harga');
		$this->db->from('t_biaya_bahan_penolong');
		$this->db->join('t_bahan_penolong', 't_bahan_penolong.id = t_biaya_bahan_penolong.id_bahan_penolong');
    $this->db->where('id_produksi', $id_produksi);
		$data = $this->db->get();
		return $data->result();
  }

	public function get_biaya_by_produksi($id_produksi) {
		$this->db->select("SUM(t_biaya_bahan_penolong.jumlah*t_bahan_penolong.harga) AS hasil");
		$this->db->from('t_biaya_bahan_penolong');
		$this->db->join('t_bahan_penolong', 't_bahan_penolong.id = t_biaya_bahan_penolong.id_bahan_penolong');
    $this->db->where('id_produksi', $id_produksi);
		$data = $this->db->get()->result();
		return $data[0]->hasil;
	}

	public function get_biaya_by_pesanan($id_pesanan) {
		$this->db->select("SUM(t_biaya_bahan_penolong.jumlah*t_bahan_penolong.harga) AS hasil");
		$this->db->from('t_biaya_bahan_penolong');
		$this->db->join('t_bahan_penolong', 't_bahan_penolong.id = t_biaya_bahan_penolong.id_bahan_penolong');
    $this->db->where_in("t_biaya_bahan_penolong.id_produksi","SELECT id AS id_produksi from t_produksi where id_pesanan=$id_pesanan", false);
		$data = $this->db->get()->result();
		return $data[0]->hasil;
	}

  public function insert($data){
    $hasil=$this->db->insert('t_biaya_bahan_penolong', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_biaya_bahan_penolong', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_biaya_bahan_penolong');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_biaya_bahan_penolong');
		return $data->num_rows();
	}
}
