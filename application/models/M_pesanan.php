<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan extends CI_Model {
	public function select_all() {
    $this->db->order_by("id", "desc");
		$data = $this->db->get('t_pesanan');
		return $data->result();
	}
	public function select_by_year($year) {
		$this->db->where("YEAR(tanggal_pesanan)", $year);
    $this->db->order_by("id", "desc");
		$data = $this->db->get('t_pesanan');
		return $data->result();
	}
	public function select_by_month($month) {
		$this->db->where("MONTH(tanggal_pesanan)", $month);
    $this->db->order_by("id", "desc");
		$data = $this->db->get('t_pesanan');
		return $data->result();
	}
	public function select_by_month_year($month, $year) {
		$this->db->where("YEAR(tanggal_pesanan)", $year);
		$this->db->where("MONTH(tanggal_pesanan)", $month);
    $this->db->order_by("id", "desc");
		$data = $this->db->get('t_pesanan');
		return $data->result();
	}
	public function select_all_uncomplete() {
    $this->db->order_by("id", "desc");
    $this->db->where('status !=', 2);
		$data = $this->db->get('t_pesanan');
		return $data->result();
	}

	public function select_all_complete() {
    $this->db->order_by("id", "desc");
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
    $this->db->insert('t_pesanan', $data);
		$hasil=$this->db->insert_id();
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

	public function setStatusSelesai($id) {
		$this->db->where('id', $id);
		$data =  array('status' => 2, 'tanggal_selesai' => Date('Y-m-d'));
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

	public function getOverhead($id) {
		$this->db->select("t_overhead.*, (SELECT COUNT(*) FROM t_produksi WHERE id_pesanan=$id) as jumlah");
	  $this->db->where('active', 1);
		$data = $this->db->get('t_overhead');
		return $data->result();
	}

	public function getTotal($id) {
    $this->load->model('M_bbb');
    $this->load->model('M_bbp');
    $this->load->model('M_btkl');
		$this->load->model('M_produksi');
		$total = ($this->M_bbb->get_biaya_by_pesanan($id) 
			+ $this->M_bbp->get_biaya_by_pesanan($id) 
			+ ($this->M_btkl->get_biaya_by_pesanan($id)) 
			+ $this->M_produksi->get_overhead_by_pesanan($id));
		return $total;
	}
}
