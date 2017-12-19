<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bb_masuk extends CI_Model {
	public function select_all() {
		$data = $this->db->get('t_bb_masukk');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_bb_masukk');
		return $data->result();
  }

  public function insert($data){
    $hasil=$this->db->insert('t_bb_masukk', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_bb_masukk', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_bb_masukk');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_bb_masukk');
		return $data->num_rows();
	}
}