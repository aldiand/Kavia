
<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
<?php
  foreach ($dataPesanan as $data) {
    ?>
<div class="row">
  <div class="col-md-12">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="col-md-12" style="padding: 0;">
      <h3 class="profile-username text-left">ID Pesanan : <?php echo $data->id; ?></h3>
    </div>
  </div>
    </div>

  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <p class="text-muted text-center">Detail Pemesan</p>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Tanggal Pesanan</b> <br> <a style="word-wrap: break-word;"><?php echo $data->tanggal_pesanan; ?></a>
          </li>
          <li class="list-group-item">
            <b>Nama Pemesan</b> <br> <a style="word-wrap: break-word;"><?php echo $data->nama_pemesan; ?></a>
          </li>
          <li class="list-group-item">
          <b>Alamat</b> <br> <a style="word-wrap: break-word;"><?php echo $data->alamat; ?></a>
          </li>
          <li class="list-group-item">
          <b>No Telpon</b> <br> <a style="word-wrap: break-word;"><?php echo $data->no_telp; ?></a>
          </li>
      </div>
    </div>
  </div>
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <p class="text-muted text-center">Detail Pesanan</p>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Status Pesanan </b><br> <a style="word-wrap: break-word;"><?php echo getStatus($data->status); ?></a>
            </li>
            <li class="list-group-item">
              <b>Pesanan</b><br> <a style="word-wrap: break-word;"><?php echo $data->pesanan; ?></a>
            </li>
            <li class="list-group-item">
              <b>Deskripsi</b> <br> <a style="word-wrap: break-word;"><?php echo $data->deskripsi_pesanan; ?></a>
            </li>
            <li class="list-group-item">
            <b>Kesulitan</b><br> <a style="word-wrap: break-word;"><?php echo $data->kesulitan; ?></a>
            </li>
            <li class="list-group-item">
            <b>Jumlah</b><br> <a style="word-wrap: break-word;"><?php echo $data->jumlah; ?></a>
            </li>
        </div>
      </div>
    </div>

      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <p class="text-muted text-center">Detail Produksi</p>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Produksi aktif </b> <br> <a style="word-wrap: break-word;"><?php echo $a = getRowCountStatusPesanan('t_produksi', 'id_pesanan', $data->id, 1); ?></a>
              </li>
              <li class="list-group-item">
                <b>Produksi selesai </b> <br> <a style="word-wrap: break-word;"><?php echo $b = getRowCountStatusPesanan('t_produksi', 'id_pesanan', $data->id, 2); ?></a>
              </li>
              <li class="list-group-item">
              <b>Total Produksi</b> <br> <a style="word-wrap: break-word;"><?php echo $c=$a+$b; ?></a>
              </li>
              <?php if ($c==0) {?>
              <li class="list-group-item">
                <button class="btn btn-warning update-dataPesanan2" data-id="<?php echo $data->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-pesanan" data-id="<?php echo $data->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
              </li>
            <?php } else if ($b==$c && $data->status!=2) { ?>
            <li class="list-group-item">
              <button class="btn btn-success konfirmasiSelesai-pesanan" data-id="<?php echo $data->id; ?>" data-toggle="modal" data-target="#konfirmasiSelesai"><i class="glyphicon glyphicon-ok-sign"></i> Selesai</button>
            </li>

            <?php }

            ?>
          </div>
        </div>
      </div>


      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <p class="text-muted text-center">Detail Biaya</p>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Biaya Bahan Baku </b> <br> <a style="word-wrap: break-word;"><?php echo rupiah($total_biaya_bb); ?></a>
              </li>
              <li class="list-group-item">
                <b>Biaya Bahan Penolong </b> <br> <a style="word-wrap: break-word;"><?php echo rupiah($total_biaya_bp); ?></a>
              </li>
              <li class="list-group-item">
              <b>Beban BTKL</b><br> <a style="word-wrap: break-word;"><?php echo rupiah($total_biaya_tkl); ?></a>
              </li>
              <?php if ($data->status == 2): ?>
                <li class="list-group-item">
                <b>Beban BOP</b><br> <a style="word-wrap: break-word;"><?php echo rupiah($total_biaya_overhead); ?></a>
                </li>
                <li class="list-group-item">
                <b>Total Biaya </b><br> <a style="word-wrap: break-word;"><?php echo rupiah($total_biaya); ?></a>
                </li>
                <li class="list-group-item">
                <b>Harga Jual </b> <br> <a style="word-wrap: break-word;"><?php echo rupiah((130*$total_biaya/100)); ?></a>
                </li>
            <li class="list-group-item">
            <b>DP</b><br> <a style="word-wrap: break-word;"><?php echo rupiah($data->dp); ?></a>
            </li>
                <li class="list-group-item">
                <b>Total Bayar(Harga - DP)</b> <br> <a style="word-wrap: break-word;"><?php echo rupiah((130*$total_biaya/100)-$data->dp); ?></a>
                </li>
                <!-- <a href="<?php echo base_url('/Pesanan/detail/').$data->id?>"><button class="btn btn-success" data-id="<?php echo $data->id; ?>"><i class="glyphicon glyphicon-files"></i> Detail</button></a> -->

              <?php endif; ?>

          </div>
        </div>
      </div>

</div>

<?php
  }
  ?>
</ul>

<!--
<div class="box">
  <div class="box-header">
  <div class="col-md-12" style="padding: 0;">
  <h3 class="profile-username text-left">Produksi</h3>
</div>
    <div class="col-md-12" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-produksi"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
  </div>
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Selesai</th>
          <th>Deskripsi</th>
          <th>Status</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-produksi">

      </tbody>
    </table>
  </div>
-->
</div>

<div id="tempat-modal"></div>

<?php echo $modal_tambah_produksi; ?>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSelesai', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>

<?php show_my_confirm('konfirmasiSelesai', 'selesai-dataPesanan', 'Selesaikan Pesanan Ini?', 'Ya'); ?>
