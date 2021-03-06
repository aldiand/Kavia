<?php $dataPegawai = $dataPegawai[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pegawai</h3>
      <form method="POST" id="form-update-pegawai">
        <input type="hidden" name="id" value="<?php echo $dataPegawai->id; ?>">
        <div class="input-group form-group">
          <input type="hidden" class="form-control" placeholder="ID" name="sid" value="<?php echo $dataPegawai->sid; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Nama</label>
          <input type="text" class="form-control" placeholder="Nama" name="nama_pegawai" value="<?php echo $dataPegawai->nama_pegawai; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Alamat</label>
          <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $dataPegawai->alamat; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Jenis Pegawai</label>
          <select name="tipe_gaji" class="form-control select2" aria-describedby="sizing-addon2">
              <option value="<?php echo $dataPegawai->tipe_gaji; ?>">
                <?php echo $dataPegawai->tipe_gaji; ?>
              </option>
              <option value="perproject">
                Perproject
              </option>
              <option value="tetap">
                Tetap
              </option>
              <option value="perpesanan">
                Perpesanan
              </option>
          </select>
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Gaji</label>
          <input type="text" class="form-control rupiah" placeholder="Gaji" name="gaji" value="<?php echo $dataPegawai->gaji; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Nomer Telpon</label>
          <input type="text" class="form-control" placeholder="No_Telp" name="no_telp" value="<?php echo $dataPegawai->no_telp; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>
