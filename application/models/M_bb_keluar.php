<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bb_keluar extends CI_Model {
	public function select_all() {
    $this->db->order_by("id", "desc");
		$data = $this->db->get('t_bb_keluar');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_bb_keluar');
		return $data->result();
  }

  public function select_by_id_bbb($id){
    $this->db->where('id_bbb', $id);
    $this->db->order_by("id", "desc");
		$data = $this->db->get('t_bb_keluar');
		return $data->result();
  }

  public function select_by_produksi($id_produksi) {
    $this->db->where('id_produksi', $id_produksi);
		$data = $this->db->get('t_bb_keluar');
		return $data->result();
  }

  public function get_biaya_by_produksi($id_produksi) {
    
  }

  public function insert($data){
    $hasil=$this->db->insert('t_bb_keluar', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_bb_keluar', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_bb_keluar');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_bb_keluar');
		return $data->num_rows();
	}
}
