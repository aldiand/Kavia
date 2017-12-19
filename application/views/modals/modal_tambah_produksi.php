<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Produksi</h3>

  <form id="form-tambah-produksi" method="POST">
    <input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="id_pesanan">
    <input type="hidden" value="1" name="status">
  <div class="input-group form-group">
    <label  class="control-label">Deskripsi</label>
    <textarea class="form-control" placeholder="Deskripsi " name="deskripsi" aria-describedby="sizing-addon2"></textarea>
  </div>
    <div class="input-group form-group">
      <label  class="control-label">Tanggal Mulai</label>
      <input type="date" class="form-control" value="<?php echo Date('Y-m-d');?>" name="tanggal_mulai" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
