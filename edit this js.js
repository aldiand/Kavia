
	function tampilBbTerpakai() {
		$.get('<?php echo base_url('BbTerpakai/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-bbTerpakai').html(data);
			refresh();
		});
	}

	var id_bbTerpakai;
	$(document).on("click", ".konfirmasiHapus-bbTerpakai", function() {
		id_bbTerpakai = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataBbTerpakai", function() {
		var id = id_bbTerpakai;

		$.ajax({
			method: "POST",
			url: "<?phpecho base_url('BbTerpakai/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilBbTerpakai();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataBbTerpakai", function() {
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

	$('#form-tambah-bbTerpakai').submit(function(e) {
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
				document.getElementById("form-tambah-bbTerpakai").reset();
				$('tambah-bb-produksi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-bbTerpakai', function(e){
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
				document.getElementById("form-update-bbTerpakai").reset();
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
