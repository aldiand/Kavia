<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_overhead extends CI_Model {
	public function select_all() {
    $this->db->order_by("id", "desc");
	  $this->db->where('active', 1);
		$data = $this->db->get('t_overhead');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_overhead');
		return $data->result();
  }

  public function insert($data){
    $hasil=$this->db->insert('t_overhead', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_overhead', array('active' => 0));
		$data['id'] = null;
    $hasil=$this->db->insert('t_overhead', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_overhead', array('active' => 0));
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_overhead');
		return $data->num_rows();
	}
}

/* End of file M_t_overhead.php */
/* Location: ./application/models/M_t_overhead.php */
