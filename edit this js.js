	//BpMasuk

	function tampilBpMasuk() {
		$.get('<?php echo base_url('BpMasuk/tampil'); ?>', function(data) {

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