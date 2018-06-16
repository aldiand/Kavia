<?php $dataBahanBaku = $dataBahanBaku[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data BahanBaku</h3>
      <form method="POST" id="form-update-bahanBaku">
  
        <div class="input-group form-group">
          <input type="hidden" class="form-control" placeholder="ID" name="sid" value="<?php echo $dataBahanBaku->sid; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
        <input type="hidden" name="id" value="<?php echo $dataBahanBaku->id; ?>">
          <label  class="control-label">Nama Bahan Baku</label>
          <input type="text" class="form-control" placeholder="nama bahan baku" name="nama_bahan_baku" value="<?php echo $dataBahanBaku->nama_bahan_baku; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Satuan</label>
          <input type="text" class="form-control" placeholder="satuan" name="satuan" value="<?php echo $dataBahanBaku->satuan; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Harga</label>
          <input type="text" class="form-control" placeholder="harga" name="harga" value="<?php echo $dataBahanBaku->harga; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Jumlah</label>
          <input type="text" class="form-control" placeholder="Jumlah" name="jumlah" value="<?php echo $dataBahanBaku->jumlah; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>
