
<!-- Main content -->
<section class="invoice">
  <div class="box">
  <?php $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); ?>

<h2 align="center">Laporan Harga Pokok Penjualan</h2>
<h2 align="center">Per <?php echo $bulan[date('n')-1].' '.date('Y'); ?> </h2>
  <div class="box-body">
  <table class ="table table-bordered table-striped">
      <tr>
				<td align="left">Penjualan</td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($penjualan); ?></td>
      </tr>
      <tr>
				<td align="left">FG Awal</td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($fg_awal); ?></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">HP Produksi: </td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
  		<tr>
				<td align="left"  style="padding-left:2em ">WIP Awal</td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($wip_awal); ?></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Biaya Produksi: </td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left" style="padding-left:2em ">Bahan Baku Awal</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($bb_awal); ?></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left" style="padding-left:2em ">Pembelian</td>
				<td align="left"><?php echo rupiah($bb_pembelian); ?></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Jumlah</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($bb_jumlah); ?></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left" style="padding-left:2em ">Bahan Baku Akhir</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($bb_akhir); ?></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Total Bahan Baku</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($total_bb); ?></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left" style="padding-left:2em ">Bahan Penolong Akhir</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($bp_awal); ?></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left" style="padding-left:2em ">Pembelian</td>
				<td align="left"<?php echo rupiah($bp_pembelian); ?>></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Jumlah</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($bp_jumlah); ?></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left" style="padding-left:2em ">Bahan Penolong Akhir</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($bp_akhir); ?></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Total Bahan Penolong</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($total_bp); ?></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Biaya Tenaga Kerja Langsung</td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left" style="padding-left:2em ">Karyawan Per Project</td>
				<td align="left"><?php echo rupiah($btkl_perproject); ?></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left" style="padding-left:2em ">Karyawan Per Pesanan</td>
				<td align="left"><?php echo rupiah($btkl_perpesanan); ?></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Total BTKL</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($total_btkl); ?></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Biaya Overhead Pabrik:</td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left" style="padding-left:2em ">Karyawan Tetap</td>
				<td align="left"><?php echo rupiah($btktl); ?></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left" style="padding-left:2em ">Listrik</td>
				<td align="left"><?php echo rupiah($beban_listrik); ?></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Total Biaya Overhead</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($total_bop); ?></td>
				<td align="left"></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Biaya Produksi</td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($total_biaya); ?></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">WIP Akhir</td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($wip_akhir); ?></td>
      </tr>
      <tr>
				<td align="left">HPProduksi</td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($HPProduksi); ?></td>
      </tr>
      <tr>
				<td align="left">FG akhir</td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($fg_akhir); ?></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">HPPenjualan</td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($HPPenjualan); ?></td>
      </tr>
	</table>
  </div>
</div>


</section>
