<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {
	public function select_all() {
    $this->db->order_by("id", "desc");
		$data = $this->db->get('t_pegawai');
		return $data->result();
	}

	public function select_all_btkl() {
		$this->db->where('tipe_gaji', 'btkl');
		$data = $this->db->get('t_pegawai');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_pegawai');
		return $data->result();
  }

  public function insert($data){
    $hasil=$this->db->insert('t_pegawai', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_pegawai', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_pegawai');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_pegawai');
		return $data->num_rows();
	}
}

/* End of file M_t_pegawai.php */
/* Location: ./application/models/M_t_pegawai.php */
