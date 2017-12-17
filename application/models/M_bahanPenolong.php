<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahanPenolong extends CI_Model {
	public function select_all() {
		$data = $this->db->get('t_bahan_penolong');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_bahan_penolong');
		return $data->result();
  }

  public function insert($data){
    $hasil=$this->db->insert('t_bahan_penolong', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_bahan_penolong', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_bahan_penolong');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_bahan_penolong');
		return $data->num_rows();
	}
}
