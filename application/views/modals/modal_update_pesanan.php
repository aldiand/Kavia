<?php $dataPegawai = $dataPegawai[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pegawai</h3>
      <form method="POST" id="form-update-pesanan">

          <input type="hidden" value="<?php echo $dataPegawai->status; ?>" name="status">
          <div class="input-group form-group">
            <label  class="control-label">Nama Pemesan</label>
            <input type="text" class="form-control" placeholder="Nama Pemesan" name="nama_pemesan" value="<?php echo $dataPegawai->nama_pemesan; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Alamat</label>
            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $dataPegawai->alamat; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Nomer Telpon</label>
            <input type="text" class="form-control" placeholder="Nomer Telpon" name="no_telp" value="<?php echo $dataPegawai->no_telp; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Pesanan</label>
            <input type="text" class="form-control" placeholder="Pesanan" name="pesanan" value="<?php echo $dataPegawai->pesanan; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Deskripsi</label>
            <textarea class="form-control" placeholder="Deskripsi pesanan" name="deskripsi_pesanan" aria-describedby="sizing-addon2"><?php echo $dataPegawai->deskripsi_pesanan; ?></textarea>
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Jumlah</label>
            <input type="number" class="form-control" placeholder="Jumlah pesanan" name="jumlah" value="<?php echo $dataPegawai->jumlah; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Harga Kisaran</label>
            <input type="number" class="form-control" placeholder="Harga Kisaran" name="harga_kisaran" value="<?php echo $dataPegawai->harga_kisaran; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Tanggal Estimasi</label>
            <input type="date" class="form-control" placeholder="Tanggal Estimasi" name="tanggal_estimasi" value="<?php echo $dataPegawai->tanggal_estimasi; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">DP</label>
            <input type="number" class="form-control" placeholder="DP" name="dp" value="<?php echo $dataPegawai->dp; ?>" aria-describedby="sizing-addon2">
          </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>
