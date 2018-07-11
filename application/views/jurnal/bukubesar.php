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

    <form align="" method="post" action="<?php echo site_url().'jurnal/view_jurnal' ?>" class="form-inline">

		<label>Bulan</label>
		<select name="bulan" class = "form-control">
		<option value="">-</option> 
		<?php
		$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$jlh_bln=count($bulan);
		for($c=0; $c<$jlh_bln; $c+=1){
				echo"<option value='".($c+1)."'> $bulan[$c] </option>";
		}
		?>
		</select>
		<label>Tahun</label>
		<select name="tahun" class = "form-control">
		<option value="">-</option>
		<?php for($i = 2017; $i <= Date('Y'); $i++ ) {
				echo "<option value='$i'"; echo ">$i</option>";
		} ?>
		</select>
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
			<tr class="info" >
				<td align="center" style="vertical-align:middle;" align='center' rowspan="2"><b>TANGGAL</b></td>
				<td align="center" style="vertical-align:middle;" align='center' rowspan="2"><b>KETERANGAN</b></td>
				<td align="center" style="vertical-align:middle;" align='center' rowspan="2"><b>REFF</b></td>
				<td align="center" style="vertical-align:middle;" align='center' rowspan="2"><b>DEBIT</b></td>
				<td align="center" style="vertical-align:middle;" align='center' rowspan="2"><b>KREDIT</b></td>
				<td align="center" style="vertical-align:middle;" align='center' rowspan="2"><b>SALDO</b></td>
			</tr>
			<tr class="info">
			</tr>

			<?php
			
			$total=0;
			echo"
			<tr>
			<td align='center'>-</td>
			<td>SALDO AWAL</td>
			<td align='center'></td>
			<td align='right'></td>
			<td></td>
			<td align='right'>".rupiah($saldo_awal)."</td>
		";
				foreach ($jurnal as $data){

				   if($data['posisi']=='d'){


					   echo"
					    <tr>
							<td align='center'>".$data['tanggal']."</td>
							<td>".$data['nama']."</td>
							<td align='center'>".$data['kode_akun']."</td>
							<td align='right'>".rupiah($data['nominal'])."</td>
							<td></td>
							<td align='right'>".rupiah($data['saldo'])."</td>
						";


				   }
				   else if($data['posisi']=='c'){

					   echo"
					    <tr>
							<td align='center'>".$data['tanggal']."</td>
							<td>".$data['nama']."</td>
							<td align='center'>".$data['kode_akun']."</td>
							<td></td>
							<td align='right'>".rupiah($data['nominal'])."</td>
							<td align='right'>".rupiah($data['saldo'])."</td>
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
