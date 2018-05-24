<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
    <form align="" method="post" action="<?php echo site_url().'report/view_penjualan' ?>" class="form-inline">

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
  <?php if(isset($dataPesanan)) { ?>
  <div class="box-body">
		<h2 align="center">REPORT PENJUALAN</h2>
    <?php if (!empty($dataPesanan)): ?>
			<?php if(isset($bulan_ke)) { ?>
      <h2 align="center"><?php echo 'BULAN '.strtoupper($bulan[$bulan_ke-1]);?></h2>
			<?php } ?>
			<?php if(isset($tahun_ke)) { ?>
      <h2 align="center"><?php echo 'TAHUN '.$tahun_ke;?></h2>
			<?php } ?>
    <?php else: ?>
        <h2 align="center"><?php echo 'DATA TIDAK DITEMUKAN'?></h2>
    <?php endif; ?>
		<table class="table table-bordered table-striped">
			<tr class="info" >
				<td align="center" style="vertical-align:middle;" align='center' ><b>ID</b></td>
				<td align="center" style="vertical-align:middle;" align='center' ><b>TANGGAL PESAN</b></td>
				<td align="center" style="vertical-align:middle;" align='center' ><b>NAMA PEMESAN</b></td>
				<td align="center" style="vertical-align:middle;" align='center' ><b>PESANAN</b></td>
				<td align="center" style="vertical-align:middle;" align='center' ><b>JUMLAH</b></td>
			</tr>
			<?php

			foreach ($dataPesanan as $data) {
				?>
				<tr>
					<td><a href="<?php echo base_url('/Pesanan/id/').$data->id?>"><?php echo $data->id; ?></a></td>
					<td><?php echo $data->tanggal_pesanan; ?></td>
					<td><?php echo $data->nama_pemesan; ?></td>
					<td><?php echo $data->pesanan; ?></td>
					<td><?php echo $data->jumlah; ?></td>
				</tr>
				<?php
			}
		?>


		</table>
  </div>
  <?php } ?>
</div>
