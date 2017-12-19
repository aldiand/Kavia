<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
        <h3 class="profile-username text-left">Pesanan Selesai</h3>
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
        </tr>
      </thead>
      <tbody id="data-riwayatPesanan">
        <?php
          foreach ($dataPesanan as $data) {
            ?>
            <tr>
              <td><a href="<?php echo base_url('/Pesanan/id/').$data->id?>"><?php echo $data->id; ?></a></td>
              <td><?php echo $data->tanggal_pesanan; ?></td>
              <td><?php echo $data->nama_pemesan; ?></td>
              <td><?php echo $data->alamat; ?></td>
              <td><?php echo $data->pesanan; ?></td>
              <td><?php echo $data->deskripsi_pesanan; ?></td>
              <td><?php echo $data->harga_kisaran; ?></td>
              <td><?php echo $data->jumlah; ?></td>
              <td><?php echo $data->tanggal_estimasi; ?></td>
              <td><?php echo $data->dp; ?></td>
            </tr>
            <?php
          }
        ?>

      </tbody>
    </table>
  </div>
</div>

<div id="tempat-modal"></div>
