<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Pesanan</h3>

  <form id="form-tambah-pesanan" method="POST">
    <input type="hidden" value="0" name="status">
    <input type="hidden" id="date-hidden" value="<?php echo Date('Y-m-d');?>" name="tanggal_pesanan">
    <div class="input-group form-group">
      <label  class="control-label">Nama Pemesan</label>
      <input type="text" class="form-control" placeholder="Nama Pemesan" name="nama_pemesan" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Alamat</label>
      <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Nomer Telpon</label>
      <input type="text" class="form-control" placeholder="Nomer Telpon" name="no_telp" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Pesanan</label>
      <input type="text" class="form-control" placeholder="Pesanan" name="pesanan" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Deskripsi</label>
      <textarea class="form-control" placeholder="Deskripsi pesanan" name="deskripsi_pesanan" aria-describedby="sizing-addon2"></textarea>
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Jumlah</label>
      <input type="number" class="form-control" placeholder="Jumlah pesanan" name="jumlah" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Harga Kisaran</label>
      <input type="number" class="form-control" placeholder="Harga Kisaran" name="harga_kisaran" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Tanggal Estimasi</label>
      <input type="date" class="form-control" placeholder="Tanggal Estimasi" name="tanggal_estimasi" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">DP</label>
      <input type="number" class="form-control" placeholder="DP" name="dp" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
