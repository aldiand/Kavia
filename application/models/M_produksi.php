<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produksi extends CI_Model {
	public function select_all() {
		$data = $this->db->get('t_produksi');
		return $data->result();
	}
	public function select_all_uncomplete() {
    $this->db->where('status !=', 2);
		$data = $this->db->get('t_produksi');
		return $data->result();
	}

	public function select_all_complete() {
		$this->db->where('status', 2);
		$data = $this->db->get('t_produksi');
		return $data->result();
	}

  public function select_by_status($status){
    $this->db->where('status', $status);
		$data = $this->db->get('t_produksi');
		return $data->result();
  }

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_produksi');
		return $data->result();
  }

	public function select_by_pesanan($id_pesanan) {
		$this->db->where('id_pesanan', $id_pesanan);
		$data = $this->db->get('t_produksi');
		return $data->result();
	}

	public function select_count_status_by_pesanan($id_pesanan, $status) {
		$this->db-select('COUNT() as total');
		$this->db->where('id_pesanan', $id_pesanan);
		$this->db->where('status', $status	);
		$data = $this->db->get('t_produksi');
		return $data->result();
	}

  public function insert($data){
    $hasil=$this->db->insert('t_produksi', $data);
    return $hasil;
}

	public function setStatus($id, $status) {
		$this->db->where('id', $id);
		$data =  array('status' => $status, 'tanggal_selesai' => date('Y-m-d') );
		$hasil=$this->db->update('t_produksi', $data);
		return $hasil;
	}

	public function getOverHead($id) {
		$this->db->select('SUM(DATEDIFF(day,tanggal_selesai,tanggal_mulai)*20000) AS hasil');
		$this->db->where('id', $id);
		$data = $this->db->get('t_produksi')->result();
		return $data[0]->hasil;
	}

	public function get_overhead_by_pesanan($id) {
		$this->db->select('SUM(DATEDIFF(`tanggal_selesai`, `tanggal_mulai`)*20000) AS hasil');
    $this->db->where_in("id","SELECT id AS id_produksi from t_produksi where id_pesanan=$id", false);
		$data = $this->db->get('t_produksi')->result();
		return $data[0]->hasil;
	}

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_produksi', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_produksi');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_produksi');
		return $data->num_rows();
	}
}
