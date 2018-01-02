<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahanMasuk extends CI_Model {
	public function select_all() {
		$this->db->select('t_bb_masuk.*, t_bbb.nama_bahan_baku');
		$this->db->from('t_bb_masuk');
		$this->db->join('t_bbb', 't_bbb.id = t_bb_masuk.id_bbb');
    $this->db->order_by("t_bb_masuk.id", "desc");
		$data = $this->db->get();
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_bb_masuk');
		return $data->result();
  }

  public function insert($data){
    $hasil=$this->db->insert('t_bb_masuk', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_bb_masuk', $data);
    return $hasil;
  }

	public function tambahStok($id, $jumlah) {
		$this->db->where('id', $id);
    $this->db->set('jumlah', "jumlah+$jumlah", FALSE);
    $hasil=$this->db->update('t_bbb');
    return $hasil;
	}

	public function pakaiStok($id, $jumlah) {
		$this->db->where('id', $id);
    $this->db->set('jumlah', "jumlah-$jumlah", FALSE);
    $hasil=$this->db->update('t_bbb');
    return $hasil;
	}

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_bb_masuk');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_bb_masuk');
		return $data->num_rows();
	}
}
