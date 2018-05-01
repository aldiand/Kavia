<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Produksi</h3>

  <form id="form-tambah-produksi" method="POST">
    <input type="hidden" value="1" name="status">
  <div class="input-group form-group">
    <label  class="control-label">Pesanan</label>
    <select name="id_pesanan" class="form-control select2" aria-describedby="sizing-addon2">
      <?php
      foreach ($dataPesanan as $bb) {
        ?>
        <option value="<?php echo $bb->id; ?>">
          <?php echo $bb->id .' - '. $bb->nama_pemesan; ?>
        </option>
        <?php
      }
      ?>
    </select>
  </div>
  <div class="input-group form-group">
    <label  class="control-label">Deskripsi</label>
    <textarea class="form-control" placeholder="Deskripsi " name="deskripsi" aria-describedby="sizing-addon2"></textarea>
  </div>
      <input type="hidden" class="form-control" value="<?php echo Date('Y-m-d');?>" name="tanggal_mulai" aria-describedby="sizing-addon2">
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
