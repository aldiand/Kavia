
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
