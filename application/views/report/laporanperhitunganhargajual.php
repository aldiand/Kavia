<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
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
          <th>Kesulitan </th>
          <th>Jumlah</th>
          <th>DP</th>
          <th>Aksi</th>
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
              <td><?php echo $data->kesulitan; ?></td>
              <td><?php echo $data->jumlah; ?></td>
              <td><?php echo $data->dp; ?></td>
              <td><a href="<?php echo base_url('/Report/LihatLaporanPerhitunganHargaJual/').$data->id?>"> <button class="btn btn-info detail-dataPosisi" data-id="<?php echo $data->id; ?>"><i class="glyphicon glyphicon-search"></i> Lihat</button></a></td>
            </tr>
            <?php
          }
        ?>

      </tbody>
    </table>
  </div>
</div>

<div id="tempat-modal"></div>
