<?php
  foreach ($dataProduksi as $produksi) {
    ?>
<div class="row">
  <div class="col-md-12">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="col-md-12" style="padding: 0;">
      <h3 class="profile-username text-left">ID Produksi : <?php echo $produksi->id; ?></h3>
    </div>
  </div>
    </div>
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo base_url('Produksi/id/'.$this->uri->segment(3)); ?>" id="taboverview">Overview</a></li>
        <li><a href="#btkl" data-toggle="tab">BTKL</a></li>
        <li><a href="#bb" data-toggle="tab">Bahan Baku</a></li>
        <li><a href="#bbp" data-toggle="tab">Bahan Penolong</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="overview">
          <div class="row">
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box">
              <div class="box-body box-profile">
                <p class="text-muted text-center">Detail Produksi</p>
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                  <li class="list-group-item">
                    <b>ID Pesanan</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->id_pesanan; ?></a>
                  </li>
                    <b>Status</b> <br> <a style="word-wrap: break-word;"><?php echo getStatus($produksi->status); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Deskripsi</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->deskripsi; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Tanggal Mulai</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->tanggal_mulai; ?></a>
                  </li>
                  <?php if ($produksi->status==2): ?>
                  <li class="list-group-item">
                    <b>Tanggal Selesai</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->tanggal_selesai; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Biaya Overhead</b> <br> <a style="word-wrap: break-word;"><?php echo (20000*(date_create($produksi->tanggal_selesai)->diff(date_create($produksi->tanggal_mulai)))->format('%d')); ?></a>
                  </li>

                  <?php endif; ?>
                </ul>
              </div>
          </div>
        </div>
          <div class="col-md-2">
            <!-- Profile Image -->
            <div class="box">
            <div class="box-body box-profile">
                <p class="text-muted text-center">Detail BTKL</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Jumlah Tenaga Kerja</b> <br> <a style="word-wrap: break-word;"><?php echo getRowCountTablebyProduksi('t_btkl', $produksi->id); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Total Jam</b> <br> <a style="word-wrap: break-word;"><?php echo $total_jam_tkl ; ?></a>
                </li>

                <li class="list-group-item">
                  <b>Total Biaya</b> <br> <a style="word-wrap: break-word;"><?php echo $total_biaya_tkl; ?></a>
                </li>
              </ul>
            </div>
        </div>
      </div>
        <div class="col-md-2">
          <!-- Profile Image -->
          <div class="box">
          <div class="box-body box-profile">
              <p class="text-muted text-center">Detail Bahan Baku</p>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Jumlah Bahan Baku</b> <br> <a style="word-wrap: break-word;"><?php echo getRowCountTablebyProduksi('t_bb_terpakai', $produksi->id); ?></a>
              </li>
              <li class="list-group-item">
                <b>Total Biaya</b> <br> <a style="word-wrap: break-word;"><?php echo $total_biaya_bb; ?></a>
              </li>
            </ul>
          </div>
      </div>
    </div>
    <div class="col-md-2">
      <!-- Profile Image -->
      <div class="box">
      <div class="box-body box-profile">
          <p class="text-muted text-center">Detail Bahan Penolong</p>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Jumlah Bahan Penolong</b> <br> <a style="word-wrap: break-word;"><?php echo getRowCountTablebyProduksi('t_biaya_bahan_penolong', $produksi->id); ?></a>
          </li>
          <li class="list-group-item">
            <b>Total Biaya</b> <br> <a style="word-wrap: break-word;"><?php echo $total_biaya_bp; ?></a>
          </li>
        </ul>
      </div>
  </div>
</div>
<?php if ($produksi->status != 2): ?>

<div class="col-md-2">
  <!-- Profile Image -->
  <div class="box">
  <div class="box-body box-profile">
      <p class="text-muted text-center">Proses</p>
    <ul class="list-group list-group-unbordered">
      <li class="list-group-item">

        <button class="btn btn-success konfirmasiSelesai" data-id="<?php echo $produksi->id; ?>" data-toggle="modal" data-target="#konfirmasiSelesai"><i class="glyphicon glyphicon-ok-sign"></i> Selesai Produksi</button>
      </li>
    </ul>
  </div>
</div>
</div>
<?php endif; ?>
      </div>
      </div>
        <div class="tab-pane" id="btkl">
          <div class="row">
            <div class="col-md-12">
              <?php if ($produksi->status != 2): ?>
                <div class="box-header">
                  <div class="col-md-12" style="padding: 0;">
                      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-btkl-produksi"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
                  </div>
                </div>
                <?php endif; ?>
                <table id="list-data3" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>Nama Pegawai</th>
                      <th>Jam Masuk</th>
                      <th>Jam Keluar</th>
                      <th>Biaya</th>
                      <?php if ($produksi->status != 2): ?>

                        <th style="text-align: center;">Aksi</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody id="data-btkl">

                  </tbody>
                </table>

            </div>
          </div>
        </div>
        <div class="tab-pane" id="bb">
            <div class="row">
              <div class="col-md-12">
                  <?php if ($produksi->status != 2): ?>

                    <div class="box-header">
                      <div class="col-md-12" style="padding: 0;">
                          <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-bb-produksi"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
                      </div>
                    </div>
                  <?php endif; ?>
                  <table id="list-data" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama Bahan Baku</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <?php if ($produksi->status != 2): ?>

                          <th style="text-align: center;">Aksi</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody id="data-bbTerpakai">

                    </tbody>
                  </table>
              </div>
            </div>
        </div>

        <div class="tab-pane" id="bbp">
            <div class="row">
              <div class="col-md-12">
                <?php if ($produksi->status != 2): ?>
                  <div class="box-header">
                    <div class="col-md-12" style="padding: 0;">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-bbp-produksi"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
                    </div>
                  </div>

                <?php endif; ?>
                  <table id="list-data2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama Bahan Baku</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <?php if ($produksi->status != 2): ?>

                          <th style="text-align: center;">Aksi</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody id="data-bbp">

                    </tbody>
                  </table>
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="msg" style="display:none;">
      <?php echo $this->session->flashdata('msg'); ?>
    </div>
  </div>
</div>
<?php }
?>

<div id="tempat-modal"></div>
<?php show_my_confirm('konfirmasiHapusBbb', 'hapus-dataBbTerpakai', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php show_my_confirm('konfirmasiHapusBbp', 'hapus-dataBbp', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php show_my_confirm('konfirmasiHapusBtkl', 'hapus-dataBtkl', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php show_my_confirm('konfirmasiSelesai', 'selesai-produksi', 'Set Selesai?', 'Ya, Produksi Selesai'); ?>
<?php echo $modal_tambah_produksi; ?>
<?php echo $modal_tambah_bb; ?>
<?php echo $modal_tambah_bop; ?>
<?php echo $modal_tambah_bbp; ?>
<?php echo $modal_tambah_btkl; ?>
