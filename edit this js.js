
	function tampilBbp() {
		$.get('<?php echo base_url('Bbp/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
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
			url: "<?phpecho base_url('Bbp/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
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
				$('tambah-bb-produksi').modal('hide');
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
