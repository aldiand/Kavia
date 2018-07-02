<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-bahanBaku"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama Bahan Baku</th>
          <th>Jumlah</th>
          <th>Satuan</th>
          <th>Harga</th>
          <th>Total Keseluruhan</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-bahanBaku">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_bahanBaku; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataBahanBaku', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'BahanBaku';
  $data['url'] = 'BahanBaku/import';
  echo show_my_modal('modals/modal_import', 'import-bahanBaku', $data);
?>
