<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bp_Masuk extends CI_Model {
	public function select_all() {
		$this->db->select('t_bp_masuk.*, t_bahan_penolong.nama');
		$this->db->from('t_bp_masuk');
		$this->db->join('t_bahan_penolong', 't_bahan_penolong.id = t_bp_masuk.id_bahan_penolong');
    $this->db->order_by("t_bp_masuk.id", "desc");
		$data = $this->db->get();
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_bp_masuk');
		return $data->result();
  }

  public function select_by_id_bahan($id){
    $this->db->where('id_bahan_penolong', $id);
    $this->db->order_by("t_bp_masuk.id", "desc");
		$data = $this->db->get('t_bp_masuk');
		return $data->result();
  }

  public function insert($data){
    $this->db->insert('t_bp_masuk', $data);
    $hasil=$this->db->insert_id();
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_bp_masuk', $data);
    return $hasil;
  }

	public function tambahStok($id, $jumlah) {
		$this->db->where('id', $id);
    $this->db->set('jumlah', "jumlah+$jumlah", FALSE);
    $hasil=$this->db->update('t_bahan_penolong');
    return $hasil;
	}

	public function pakaiStok($id, $jumlah) {
		$this->db->where('id', $id);
    $this->db->set('jumlah', "jumlah-$jumlah", FALSE);
    $hasil=$this->db->update('t_bahan_penolong');
    return $hasil;
	}

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_bp_masuk');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_bp_masuk');
		return $data->num_rows();
	}
}
