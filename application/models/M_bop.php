<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bop extends CI_Model {
	public function select_all() {
    $this->db->order_by("id", "desc");
		$data = $this->db->get('t_bop');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_bop');
		return $data->result();
  }

  public function select_by_produksi($id_produksi) {
    $this->db->where('id_produksi', $id_produksi);
		$data = $this->db->get('t_bop');
		return $data->result();
  }

  public function insert($data){
    $hasil=$this->db->insert('t_bop', $data);
		$insert_id = $this->db->insert_id();
		$data['sid'] = 'BOP'.$insert_id;
		$this->db->where('id', $insert_id);
		$this->db->update('t_bop', $data);
    return $hasil;
  }


  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_bop', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_bop');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_bop');
		return $data->num_rows();
	}
}
