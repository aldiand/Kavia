<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-bahanPenolong"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama Bahan Penolong</th>
          <th>Satuan</th>
          <th>Jumlah</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-bahanPenolong">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_bahanPenolong; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataBahanPenolong', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'BahanPenolong';
  $data['url'] = 'BahanPenolong/import';
  echo show_my_modal('modals/modal_import', 'import-bahanPenolong', $data);
?>
