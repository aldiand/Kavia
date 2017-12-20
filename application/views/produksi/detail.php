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
        <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
        <li><a href="#btkl" data-toggle="tab">BTKL</a></li>
        <li><a href="#bb" data-toggle="tab">Bahan Baku</a></li>
        <li><a href="#bop" data-toggle="tab">BOP</a></li>
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
                    <b>Deskripsi</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->deskripsi; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Tanggal Mulai</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->tanggal_mulai; ?></a>
                  </li>

                  <li class="list-group-item">
                    <b>Tanggal Selesai</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->tanggal_selesai; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>ID Pesanan</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->id_pesanan; ?></a>
                  </li>
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
                  <b>Jumlah Tenaga Kerja</b> <br> <a style="word-wrap: break-word;"><?php echo getRowCountTablebyProduksi('t_btkl', $produksi->id, 'id_pegawai'); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Total Jam</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->tanggal_mulai; ?></a>
                </li>

                <li class="list-group-item">
                  <b>Total Biaya</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->tanggal_selesai; ?></a>
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
            <p class="text-muted text-center">Detail BOP</p>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Jumlah Overhead</b> <br> <a style="word-wrap: break-word;"><?php echo getRowCountTablebyProduksi('t_bop', $produksi->id); ?></a>
            </li>
            <li class="list-group-item">
              <b>Total Biaya</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->tanggal_mulai; ?></a>
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
            <b>Total Biaya</b> <br> <a style="word-wrap: break-word;"><?php echo $produksi->tanggal_mulai; ?></a>
          </li>
        </ul>
      </div>
  </div>
</div>
      </div>
      </div>
        <div class="tab-pane" id="btkl">
          <div class="row">
            <div class="col-md-12">

            </div>
          </div>
        </div>
        <div class="tab-pane" id="bb">
            <div class="row">
              <div class="col-md-12">

                  <div class="box-header">
                    <div class="col-md-12" style="padding: 0;">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-bb-produksi"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
                    </div>
                  </div>
                  <table id="list-data" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama Bahan Baku</th>
                        <th>Jumlah</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="data-bbTerpakai">

                    </tbody>
                  </table>
              </div>
            </div>
        </div>
        <div class="tab-pane" id="bop">
            <div class="row">
              <div class="col-md-12">

                  <div class="box-header">
                    <div class="col-md-12" style="padding: 0;">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-bop-produksi"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
                    </div>
                  </div>
                  <table id="list-data" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama Bahan Baku</th>
                        <th>Jumlah</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="data-bop-produksi">

                    </tbody>
                  </table>
              </div>
            </div>
        </div>
        <div class="tab-pane" id="bbp">
            <div class="row">
              <div class="col-md-12">

                  <div class="box-header">
                    <div class="col-md-12" style="padding: 0;">
                        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-bbp-produksi"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
                    </div>
                  </div>
                  <table id="list-data" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama Bahan Baku</th>
                        <th>Jumlah</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="data-bbp-produksi">

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
<?php echo $modal_tambah_produksi; ?>
<?php echo $modal_tambah_bb; ?>
<?php echo $modal_tambah_bop; ?>
<?php echo $modal_tambah_bbp; ?>
<?php echo $modal_tambah_btkl; ?>
