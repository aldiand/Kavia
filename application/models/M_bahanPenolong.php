<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahanPenolong extends CI_Model {
	public function select_all() {
    $this->db->order_by("id", "desc");
	  $this->db->where('active', 1);
		$data = $this->db->get('t_bahan_penolong');
		return $data->result();
	}

	public function select_all_with_unactive() {
    $this->db->order_by("id", "desc");
		$data = $this->db->get('t_bahan_penolong');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_bahan_penolong');
		return $data->result();
  }

	public function get_stok_by_id($id) {
		$this->db->select('jumlah');
    $this->db->where("id","$id");
		$data = $this->db->get('t_bahan_penolong')->result();
		return $data[0]->jumlah;
  }

	public function get_harga_by_id($id) {
		$this->db->select('harga');
    $this->db->where("id","$id");
		$data = $this->db->get('t_bahan_penolong')->result();
		return $data[0]->harga;
  }

  public function insert($data){
		$hasil=$this->db->insert('t_bahan_penolong', $data);
		$insert_id = $this->db->insert_id();
		$data['sid'] = 'BP'.$insert_id;
		$this->db->where('id', $insert_id);
		$this->db->update('t_bahan_penolong', $data);
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

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_bahan_penolong', array('active' => 0, 'last_active' => Date('Y-m-d')));
		$data['id'] = null;
    $hasil=$this->db->insert('t_bahan_penolong', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_bahan_penolong', array('active' => 0, 'last_active' => Date('Y-m-d')));
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_bahan_penolong');
		return $data->num_rows();
	}
}
