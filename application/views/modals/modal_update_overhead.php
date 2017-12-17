<?php $dataOverhead = $dataOverhead[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Overhead</h3>
      <form method="POST" id="form-update-overhead">

        <div class="input-group form-group">
        <input type="hidden" name="id" value="<?php echo $dataOverhead->id; ?>">
          <label  class="control-label">Nama Data Overhead</label>
          <input type="text" class="form-control" placeholder="nama overhead" name="nama" value="<?php echo $dataOverhead->nama; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Satuan</label>
          <input type="text" class="form-control" placeholder="satuan" name="satuan" value="<?php echo $dataOverhead->satuan; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Harga</label>
          <input type="number" class="form-control" placeholder="harga" name="harga" value="<?php echo $dataOverhead->harga; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>
