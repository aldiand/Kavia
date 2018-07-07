<?php $dataPegawai = $dataPegawai[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Penggajian</h3>

  <form id="form-penggajian" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataPegawai->id; ?>">
    <div class="input-group form-group">
      <label  class="control-label">Nominal Gaji</label>
      <input type="text" class="form-control" placeholder="gaji" name="beban_gaji" value="<?php echo $dataPegawai->gaji;?>"  aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
