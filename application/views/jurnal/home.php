<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">

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
  <h1 align="center">Jurnal Umum</h1>
  <?php if(isset($jurnal)) { ?>
  <div class="box-body">
  <table class ="table table-bordered table-striped">
			<tr class="info" >
				<td align="center" style="vertical-align:middle;" align='center' rowspan="2"><b>TANGGAL</b></td>
				<td align="center" style="vertical-align:middle;" align='center' rowspan="2"><b>KETERANGAN</b></td>
				<td align="center" style="vertical-align:middle;" align='center' rowspan="2"><b>REFF</b></td>
				<td align="center" align='center' colspan="2"><b>SALDO</b></td>
			</tr>
			<tr class="info">
				<td align="center"><b>DEBIT</b></td>
				<td align="center"><b>KREDIT</b></td>
			</tr>
		<?php
		$total =0;
		$total2 =0;
			foreach ($jurnal as $data)
			{
				echo"
					<tr>
						<td align = 'center'>".$data['tanggal']."</td>";

				if ($data['posisi']=='d')
				{

					echo"


						<td>".$data['nama']."</td>
						<td align = 'center'>".$data['kode_akun']."</td>
						<td align = 'right'>".rupiah($data['nominal'])."</td>
						<td align = 'right'></td>";
						$total = $total+$data['nominal'];
				}else{
					echo"
						<td style='padding-left:4em '>".$data['nama']."</td>
						<td align = 'center'>".$data['kode_akun']."</td>
						<td align = 'right'></td>
						<td align = 'right'>".rupiah($data['nominal'])."</td>
					</tr>

				";
				$total2=$total2+$data['nominal'];
				}
			}
		?>
		<tr>
			<td align = 'center' colspan="3"><b>TOTAL</b></td>
            <td align ="right"><b><?php echo rupiah($total);?></b></td>
            <td align ="right"><b><?php echo rupiah($total2);?></b></td>
		</tr>
	</table>
  </div>
  <?php } ?>
</div>
