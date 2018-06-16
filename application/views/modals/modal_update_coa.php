<?php $dataCoa = $dataCoa[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Coa</h3>
      <form method="POST" id="form-update-coa">

        <div class="input-group form-group">
        <input type="hidden" name="id" value="<?php echo $dataCoa->id; ?>">
          <input type="hidden" class="form-control" placeholder="Kode akun" name="kode" value="<?php echo $dataCoa->kode; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Nama</label>
          <input type="text" class="form-control" placeholder="Nama Akun" name="nama" value="<?php echo $dataCoa->nama; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>
