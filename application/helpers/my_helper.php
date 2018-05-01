<?php
	// MSG
	function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px') {
		if ($content != '') {
			return  '<p class="box-msg">
				      <div class="info-box alert-' .$type .'">
					      <div class="info-box-icon">
					      	<i class="fa ' .$icon .'"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	function show_succ_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="info-box alert-success">
					      <div class="info-box-icon">
					      	<i class="fa fa-check-circle"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	function show_err_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="info-box alert-error">
					      <div class="info-box-icon">
					      	<i class="fa fa-warning"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	// MODAL
	function show_my_modal($content='', $id='', $data='', $size='md') {
		$_ci = &get_instance();

		if ($content != '') {
			$view_content = $_ci->load->view($content, $data, TRUE);

			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-' .$size .'" role="document">
					    <div class="modal-content">
					        ' .$view_content .'
					    </div>
					  </div>
					</div>';
		}
	}

	function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Tidak') {
		$_ci = &get_instance();

		if ($id != '') {
			echo   '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
						      <h3 style="display:block; text-align:center;">' .$title .'</h3>

						      <div class="col-md-6">
						        <button class="form-control btn btn-primary ' .$class .'"> <i class="glyphicon glyphicon-ok-sign"></i> ' .$yes .'</button>
						      </div>
						      <div class="col-md-6">
						        <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ' .$no .'</button>
						      </div>
						    </div>
					    </div>
					  </div>
					</div>';
		}
	}
	function getStatus($status) {
		switch ($status) {
			case 0:
				return "Belum diproses";
				break;
			case 1:
				return "Sedang diproses";
				break;
			case 2:
				return "Selesai";
				break;
			case 3:
				return "Batal";
				break;

			default:
				return "";
				break;
		}
	}

	function getRowCountStatusPesanan($table, $key, $id, $status) {
		$ci =& get_instance();
		$ci->db->where($key, $id);
		$ci->db->where('status', $status);
		$data = $ci->db->get($table);
		return $data->num_rows();
	}
	function getRowCountTablebyProduksi($table, $id, $distinct='') {
		$ci =& get_instance();
		if(!empty($distinct)) {
			$ci->db->select("count(DISTINCT(".$distinct."))");
		}
		$ci->db->where('id_produksi', $id);
		$data = $ci->db->get($table);
		return $data->num_rows();
	}

	function getStatusValue($table, $key,  $id) {
		$ci =& get_instance();
		$ci->db->where($key, $id);
		$data = $ci->db->get($table)->result();
		return $data[0]->status;
	}

	function getValueKesulitan($id) {
		$ci =& get_instance();
		$ci->db->where('id', $id);
		$data = $ci->db->get('t_pesanan')->result();
		$kesulitan = $data[0]->kesulitan;
		switch($kesulitan) {
			case 'mudah':
				return 1.0;
				break;
			case 'sedang':
				return 1.5;
				break;
			case 'sulit':
				return 2.0;
				break;
			default:
				return 1.0;
				break;
		}

	}

		function getValueKesulitanByProduksi($id) {
			$ci =& get_instance();
			$ci->db->where_in("id","SELECT id_pesanan from t_produksi where id='$id'", false);
			$data = $ci->db->get('t_pesanan')->result();
			$kesulitan = $data[0]->kesulitan;
			switch($kesulitan) {
				case 'mudah':
					return 1.0;
					break;
				case 'sedang':
					return 1.5;
					break;
				case 'sulit':
					return 2.0;
					break;
				default:
					return 1.0;
					break;
			}

		}

	function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}

	function getSid($id, $table) {
		$ci =& get_instance();
		$ci->db->where('id', $id);
		$data = $ci->db->get($table)->result();
		return $data[0]->sid;
	}
?>
