<?php $dataProduksi = $dataProduksi[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Produksi</h3>
      <form method="POST" id="form-update-produksi">
        <div class="input-group form-group">
        <input type="hidden" name="id" value="<?php echo $dataProduksi->id; ?>">
        </div>
      <div class="input-group form-group">
        <label  class="control-label">Deskripsi</label>
        <textarea class="form-control" placeholder="Deskripsi " name="deskripsi" aria-describedby="sizing-addon2"><?php echo $dataProduksi->deskripsi;?></textarea>
      </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>
