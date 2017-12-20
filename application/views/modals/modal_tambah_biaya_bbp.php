<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Bahan Penolong</h3>

  <form id="form-tambah-bbp" method="POST">
    <div class="input-group form-group">
      <label  class="control-label">Tanggal</label>
      <input type="date" class="form-control" value="<?php echo Date('Y-m-d');?>" name="tanggal" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Bahan Penolong</label>
      <select name="id_bahan_penolong" class="form-control select2" aria-describedby="sizing-addon2">
        <?php
        foreach ($dataBahanPenolong as $bb) {
          ?>
          <option value="<?php echo $bb->id; ?>">
            <?php echo $bb->nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Jumlah</label>
      <input type="number" class="form-control" name="jumlah" aria-describedby="sizing-addon2">
    </div>
    <?php if (!empty($this->uri->segment(3))): ?>
      <input type="hidden" class="form-control" name="id_produksi" value="<?php echo $this->uri->segment(3);?>" aria-describedby="sizing-addon2">
    <?php endif; ?>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
