<?php
  foreach ($dataPesanan as $data) {
    ?>
<section class="content-header">
  <h1>
    Kartu HPP
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
  <div class="row invoice-info">
    <div class="col-xs-6">

      <div class="table-responsive">
        <table class="table" >
          <tr>
            <td style="width:50%">Nama Pemesan</td>
            <td><?php echo $data->nama_pemesan; ?></td>
          </tr>
          <tr>
            <td style="width:50%">Nama Produk</td>
            <td><?php echo $data->pesanan; ?></td>
          </tr>
          <tr>
            <td style="width:50%">Kuantitas</td>
            <td><?php echo $data->jumlah; ?></td>
          </tr>
          <tr>
            <td style="width:50%">Deskripsi</td>
            <td><?php echo $data->deskripsi_pesanan; ?></td>
          </tr>
        </table>
    </div>
  </div>
  <div class="row invoice-info">
    <div class="col-xs-6">

      <div class="table-responsive">
        <table class="table">
          <tr>
            <td style="width:50%">Tanggal Pesan</td>
            <td><?php echo $data->tanggal_pesanan; ?></td>
          </tr>
          <tr>
            <td style="width:50%">Tanggal Lunas</td>
            <td><?php echo $data->tanggal_selesai; ?></td>
          </tr>
        </table>
    </div>
  </div>
    <!-- /.col -->
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="col-sm-3">
  <center><h3>Biaya Bahan Baku</h3></center>
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-bordered" >
        <thead>
        <tr>
          <th>Jumlah</th>
          <th>ID BB</th>
          <th>Harga</th>
          <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach ($dataBbb as $bbb): ?>
        <tr>
          <td><?php echo $bbb->jumlah; ?></td>
          <td><?php echo $bbb->id; ?></td>
          <td><?php echo $bbb->harga; ?></td>
          <td><?php echo $bbb->total; ?></td>
        </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- Table row -->
  <div class="col-sm-3">
  <center><h3>Biaya Bahan Penolong</h3></center>
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>Jumlah</th>
          <th>ID BP</th>
          <th>Harga</th>
          <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach ($dataBbp as $bbb): ?>
        <tr>
          <td><?php echo $bbb->jumlah; ?></td>
          <td><?php echo $bbb->id; ?></td>
          <td><?php echo $bbb->harga; ?></td>
          <td><?php echo $bbb->total; ?></td>
        </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>    
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- Table row -->
  <div class="col-sm-3">
  <center><h3>Biaya TKL</h3></center>
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>ID PG</th>
          <th>Gaji/Jam</th>
          <th>Total Jam</th>
          <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach ($dataBtkl as $bbb): ?>
        <tr>
          <td><?php echo $bbb->id; ?></td>
          <td><?php echo $bbb->gaji; ?></td>
          <td><?php echo $bbb->total_jam; ?></td>
          <td><?php echo $bbb->biaya; ?></td>
        </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- Table row -->
  <div class="col-sm-3">
  <center><h3>Biaya Overhead Pabrik</h3></center>
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>ID Produksi</th>
          <th>Hari</th>
          <th>Biaya</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($dataOverhead as $bbb): ?>
            <tr>
            <td><?php echo $bbb->id; ?></td>
            <td><?php echo $bbb->hari; ?></td>
            <td><?php echo $bbb->biaya; ?></td>
        </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


  <div class="row">
    <div class="col-xs-12">

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Biaya Bahan Baku:</th>
            <td><?php echo rupiah($total_biaya_bb); ?></td>
          </tr>
          <tr>
            <th>Biaya Bahan Penolong</th>
            <td><?php echo rupiah($total_biaya_bp) ?></td>
          </tr>
          <tr>
            <th>Biaya Tenaga Kerja Langsung</th>
            <td><?php echo rupiah($total_biaya_tkl) ?></td>
          </tr>
          <tr>
            <th>Biaya Overhead Pabrik</th>
            <td><?php echo rupiah($total_biaya_overhead) ?></td>
          </tr>
          <tr>
            <th><b>Total</b></th>
            <td><?php echo rupiah($total_biaya) ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <!-- /.row -->

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