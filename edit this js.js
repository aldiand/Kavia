
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
