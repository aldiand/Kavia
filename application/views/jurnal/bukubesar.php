<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
    <form align="" method="post" action="<?php echo site_url().'jurnal/view_bukubesar' ?>" class="form-inline">
			<label>Pilih Akun</label>
			<select name="no_akun" class = "form-control">
			<option value="" readonly="readonly" selected >Pilih akun</option>
			<?php
				foreach ($akun as $data)
				{
					echo "<option value = ".$data->kode.">".$data->nama."</option>";
				}
			?>
            </select>
            <label>Tanggal Awal</label>
		<input type = "date" name="tanggal_awal" class = "form-control">
		<label>Tanggal Akhir</label>
		<input type = "date" name="tanggal_akhir" class = "form-control">
		<input type="submit" value="filter" class="btn btn-info">

		</form>
    </div>
  </div>
  <?php if(isset($jurnal)) { ?>
  <div class="box-body">
		<h2 align="center">BUKU BESAR</h2>
    <?php if (!empty($jurnal)): ?>
      <h2 align="center"><?php echo $jurnal[0]['nama'];?></h2>
    <?php else: ?>
        <h2 align="center"><?php echo 'DATA TIDAK DITEMUKAN'?></h2>
    <?php endif; ?>
		<table class="table table-bordered table-striped">
			<tr class="info">
				<td align="center"><b>TANGGAL</b></td>
				<td align="center"><b>KETERANGAN</b></td>
				<td align="center"><b>DEBIT</b></td>
				<td align="center"><b>KREDIT</b></td>
			</tr>
			<?php
			$total=0;

				foreach ($jurnal as $data){

				   if($data['posisi']=='d'){


					   echo"
					    <tr>
							<td align='center'>".$data['tanggal']."</td>
							<td>".$data['nama']."</td>
							<td align='right'>".rupiah($data['nominal'])."</td>
							<td></td>
						";


				   }
				   else if($data['posisi']=='c'){

					   echo"
					    <tr>
							<td align='center'>".$data['tanggal']."</td>
							<td>".$data['nama']."</td>
							<td></td>
							<td align='right'>".rupiah($data['nominal'])."</td>
						";

				   }
					echo"
						</tr>";
					}

			?>

		</table>
  </div>
  <?php } ?>
</div>
