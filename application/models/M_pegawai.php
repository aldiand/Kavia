<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {
	public function select_all() {
    $this->db->order_by("id", "desc");
	  $this->db->where('active', 1);
		$data = $this->db->get('t_pegawai');
		return $data->result();
	}

	public function select_all_btkl($id) {
    if(getSifatPesananByProduksi($id) == 'perorangan'){
      $this->db->where('tipe_gaji', 'perpesanan');
    } else {
      $this->db->where('tipe_gaji', 'perproject');
    }
		$data = $this->db->get('t_pegawai');
		return $data->result();
	}

  public function select_by_id($id){
    $this->db->where('id', $id);
		$data = $this->db->get('t_pegawai');
		return $data->result();
  }

  public function get_gaji_by_id($id) {
		$this->db->select('gaji');
    $this->db->where("id","$id");
		$data = $this->db->get('t_pegawai')->result();
		return $data[0]->gaji;
  }

  public function insert($data){
    $hasil=$this->db->insert('t_pegawai', $data);
    return $hasil;
  }

  public function update($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_pegawai', array('active' => 0));
		$data['id'] = null;
    $hasil=$this->db->insert('t_pegawai', $data);
    return $hasil;
  }

  public function update_normal($data, $id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_pegawai', $data);
    return $hasil;
  }

	public function delete($id){
    $this->db->where('id', $id);
    $hasil=$this->db->update('t_pegawai', array('active' => 0));
    return $hasil;
  }

	public function total_rows() {
		$data = $this->db->get('t_pegawai');
		return $data->num_rows();
	}
}

/* End of file M_t_pegawai.php */
/* Location: ./application/models/M_t_pegawai.php */
