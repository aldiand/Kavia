<?php $dataOverhead = $dataOverhead[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Overhead</h3>
      <form method="POST" id="form-update-overhead">

        <div class="input-group form-group">
        <input type="hidden" name="id" value="<?php echo $dataOverhead->id; ?>">
        <div class="input-group form-group">
          <input type="hidden" class="form-control" placeholder="ID" name="sid" value="<?php echo $dataOverhead->sid; ?>" aria-describedby="sizing-addon2">
        </div>
          <label  class="control-label">Nama Data Overhead</label>
          <input type="text" class="form-control" placeholder="nama overhead" name="nama" value="<?php echo $dataOverhead->nama; ?>" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Harga per Bulan</label>
          <input type="text" class="form-control rupiah" id="harga1" placeholder="0" value="<?php echo $dataOverhead->harga_per_bulan; ?>" onchange="hitung()" name="harga_per_bulan" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
          <label  class="control-label">Persen dibebankan</label>
          <input type="number" class="form-control" placeholder="0" id="persen1" value="<?php echo $dataOverhead->dibebankan_per_produksi/$dataOverhead->harga_per_bulan*100 ?>" onchange="hitung()" aria-describedby="sizing-addon2">
        </div>
        <script>
        function hitung()
        {
          var cost = document.getElementById('harga1').value.replace(/\D/g, '');
          var discount = document.getElementById('persen1').value;
          //do the math
          var net = cost*(discount/100);
          //update
          document.getElementById('dibebankan1').value = net;
          $("#dibebankan1").trigger('input');
        }
        </script>
        <div class="input-group form-group">
          <label  class="control-label">Dibebankan per produksi</label>
          <input type="text" readonly="readonly" class="form-control rupiah" placeholder="0" id="dibebankan1" value="<?php echo $dataOverhead->dibebankan_per_produksi; ?>" name="dibebankan_per_produksi" aria-describedby="sizing-addon2">
        </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>
