<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Bahan Penolong</h3>

  <form id="form-tambah-bahanPenolong" method="POST">
    <div class="input-group form-group">
      <label  class="control-label">ID</label>
      <input type="text" class="form-control" placeholder="ID" name="sid" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Nama Bahan Penolong</label>
      <input type="text" class="form-control" placeholder="nama bahan penolong" name="nama" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Satuan</label>
      <input type="text" class="form-control" placeholder="satuan" name="satuan" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Harga</label>
      <input type="text" class="form-control" placeholder="Harga" name="harga" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <input type="hidden" class="form-control" placeholder="jumlah" value="0" name="jumlah" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit"  class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
