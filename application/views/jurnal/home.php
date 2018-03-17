<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
    <form align ="center" method="post" action="<?php echo site_url().'jurnal/view_jurnal' ?> " class="form-inline">
		<label>Tanggal Awal</label>
		<input type = "date" name="tanggal_awal" class = "form-control">
		<label>Tanggal Akhir</label>
		<input type = "date" name="tanggal_akhir" class = "form-control">
	    <input type="submit" value="filter" class="btn btn-info">
    </form>
    </div>
  </div>
  <h1 align="center">Jurnal Umum</h1>
  <?php if(isset($jurnal)) { ?>
  <div class="box-body">
  <table class ="table table-bordered table-striped">
		<tr class="info">
			<td align = 'center'><b>TANGGAL</b></td>
			<td align = 'center'><b>KETERANGAN</b></td>
			<td align = 'center'><b>REFF</b></td>
			<td align = 'center'><b>DEBIT</b></td>
			<td align = 'center'><b>KREDIT</b></td>
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
						<td>".$data['reff']."</td>
						<td align = 'right'>".rupiah($data['nominal'])."</td>
						<td align = 'right'></td>";
						$total = $total+$data['nominal'];
				}else{
					echo"
						<td align='right'>".$data['nama']."</td>
						<td>".$data['reff']."</td>
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
