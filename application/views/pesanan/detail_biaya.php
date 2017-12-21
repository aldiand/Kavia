<?php
  foreach ($dataPesanan as $data) {
    ?>
<section class="content-header">
  <h1>
    Detail Biaya
    <small>#<?php echo $data->id;?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Invoice</li>
  </ol>
</section>

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> Kaina Management #<?php echo $data->id;?>.
        <small class="pull-right">Tanggal: <?php echo Date('d-m-Y'); ?></small>
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <address>
        <strong>Sdr <?php echo $data->nama_pemesan; ?>.</strong><br>
        <?php echo $data->alamat; ?><br>
        Nomor Telpon: <?php echo $data->no_telp; ?><br>
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      Produk
      <address>
        <strong><?php echo $data->pesanan; ?></strong><br>
        Deskripsi : <br>
        <?php echo $data->deskripsi_pesanan; ?>
      </address>
    </div>
    <!-- /.col -->
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <center><h2>Bahan Baku</h2></center>
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Jumlah</th>
          <th>ID</th>
          <th>Bahan Baku</th>
          <th>Harga</th>
          <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach ($dataBbb as $bbb): ?>
        <tr>
          <td><?php echo $bbb->jumlah; ?></td>
          <td><?php echo $bbb->id; ?></td>
          <td><?php echo $bbb->nama_bahan_baku; ?></td>
          <td><?php echo $bbb->harga; ?></td>
          <td><?php echo $bbb->total; ?></td>
        </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
      <h4 class="pull-right">Total = <?php echo $total_biaya_bb ?> </h4>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- Table row -->
  <center><h2>Bahan Penolong</h2></center>
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Jumlah</th>
          <th>ID</th>
          <th>Bahan Penolong</th>
          <th>Harga</th>
          <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach ($dataBbp as $bbb): ?>
        <tr>
          <td><?php echo $bbb->jumlah; ?></td>
          <td><?php echo $bbb->id; ?></td>
          <td><?php echo $bbb->nama; ?></td>
          <td><?php echo $bbb->harga; ?></td>
          <td><?php echo $bbb->total; ?></td>
        </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <h4 class="pull-right">Total = <?php echo $total_biaya_bp ?> </h4>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- Table row -->
  <center><h2>Tenaga Kerja Langsung</h2></center>
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nama Pegawai</th>
          <th>Gaji/Jam</th>
          <th>Total Jam</th>
          <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach ($dataBtkl as $bbb): ?>
        <tr>
          <td><?php echo $bbb->id; ?></td>
          <td><?php echo $bbb->nama_pegawai; ?></td>
          <td><?php echo $bbb->gaji; ?></td>
          <td><?php echo $bbb->total_jam; ?></td>
          <td><?php echo $bbb->biaya; ?></td>
        </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <h4 class="pull-right">Total = <?php echo $total_biaya_tkl ?> </h4>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- Table row -->
  <center><h2>Overhead</h2></center>
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>ID Produksi</th>
          <th>Jumlah Hari</th>
          <th>Biaya Overhead</th>
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
      <h4 class="pull-right">Total = <?php echo $total_biaya_overhead ?> </h4>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


  <div class="row">
    <div class="col-xs-6">

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Biaya Bahan Baku:</th>
            <td><?php echo $total_biaya_bb; ?></td>
          </tr>
          <tr>
            <th>Biaya Bahan Penolong</th>
            <td><?php echo $total_biaya_bp ?></td>
          </tr>
          <tr>
            <th>Biaya Tenaga Kerja Langsung</th>
            <td><?php echo $total_biaya_tkl ?></td>
          </tr>
          <tr>
            <th>Biaya Overhead Pabrik</th>
            <td><?php echo $total_biaya_overhead ?></td>
          </tr>
          <tr>
            <th>Total</th>
            <td><?php echo $total_biaya ?></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-xs-6">

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Harga Jual:</th>
            <td><?php echo (120*$total_biaya/100); ?></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
      <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
      </button>
      <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
        <i class="fa fa-download"></i> Generate PDF
      </button>
    </div>
  </div>
</section>
<?php } ?>
