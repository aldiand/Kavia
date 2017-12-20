<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-pesanan"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tanggal Pesanan</th>
          <th>Nama Pemesan</th>
          <th>Alamat</th>
          <th>Pesanan</th>
          <th>Deskripsi</th>
          <th>Harga Kisaran</th>
          <th>Jumlah</th>
          <th>Tanggal Estimasi</th>
          <th>DP</th>
          <th>Status</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-pesanan">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_pesanan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPesanan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Pesanan';
  $data['url'] = 'Pesanan/import';
  echo show_my_modal('modals/modal_import', 'import-pesanan', $data);
?>
