<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bbb extends CI_Model {
	public function select_all() {
		$data = $this->db->get('t_bb_terpakai');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_bb_terpakai');
		return $data->result();
  }

  public function select_by_produksi($id_produksi) {
		$this->db->select('t_bb_terpakai.*, t_bbb.nama_bahan_baku');
		$this->db->from('t_bb_terpakai');
		$this->db->join('t_bbb', 't_bbb.id = t_bb_terpakai.id');
    $this->db->where('id_produksi', $id_produksi);
		$data = $this->db->get();
		return $data->result();
  }

	public function get_biaya_by_produksi($id_produksi) {
		$this->db->select("SUM(t_bb_terpakai.jumlah*t_bbb.harga) AS hasil");
		$this->db->from('t_bb_terpakai');
		$this->db->join('t_bbb', 't_bbb.id = t_bb_terpakai.id');
    $this->db->where('id_produksi', $id_produksi);
		$data = $this->db->get()->result();
		return $data[0]->hasil;
	}

	public function get_biaya_by_pesanan($id_pesanan) {
		$this->db->select("sum(t_bb_terpakai.jumlah*t_bbb.harga) AS hasil");
		$this->db->from('t_bb_terpakai');
		$this->db->join('t_bbb', 't_bbb.id = t_bb_terpakai.id');
    $this->db->where_in("t_bb_terpakai.id_produksi","SELECT id AS id_produksi from t_produksi where id_pesanan=$id_pesanan", false);
		$data = $this->db->get()->result();
		return $data[0]->hasil;
	}

  public function insert($data){
    $hasil=$this->db->insert('t_bb_terpakai', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_bb_terpakai', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_bb_terpakai');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_bb_terpakai');
		return $data->num_rows();
	}
}
