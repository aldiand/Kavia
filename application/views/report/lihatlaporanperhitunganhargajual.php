<?php
  foreach ($dataPesanan as $data) {
    ?>
<section class="content-header">
  <h1>
    Perhitungan Harga Jual
    <small>#<?php echo $data->id;?></small>
  </h1>
</section>

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> ID Pesanan :  #<?php echo $data->id;?>.
        <small class="pull-right">Tanggal: <?php echo Date('d-m-Y'); ?></small>
    </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="box">
  <h1 align="center">Laporan Perhitungan Harga Jual</h1>
  <div class="box-body">
  <table class ="table table-bordered table-striped">
      <!-- <tr>
				<td align="left">Harga jual yang di bebankan kepada pemesan</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($harga_jual = 130*$total_biaya/100); ?></td>
      </tr>
      <tr>
				<td align="left">Biaya bahan baku sesungguhnya</td>
				<td align="left"><?php echo rupiah($total_biaya_bb); ?></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Biaya tenaga kerja langsung sesungguhnya</td>
				<td align="left"><?php echo rupiah($total_biaya_tkl); ?></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Taksiran biaya overhead pabrik</td>
				<td align="left"><?php echo rupiah($total_biaya_bp + $total_biaya_overhead); ?></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Total biaya produksi pesanan</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($total_biaya_bb + $total_biaya_tkl + $total_biaya_bp + $total_biaya_overhead); ?></td>
      </tr>
      <tr>
				<td align="left">Laba bruto</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($harga_jual - ($total_biaya_bb + $total_biaya_tkl + $total_biaya_bp + $total_biaya_overhead)); ?></td>
      </tr> -->

      <tr>
				<td align="left">Taksiran Biaya Produksi untuk Pemesan</td>
				<td align="left"><?php echo rupiah($total_biaya); ?></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Taksiran Biaya Non Produksi </td>
				<td align="left"><?php echo rupiah(0); ?></td>
				<td align="left"></td>
      </tr>
      <tr>
				<td align="left">Taksiran Total Biaya Pesanan</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($total_biaya); ?></td>
      </tr>
      <tr>
				<td align="left">Laba Yang Diinginkan</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($total_biaya*30/100); ?></td>
      </tr>
      <tr class="info">
				<td align="left">Taksiran Harga Jual</td>
				<td align="left"></td>
				<td align="left"><?php echo rupiah($total_biaya*130/100); ?></td>
      </tr>
	</table>
  </div>
</div>


  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12 center">
       <a href="#" onclick="printContent('invoice');"  target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
    </div>
  </div>
</section>
<?php } ?>

<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('.' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>