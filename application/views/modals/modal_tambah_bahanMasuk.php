<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Bahan Masuk</h3>

  <form id="form-tambah-BahanMasuk" method="POST">
  <input type="hidden" name="tanggal" value="<?php echo Date('Y-m-d'); ?>">
  <div class="input-group form-group">
    <label  class="control-label">Bahan baku</label>
    <select name="id_bbb" class="form-control select2" aria-describedby="sizing-addon2">
      <?php
      foreach ($dataBahanBaku as $bb) {
        ?>
        <option value="<?php echo $bb->id; ?>">
          <?php echo $bb->nama_bahan_baku; ?>
        </option>
        <?php
      }
      ?>
    </select>
  </div>
    <div class="input-group form-group">
      <label  class="control-label">Harga beli</label>
      <input type="text" class="form-control rupiah" placeholder="Harga beli" aria-describedby="sizing-addon2">
      <input type="hidden" class="form-control" placeholder="Harga beli" name="harga_beli" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <label  class="control-label">Jumlah</label>
      <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>

<script>
$('.rupiah').change(function() {
    $('input[name="harga_beli"]').val($(this).val().replace(/\./g, ''));
});
</script>