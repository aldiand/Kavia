<?php $dataPesanan = $dataPesanan[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pesanan</h3>
      <form method="POST" id="form-update-pesanan">

          <input type="hidden" value="<?php echo $dataPesanan->status; ?>" name="status">
          <input type="hidden" value="<?php echo $dataPesanan->id; ?>" name="id">
          <div class="input-group form-group">
            <label  class="control-label">Nama Pemesan</label>
            <input type="text" class="form-control" placeholder="Nama Pemesan" name="nama_pemesan" value="<?php echo $dataPesanan->nama_pemesan; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Alamat</label>
            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $dataPesanan->alamat; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Nomer Telpon</label>
            <input type="text" class="form-control" placeholder="Nomer Telpon" name="no_telp" value="<?php echo $dataPesanan->no_telp; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Pesanan</label>
            <input type="text" class="form-control" placeholder="Pesanan" name="pesanan" value="<?php echo $dataPesanan->pesanan; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Deskripsi</label>
            <textarea class="form-control" placeholder="Deskripsi pesanan" name="deskripsi_pesanan" aria-describedby="sizing-addon2"><?php echo $dataPesanan->deskripsi_pesanan; ?></textarea>
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Jumlah</label>
            <input type="number" class="form-control" placeholder="Jumlah pesanan" name="jumlah" value="<?php echo $dataPesanan->jumlah; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Harga Kisaran</label>
            <input type="number" class="form-control" placeholder="Harga Kisaran" name="harga_kisaran" value="<?php echo $dataPesanan->harga_kisaran; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Tanggal Estimasi</label>
            <input type="date" class="form-control" placeholder="Tanggal Estimasi" name="tanggal_estimasi" value="<?php echo $dataPesanan->tanggal_estimasi; ?>" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">DP</label>
            <input type="number" class="form-control" placeholder="DP" name="dp" value="<?php echo $dataPesanan->dp; ?>" aria-describedby="sizing-addon2">
          </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>
