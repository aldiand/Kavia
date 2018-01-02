<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahanBaku extends CI_Model {
	public function select_all() {
		$data = $this->db->get('t_bbb');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_bbb');
		return $data->result();
  }

	public function get_stok_by_id($id) {
		$this->db->select('jumlah');
    $this->db->where("id","$id");
		$data = $this->db->get('t_bbb')->result();
		return $data[0]->jumlah;
	}

  public function insert($data){
    $hasil=$this->db->insert('t_bbb', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_bbb', $data);
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
    $hasil=$this->db->delete('t_bbb');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_bbb');
		return $data->num_rows();
	}
}
