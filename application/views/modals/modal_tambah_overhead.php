<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Overhead</h3>

  <form id="form-tambah-overhead" method="POST">

    <div class="input-group form-group">
      <input type="hidden" value='0' class="form-control" placeholder="ID" name="sid" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Nama Overhead</label>
      <input type="text" class="form-control" placeholder="nama overhead" name="nama" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Harga per Bulan</label>
      <input type="number" class="form-control" id="harga" placeholder="0" onchange="hitung()" name="harga_per_bulan" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Persen dibebankan</label>
      <input type="number" class="form-control" placeholder="0" value="0" id="persen" onchange="hitung()" aria-describedby="sizing-addon2">
    </div>
    <script>
    function hitung()
    {
      var cost = document.getElementById('harga').value;
      var discount = document.getElementById('persen').value;
      //do the math
      var net = cost*(discount/100);
      //update
      document.getElementById('dibebankan').value = net;
    }
    </script>
    <div class="input-group form-group">
      <label  class="control-label">Dibebankan per produksi</label>
      <input type="text" readonly="readonly" class="form-control" placeholder="0" id="dibebankan" name="dibebankan_per_produksi" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
