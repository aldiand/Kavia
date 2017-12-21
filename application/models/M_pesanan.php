<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan extends CI_Model {
	public function select_all() {
		$data = $this->db->get('t_pesanan');
		return $data->result();
	}
	public function select_all_uncomplete() {
    $this->db->where('status !=', 2);
		$data = $this->db->get('t_pesanan');
		return $data->result();
	}

	public function select_all_complete() {
		$this->db->where('status', 2);
		$data = $this->db->get('t_pesanan');
		return $data->result();
	}

  public function select_by_status($status){
    $this->db->where('status', $status);
		$data = $this->db->get('t_pesanan');
		return $data->result();
  }

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_pesanan');
		return $data->result();
  }

  public function insert($data){
    $hasil=$this->db->insert('t_pesanan', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_pesanan', $data);
    return $hasil;
  }

	public function setStatus($id, $status) {
		$this->db->where('id', $id);
		$data =  array('status' => $status);
		$hasil=$this->db->update('t_pesanan', $data);
    return $hasil;
	}

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_pesanan');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_pesanan');
		return $data->num_rows();
	}
}
