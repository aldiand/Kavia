			function tampilBtkl() {
				$.get('<?php echo base_url('Btkl/tampil2/'.$this->uri->segment(3)); ?>', function(data) {
					MyTable2.fnDestroy();
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
						$('tambah-bb-produksi').modal('hide');
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
