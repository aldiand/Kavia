<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilPegawai();
		tampilPesanan();
		tampilBahanBaku();
		tampilBahanPenolong();
		tampilOverhead();
		tampilProduksi()
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
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
			MyTable.fnDestroy();
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
			MyTable.fnDestroy();
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

			tampilPegawai();
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
			MyTable.fnDestroy();
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
				MyTable.fnDestroy();
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
			MyTable.fnDestroy();
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
			$.get('<?php echo base_url('Produksi/tampil'); ?>', function(data) {
				MyTable.fnDestroy();
				$('#data-produksi').html(data);
				refresh();
			});
		}
		function tampilProduksi2() {
			$.get('<?php echo base_url('Produksi/tampil2'); ?>', function(data) {
				MyTable.fnDestroy();
				$('#data-produksi').html(data);
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


</script>