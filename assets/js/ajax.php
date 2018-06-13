<script type="text/javascript">
	var MyTable = $('#list-data').DataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "order": [],
		  "info": true,
		  "autoWidth": false
		});
	var MyTable2 = $('#list-data2').DataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});
	var MyTable3 = $('#list-data3').DataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});



	window.onload = function() {

		tampilOverhead();
		tampilProduksi();
		tampilBbTerpakai();
		tampilBbp();
		tampilBtkl();
		tampilBahanMasuk();

		<?php if ($this->uri->segment(1) == 'BahanPenolong') {echo "tampilBahanPenolong();";}?>
		<?php if ($this->uri->segment(1) == 'Pesanan') {echo "tampilPesanan();";}?>
		<?php if ($this->uri->segment(1) == 'Pegawai') {echo "tampilPegawai();";}?>
		<?php if ($this->uri->segment(1) == 'BahanBaku') {echo "tampilBahanBaku();";}?>
		<?php if ($this->uri->segment(1) == 'Coa') {echo "tampilCoa();";}?>
		<?php if ($this->uri->segment(1) == 'Report') {echo "tampilReportBahan();";}?>
		<?php if ($this->uri->segment(1) == 'BpMasuk') {echo "tampilBpMasuk();";}?>
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').DataTable({
			"destroy": true,
			  "paging": true,
			  "lengthChange": true,
			  "searching": true,
			  "order": [],
			  "info": true,
			  "autoWidth": false
			});
		MyTable2 = $('#list-data2').DataTable({
			"destroy": true,
			  "paging": true,
			  "lengthChange": true,
			  "searching": true,
			  "order": [],
			  "info": true,
			  "autoWidth": false
			});
		MyTable3 = $('#list-data3').DataTable({
			"destroy": true,
			  "paging": true,
			  "lengthChange": true,
			  "searching": true,
			  "order": [],
			  "info": true,
			  "autoWidth": false
			});
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	function tampilPegawai() {
		$.get('<?php echo base_url('Pegawai/tampil'); ?>', function(data) {
			MyTable.destroy();
			$('#data-pegawai').html(data);
			refresh();
		});
	}

	var id_pegawai;
	$(document).on("click", ".konfirmasiHapus-pegawai", function() {
		id_pegawai = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPegawai", function() {
		var id = id_pegawai;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPegawai();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPegawai", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pegawai').modal('show');
		})
	})

	$('#form-tambah-pegawai').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pegawai").reset();
				$('#tambah-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pegawai', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pegawai").reset();
				$('#update-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Pesanan

	function tampilPesanan() {
		$.get('<?php echo base_url('Pesanan/tampil'); ?>', function(data) {
			MyTable.destroy();
			$('#data-pesanan').html(data);
			refresh();
		});
	}

	var id_pesanan;
	$(document).on("click", ".konfirmasiHapus-pesanan", function() {
		id_pesanan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPesanan", function() {
		var id = id_pesanan;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pesanan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPesanan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPesanan", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pesanan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pesanan').modal('show');
		})
	})

		$(document).on("click", ".update-dataPesanan2", function() {
			var id = $(this).attr("data-id");

			$.ajax({
				method: "POST",
				url: "<?php echo base_url('Pesanan/update'); ?>",
				data: "id=" +id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#update-pesanan').modal('show');
			})
		})

	$('#form-tambah-pesanan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pesanan/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPesanan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pesanan").reset();
				$('#tambah-pesanan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pesanan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pesanan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPesanan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pesanan").reset();
				$('#update-pesanan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-pesanan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pesanan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//bahanBaku

	function tampilBahanBaku() {
		$.get('<?php echo base_url('BahanBaku/tampil'); ?>', function(data) {
			MyTable.destroy();
			$('#data-bahanBaku').html(data);
			refresh();
		});
	}

	var id_bahanBaku;
	$(document).on("click", ".konfirmasiHapus-bahanBaku", function() {
		id_bahanBaku = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataBahanBaku", function() {
		var id = id_bahanBaku;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('BahanBaku/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilBahanBaku();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataBahanBaku", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('BahanBaku/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-bahanBaku').modal('show');
		})
	})

	$('#form-tambah-bahanBaku').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('BahanBaku/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBahanBaku();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-bahanBaku").reset();
				$('#tambah-bahanBaku').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-bahanBaku', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('BahanBaku/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBahanBaku();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-bahanBaku").reset();
				$('#update-bahanBaku').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-bahanBaku').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-bahanBaku').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


		function tampilBahanPenolong() {
			$.get('<?php echo base_url('BahanPenolong/tampil'); ?>', function(data) {
				MyTable.destroy();
				$('#data-bahanPenolong').html(data);
				refresh();
			});
		}

		var id_bahanPenolong;
		$(document).on("click", ".konfirmasiHapus-bahanPenolong", function() {
			id_bahanPenolong = $(this).attr("data-id");
		})
		$(document).on("click", ".hapus-dataBahanPenolong", function() {
			var id = id_bahanPenolong;

			$.ajax({
				method: "POST",
				url: "<?php echo base_url('BahanPenolong/delete'); ?>",
				data: "id=" +id
			})
			.done(function(data) {
				$('#konfirmasiHapus').modal('hide');
				tampilBahanPenolong();
				$('.msg').html(data);
				effect_msg();
			})
		})

		$(document).on("click", ".update-dataBahanPenolong", function() {
			var id = $(this).attr("data-id");

			$.ajax({
				method: "POST",
				url: "<?php echo base_url('BahanPenolong/update'); ?>",
				data: "id=" +id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#update-bahanPenolong').modal('show');
			})
		})

		$('#form-tambah-bahanPenolong').submit(function(e) {
			var data = $(this).serialize();

			$.ajax({
				method: 'POST',
				url: '<?php echo base_url('BahanPenolong/prosesTambah'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilBahanPenolong();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-tambah-bahanPenolong").reset();
					$('#tambah-bahanPenolong').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

			e.preventDefault();
		});

		$(document).on('submit', '#form-update-bahanPenolong', function(e){
			var data = $(this).serialize();

			$.ajax({
				method: 'POST',
				url: '<?php echo base_url('BahanPenolong/prosesUpdate'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilBahanPenolong();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-update-bahanPenolong").reset();
					$('#update-bahanPenolong').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

			e.preventDefault();
		});

		$('#tambah-bahanPenolong').on('hidden.bs.modal', function () {
		  $('.form-msg').html('');
		})

		$('#update-bahanPenolong').on('hidden.bs.modal', function () {
		  $('.form-msg').html('');
		})

//Overhead

	function tampilOverhead() {
		$.get('<?php echo base_url('Overhead/tampil'); ?>', function(data) {
			MyTable.destroy();
			$('#data-overhead').html(data);
			refresh();
		});
	}

	var id_overhead;
	$(document).on("click", ".konfirmasiHapus-overhead", function() {
		id_overhead = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataOverhead", function() {
		var id = id_overhead;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Overhead/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilOverhead();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataOverhead", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Overhead/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-overhead').modal('show');
		})
	})

	$('#form-tambah-overhead').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Overhead/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilOverhead();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-overhead").reset();
				$('#tambah-overhead').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-overhead', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Overhead/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilOverhead();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-overhead").reset();
				$('#update-overhead').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-overhead').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-overhead').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


		function tampilProduksi() {
			<?php if (!empty($this->uri->segment(3))): ?>
			$.get('<?php echo base_url('Produksi/tampil/'.$this->uri->segment(3)); ?>', function(data) {
				MyTable.destroy();
				$('#data-produksi').html(data);
				refresh();
			});

			<?php else: ?>
			$.get('<?php echo base_url('Produksi/tampil/'); ?>', function(data) {
				MyTable.destroy();
				$('#data-produksi').html(data);
				refresh();
			});
			<?php endif; ?>
		}
		function tampilProduksi2() {
			$.get('<?php echo base_url('Produksi/tampil2'); ?>', function(data) {
				MyTable.destroy();
				$('#data-produksi2').html(data);
				refresh();
			});
		}

		var id_produksi;
		$(document).on("click", ".konfirmasiHapus-produksi", function() {
			id_produksi = $(this).attr("data-id");
		})
		$(document).on("click", ".hapus-dataProduksi", function() {
			var id = id_produksi;

			$.ajax({
				method: "POST",
				url: "<?php echo base_url('Produksi/delete'); ?>",
				data: "id=" +id
			})
			.done(function(data) {
				$('#konfirmasiHapus').modal('hide');
				tampilProduksi();
				$('.msg').html(data);
				effect_msg();
			})
		})

		$(document).on("click", ".update-dataProduksi", function() {
			var id = $(this).attr("data-id");

			$.ajax({
				method: "POST",
				url: "<?php echo base_url('Produksi/update'); ?>",
				data: "id=" +id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#update-produksi').modal('show');
			})
		})

		$('#form-tambah-produksi').submit(function(e) {
			var data = $(this).serialize();

			$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Produksi/prosesTambah'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilProduksi();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-tambah-produksi").reset();
					$('#tambah-produksi').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

			e.preventDefault();
		});

		$(document).on('submit', '#form-update-produksi', function(e){
			var data = $(this).serialize();

			$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Produksi/prosesUpdate'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilProduksi();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-update-produksi").reset();
					$('#update-produksi').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

			e.preventDefault();
		});

		$('#tambah-produksi').on('hidden.bs.modal', function () {
		  $('.form-msg').html('');
		})

		$('#update-produksi').on('hidden.bs.modal', function () {
		  $('.form-msg').html('');
		})


		function tampilBbTerpakai() {
			$.get('<?php echo base_url('BbTerpakai/tampil2/'.$this->uri->segment(3)); ?>', function(data) {
				MyTable.destroy();
				$('#data-bbTerpakai').html(data);
				refresh();
			});
		}

		var id_bbTerpakai;
		$(document).on("click", ".konfirmasiHapus-bbb", function() {
			id_bbTerpakai = $(this).attr("data-id");
		})
		$(document).on("click", ".hapus-dataBbTerpakai", function() {
			var id = id_bbTerpakai;

			$.ajax({
				method: "POST",
				url: "<?php echo base_url('BbTerpakai/delete'); ?>",
				data: "id=" +id
			})
			.done(function(data) {
				$('#konfirmasiHapusBbb').modal('hide');
				tampilBbTerpakai();
				$('.msg').html(data);
				effect_msg();
			})
		})

		$(document).on("click", ".update-dataBbb", function() {
			var id = $(this).attr("data-id");

			$.ajax({
				method: "POST",
				url: "<?php echo base_url('BbTerpakai/update'); ?>",
				data: "id=" +id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#update-bbTerpakai').modal('show');
			})
		})

		$('#form-tambah-bb').submit(function(e) {
			var data = $(this).serialize();

			$.ajax({
				method: 'POST',
				url: '<?php echo base_url('BbTerpakai/prosesTambah'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilBbTerpakai();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-tambah-bb").reset();
					$('#tambah-bb-produksi').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

			e.preventDefault();
		});

		$(document).on('submit', '#form-update-bbb', function(e){
			var data = $(this).serialize();

			$.ajax({
				method: 'POST',
				url: '<?php echo base_url('BbTerpakai/prosesUpdate'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilBbTerpakai();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-update-bbb").reset();
					$('#update-bbTerpakai').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

			e.preventDefault();
		});

		$('#tambah-bbTerpakai').on('hidden.bs.modal', function () {
		  $('.form-msg').html('');
		})

		$('#update-bbTerpakai').on('hidden.bs.modal', function () {
		  $('.form-msg').html('');
		})


			function tampilBbp() {
				$.get('<?php echo base_url('Bbp/tampil2/'.$this->uri->segment(3)); ?>', function(data) {
					MyTable2.destroy();
					$('#data-bbp').html(data);
					refresh();
				});
			}

			var id_bbp;
			$(document).on("click", ".konfirmasiHapus-bbp", function() {
				id_bbp = $(this).attr("data-id");
			})
			$(document).on("click", ".hapus-dataBbp", function() {
				var id = id_bbp;

				$.ajax({
					method: "POST",
					url: "<?php echo base_url('Bbp/delete'); ?>",
					data: "id=" +id
				})
				.done(function(data) {
					$('#konfirmasiHapusBbp').modal('hide');
					tampilBbp();
					$('.msg').html(data);
					effect_msg();
				})
			})

			$(document).on("click", ".update-dataBbp", function() {
				var id = $(this).attr("data-id");

				$.ajax({
					method: "POST",
					url: "<?php echo base_url('Bbp/update'); ?>",
					data: "id=" +id
				})
				.done(function(data) {
					$('#tempat-modal').html(data);
					$('#update-bbp').modal('show');
				})
			})

			$('#form-tambah-bbp').submit(function(e) {
				var data = $(this).serialize();

				$.ajax({
					method: 'POST',
					url: '<?php echo base_url('Bbp/prosesTambah'); ?>',
					data: data
				})
				.done(function(data) {
					var out = jQuery.parseJSON(data);

					tampilBbp();
					if (out.status == 'form') {
						$('.form-msg').html(out.msg);
						effect_msg_form();
					} else {
						document.getElementById("form-tambah-bbp").reset();
						$('#tambah-bbp-produksi').modal('hide');
						$('.msg').html(out.msg);
						effect_msg();
					}
				})

				e.preventDefault();
			});

			$(document).on('submit', '#form-update-bbp', function(e){
				var data = $(this).serialize();

				$.ajax({
					method: 'POST',
					url: '<?php echo base_url('Bbp/prosesUpdate'); ?>',
					data: data
				})
				.done(function(data) {
					var out = jQuery.parseJSON(data);

					tampilBbp();
					if (out.status == 'form') {
						$('.form-msg').html(out.msg);
						effect_msg_form();
					} else {
						document.getElementById("form-update-bbp").reset();
						$('#update-bbp').modal('hide');
						$('.msg').html(out.msg);
						effect_msg();
					}
				})

				e.preventDefault();
			});

			$('#tambah-bbp').on('hidden.bs.modal', function () {
			  $('.form-msg').html('');
			})

			$('#update-bbp').on('hidden.bs.modal', function () {
			  $('.form-msg').html('');
			})

			function tampilBtkl() {
				$.get('<?php echo base_url('Btkl/tampil2/'.$this->uri->segment(3)); ?>', function(data) {
					MyTable3.destroy();
					$('#data-btkl').html(data);
					refresh();
				});
			}

			var id_btkl;
			$(document).on("click", ".konfirmasiHapus-btkl", function() {
				id_btkl = $(this).attr("data-id");
			})
			$(document).on("click", ".hapus-dataBtkl", function() {
				var id = id_btkl;

				$.ajax({
					method: "POST",
					url: "<?php echo base_url('Btkl/delete'); ?>",
					data: "id=" +id
				})
				.done(function(data) {
					$('#konfirmasiHapusBtkl').modal('hide');
					tampilBtkl();
					$('.msg').html(data);
					effect_msg();
				})
			})

			$(document).on("click", ".update-dataBtkl", function() {
				var id = $(this).attr("data-id");

				$.ajax({
					method: "POST",
					url: "<?php echo base_url('Btkl/update'); ?>",
					data: "id=" +id
				})
				.done(function(data) {
					$('#tempat-modal').html(data);
					$('#update-btkl').modal('show');
				})
			})

			$('#form-tambah-btkl').submit(function(e) {
				var data = $(this).serialize();

				$.ajax({
					method: 'POST',
					url: '<?php echo base_url('Btkl/prosesTambah'); ?>',
					data: data
				})
				.done(function(data) {
					var out = jQuery.parseJSON(data);

					tampilBtkl();
					if (out.status == 'form') {
						$('.form-msg').html(out.msg);
						effect_msg_form();
					} else {
						document.getElementById("form-tambah-btkl").reset();
						$('#tambah-btkl-produksi').modal('hide');
						$('.msg').html(out.msg);
						effect_msg();
					}
				})

				e.preventDefault();
			});

			$(document).on('submit', '#form-update-btkl', function(e){
				var data = $(this).serialize();

				$.ajax({
					method: 'POST',
					url: '<?php echo base_url('Btkl/prosesUpdate'); ?>',
					data: data
				})
				.done(function(data) {
					var out = jQuery.parseJSON(data);

					tampilBtkl();
					if (out.status == 'form') {
						$('.form-msg').html(out.msg);
						effect_msg_form();
					} else {
						document.getElementById("form-update-btkl").reset();
						$('#update-btkl').modal('hide');
						$('.msg').html(out.msg);
						effect_msg();
					}
				})

				e.preventDefault();
			});

			$('#tambah-btkl').on('hidden.bs.modal', function () {
			  $('.form-msg').html('');
			})

			$('#update-btkl').on('hidden.bs.modal', function () {
			  $('.form-msg').html('');
			})


						var id_produksi_Selesai;
						$(document).on("click", ".konfirmasiSelesai", function() {
							id_produksi_Selesai = $(this).attr("data-id");
						})
						$(document).on("click", ".selesai-produksi", function() {
							var id = id_produksi_Selesai;

							$.ajax({
								method: "POST",
								url: "<?php echo base_url('Produksi/setSelesai'); ?>",
								data: "id=" +id
							})
							.done(function(data) {
								$('#konfirmasiSelesai').modal('hide');
								$('.msg').html(data);
								effect_msg();
								location.reload();
							})
						})

						var id_pesanan_Selesai;
						$(document).on("click", ".konfirmasiSelesai-pesanan", function() {
							id_pesanan_Selesai = $(this).attr("data-id");
						})
						$(document).on("click", ".selesai-dataPesanan", function() {
							var id = id_pesanan_Selesai;

							$.ajax({
								method: "POST",
								url: "<?php echo base_url('Pesanan/setSelesai'); ?>",
								data: "id=" +id
							})
							.done(function(data) {
								location.reload();
								$('#konfirmasiSelesai').modal('hide');
								$('.msg').html(data);
								effect_msg();
							})
						})


						//BahanMasuk

							function tampilBahanMasuk() {
								$.get('<?php echo base_url('BahanMasuk/tampil'); ?>', function(data) {
									MyTable.destroy();
									$('#data-BahanMasuk').html(data);
									refresh();
								});
							}

							var id_BahanMasuk;
							$(document).on("click", ".konfirmasiHapus-BahanMasuk", function() {
								id_BahanMasuk = $(this).attr("data-id");
							})
							$(document).on("click", ".hapus-dataBahanMasuk", function() {
								var id = id_BahanMasuk;

								$.ajax({
									method: "POST",
									url: "<?php echo base_url('BahanMasuk/delete'); ?>",
									data: "id=" +id
								})
								.done(function(data) {
									$('#konfirmasiHapus').modal('hide');
									tampilBahanMasuk();
									$('.msg').html(data);
									effect_msg();
								})
							})

							$(document).on("click", ".update-dataBahanMasuk", function() {
								var id = $(this).attr("data-id");

								$.ajax({
									method: "POST",
									url: "<?php echo base_url('BahanMasuk/update'); ?>",
									data: "id=" +id
								})
								.done(function(data) {
									$('#tempat-modal').html(data);
									$('#update-BahanMasuk').modal('show');
								})
							})

							$('#form-tambah-BahanMasuk').submit(function(e) {
								var data = $(this).serialize();

								$.ajax({
									method: 'POST',
									url: '<?php echo base_url('BahanMasuk/prosesTambah'); ?>',
									data: data
								})
								.done(function(data) {
									var out = jQuery.parseJSON(data);

									tampilBahanMasuk();
									if (out.status == 'form') {
										$('.form-msg').html(out.msg);
										effect_msg_form();
									} else {
										document.getElementById("form-tambah-BahanMasuk").reset();
										$('#tambah-BahanMasuk').modal('hide');
										$('.msg').html(out.msg);
										effect_msg();
									}
								})

								e.preventDefault();
							});

							$(document).on('submit', '#form-update-BahanMasuk', function(e){
								var data = $(this).serialize();

								$.ajax({
									method: 'POST',
									url: '<?php echo base_url('BahanMasuk/prosesUpdate'); ?>',
									data: data
								})
								.done(function(data) {
									var out = jQuery.parseJSON(data);

									tampilBahanMasuk();
									if (out.status == 'form') {
										$('.form-msg').html(out.msg);
										effect_msg_form();
									} else {
										document.getElementById("form-update-BahanMasuk").reset();
										$('#update-BahanMasuk').modal('hide');
										$('.msg').html(out.msg);
										effect_msg();
									}
								})

								e.preventDefault();
							});

							$('#tambah-BahanMasuk').on('hidden.bs.modal', function () {
							  $('.form-msg').html('');
							})

							$('#update-BahanMasuk').on('hidden.bs.modal', function () {
							  $('.form-msg').html('');
							})

				function replaceOverview() {
					$('#taboverview').replaceWith("<a href='<?php echo base_url('Produksi/id/'.$this->uri->segment(3)); ?>'>Overview</a>");
				}

function tampilCoa() {
	$.get('<?php echo base_url('Coa/tampil'); ?>', function(data) {
		MyTable.destroy();
		$('#data-coa').html(data);
		refresh();
	});
}

var id_coa;
$(document).on("click", ".konfirmasiHapus-coa", function() {
	id_coa = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataCoa", function() {
	var id = id_coa;

	$.ajax({
		method: "POST",
		url: "<?php echo base_url('Coa/delete'); ?>",
		data: "id=" +id
	})
	.done(function(data) {
		$('#konfirmasiHapus').modal('hide');
		tampilCoa();
		$('.msg').html(data);
		effect_msg();
	})
})

$(document).on("click", ".update-dataCoa", function() {
	var id = $(this).attr("data-id");

	$.ajax({
		method: "POST",
		url: "<?php echo base_url('Coa/update'); ?>",
		data: "id=" +id
	})
	.done(function(data) {
		$('#tempat-modal').html(data);
		$('#update-coa').modal('show');
	})
})

$('#form-tambah-coa').submit(function(e) {
	var data = $(this).serialize();

	$.ajax({
		method: 'POST',
		url: '<?php echo base_url('Coa/prosesTambah'); ?>',
		data: data
	})
	.done(function(data) {
		var out = jQuery.parseJSON(data);

		tampilCoa();
		if (out.status == 'form') {
			$('.form-msg').html(out.msg);
			effect_msg_form();
		} else {
			document.getElementById("form-tambah-coa").reset();
			$('#tambah-coa').modal('hide');
			$('.msg').html(out.msg);
			effect_msg();
		}
	})

	e.preventDefault();
});

$(document).on('submit', '#form-update-coa', function(e){
	var data = $(this).serialize();

	$.ajax({
		method: 'POST',
		url: '<?php echo base_url('Coa/prosesUpdate'); ?>',
		data: data
	})
	.done(function(data) {
		var out = jQuery.parseJSON(data);

		tampilCoa();
		if (out.status == 'form') {
			$('.form-msg').html(out.msg);
			effect_msg_form();
		} else {
			document.getElementById("form-update-coa").reset();
			$('#update-coa').modal('hide');
			$('.msg').html(out.msg);
			effect_msg();
		}
	})

	e.preventDefault();
});

$('#tambah-coa').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

$('#update-coa').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

	//BpMasuk

	function tampilBpMasuk() {
		$.get('<?php echo base_url('BpMasuk/tampil'); ?>', function(data) {
			MyTable.destroy();
			$('#data-BpMasuk').html(data);
			refresh();
		});
	}

	var id_BpMasuk;
	$(document).on("click", ".konfirmasiHapus-BpMasuk", function() {
		id_BpMasuk = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataBpMasuk", function() {
		var id = id_BpMasuk;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('BpMasuk/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilBpMasuk();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataBpMasuk", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('BpMasuk/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-BpMasuk').modal('show');
		})
	})

	$('#form-tambah-BpMasuk').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('BpMasuk/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBpMasuk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-BpMasuk").reset();
				$('#tambah-BpMasuk').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-BpMasuk', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('BpMasuk/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBpMasuk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-BpMasuk").reset();
				$('#update-BpMasuk').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-BpMasuk').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-BpMasuk').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//report
	<?php if ($this->uri->segment(1) == 'Report') { ?>
	function tampilReportBahan() {
		$.get('<?php echo base_url('Report/tampilBb'); ?>', function(data) {
			MyTable.destroy();
			$('#report-bb').html(data);
			refresh();
		});

		$.get('<?php echo base_url('Report/tampilBp'); ?>', function(data) {
				MyTable2.destroy();
				$('#report-bp').html(data);
				refresh();
		});
	}

	// $(document).on("click", ".info-dataBahanPenolong", function() {
	// 	var id = $(this).attr("data-id");

	// 	$.ajax({
	// 		method: "POST",
	// 		url: "<?php echo base_url('report/infoBp'); ?>",
	// 		data: "id=" +id
	// 	})
	// 	.done(function(data) {
	// 		$('#tempat-modal').html(data);
	// 		$('#info-grafik').modal('show');
	// 	})
	// })


	// $(document).on("click", ".info-dataBahanBaku", function() {
	// 	var id = $(this).attr("data-id");

	// 	$.ajax({
	// 		method: "POST",
	// 		url: "<?php echo base_url('report/infoBb'); ?>",
	// 		data: "id=" +id
	// 	})
	// 	.done(function(data) {
	// 		$('#tempat-modal').html(data);
	// 		$('#info-grafik').modal('show');
	// 	})
	// })
	<?php } ?>
	//end of report

</script>
