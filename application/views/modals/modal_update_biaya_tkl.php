<?php $dataBtkl = $dataBtkl[0] ?>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data BTKL</h3>
      <form method="POST" id="form-update-btkl">
        <div class="input-group form-group">
        <input type="hidden" name="id" value="<?php echo $dataBtkl->id; ?>">
          <div class="input-group form-group">
            <label  class="control-label">Tanggal</label>
            <input type="date" class="form-control" value="<?php echo $dataBtkl->tanggal;?>" name="tanggal" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Pegawai</label>
            <select name="id_pegawai" class="form-control select2" aria-describedby="sizing-addon2">
              <?php
              foreach ($dataPegawai as $bb) {
                ?>
                <option value="<?php echo $bb->id; ?>">
                  <?php echo $bb->nama_pegawai; ?>
                </option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Jam Masuk</label>
            <select name="jam_masuk" class="form-control select2" aria-describedby="sizing-addon2" >
              <?php
              for ($i=1 ; $i <= 24 ; $i++ ) {
                echo "<option value='$i'"; echo $dataBtkl->jam_masuk==$i?'selected':''; echo ">$i</option>";
              }
              ?>
            </select>
          </div>
          <div class="input-group form-group">
            <label  class="control-label">Jam Keluar</label>
            <select name="jam_keluar" class="form-control select2" aria-describedby="sizing-addon2">
              <?php
              for ($i=1 ; $i <= 24 ; $i++ ) {
                echo "<option value='$i'"; echo $dataBtkl->jam_keluar==$i?'selected':''; echo ">$i</option>";
              }
              ?>
            </select>
          </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>
