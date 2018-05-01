<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Pegawai</h3>

  <form id="form-tambah-pegawai" method="POST">
    <div class="input-group form-group">
      <label  class="control-label">Nama</label>
      <input type="text" class="form-control" placeholder="Nama" name="nama_pegawai" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Alamat</label>
      <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Jenis Pegawai</label>
      <select name="tipe_gaji" class="form-control select2" aria-describedby="sizing-addon2">
          <option value="tetap">
            Tetap
          </option>
          <option value="btkl">
            BTKL
          </option>
      </select>
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Gaji</label>
      <input type="number" class="form-control" placeholder="Gaji" name="gaji" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Nomer Telpon</label>
      <input type="text" class="form-control" placeholder="No_Telp" name="no_telp" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
