<?php $dataBbp = $dataBbp[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Biaya Bahan Penolong</h3>
      <form method="POST" id="form-update-bbp">
        <div class="input-group form-group">
        <input type="hidden" name="id" value="<?php echo $dataBbp->id; ?>">
        </div>
          <div class="input-group form-group">
            <label  class="control-label">Tanggal</label>
            <input type="date" class="form-control" value="<?php echo $dataBbp->tanggal;?>" name="tanggal" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Bahan penolong</label>
            <select name="id_bahan_penolong" class="form-control select2" aria-describedby="sizing-addon2">
              <?php
              foreach ($dataBahanPenolong as $bb) {
                ?>
                <option value="<?php echo $bb->id; ?>" <?php echo $dataBbp->id_bahan_penolong==$bb->id?'selected':''?>>
                  <?php echo $bb->nama; ?>
                </option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Jumlah</label>
            <input type="number" class="form-control" value="<?php echo $dataBbp->jumlah;?>" name="jumlah" aria-describedby="sizing-addon2">
          </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>