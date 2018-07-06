<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_btkl extends CI_Model {
	public function select_all() {
    $this->db->order_by("id", "desc");
		$data = $this->db->get('t_btkl');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_btkl');
		return $data->result();
  }

  public function select_by_produksi($id_produksi) {
		$this->db->select('t_btkl.*, t_pegawai.nama_pegawai');
		$this->db->from('t_btkl');
		$this->db->join('t_pegawai', 't_pegawai.id = t_btkl.id_pegawai');
    $this->db->where('id_produksi', $id_produksi);
		$data = $this->db->get();
		return $data->result();
  }
		public function select_by_pesanan($id_pesanan) {
			$this->db->select('t_pegawai.*, COUNT(*) AS total_jam, (t_pegawai.gaji) AS biaya');
			$this->db->from('t_btkl');
			$this->db->join('t_pegawai', 't_pegawai.id = t_btkl.id_pegawai');
	    $this->db->where_in("t_btkl.id_produksi","SELECT id AS id_produksi from t_produksi where id_pesanan=$id_pesanan", false);
 			$this->db->group_by('id');
			$data = $this->db->get();
			return $data->result();
		}

		public function get_totaljam_by_id($id) {
			$this->db->select('((LEFT(t_btkl.jam_keluar, 2)-LEFT(t_btkl.jam_masuk, 2)+1) AS total_jam');
			$this->db->from('t_btkl');
			$this->db->where('id', $id);
			$data = $this->db->get()->result();
			return $data[0]->total_jam;
		}

	public function get_biaya_by_produksi($id_produksi) {
		$this->db->select('SUM(t_pegawai.gaji) AS biaya');
		$this->db->from('t_btkl');
		$this->db->join('t_pegawai', 't_pegawai.id = t_btkl.id_pegawai');
    $this->db->where('id_produksi', $id_produksi);
		$data = $this->db->get()->result();
		return $data[0]->biaya;
	}

	public function get_totaljam_by_produksi($id_produksi) {
		$this->db->select('SUM(LEFT(t_btkl.jam_keluar, 2)-LEFT(t_btkl.jam_masuk, 2)+1) AS total_jam');
		$this->db->from('t_btkl');
		$this->db->join('t_pegawai', 't_pegawai.id = t_btkl.id_pegawai');
    $this->db->where('id_produksi', $id_produksi);
		$data = $this->db->get()->result();
		return $data[0]->total_jam;
	}

	public function get_biaya_by_pesanan($id_pesanan) {
		$this->db->select('SUM(t_pegawai.gaji) AS biaya');
		$this->db->from('t_btkl');
		$this->db->join('t_pegawai', 't_pegawai.id = t_btkl.id_pegawai');
    $this->db->where_in("t_btkl.id_produksi","SELECT id AS id_produksi from t_produksi where id_pesanan=$id_pesanan", false);
		$data = $this->db->get()->result();
		return $data[0]->biaya;
	}

	public function get_pegawai_by_produksi($id_produksi) {
		$this->db->select('id_pegawai');
		$this->db->from('t_btkl');
		$this->db->where('id_produksi', $id_produksi);
		return $this->db->get()->result();
	}

  public function insert($data){
    $this->db->insert('t_btkl', $data);
		$hasil=$this->db->insert_id();
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_btkl', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->delete('t_btkl');
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_btkl');
		return $data->num_rows();
	}

	public function insert_beban($id) {
		$this->db->where('id', $id);
		$this->db->set('beban_gaji', 'beban_gaji+gaji', FALSE);
		$this->db->update('t_pegawai');
	}

	
	public function reset_beban($id) {
		$this->db->where('id', $id);
		$this->db->set('beban_gaji', '0', FALSE);
		$this->db->update('t_pegawai');
	}
}
