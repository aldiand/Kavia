<?php
  foreach ($dataPegawai as $pegawai) {
    ?>
    <tr>
      <td style="min-width:230px;"><?php echo $pegawai->nama_pegawai; ?></td>
      <td><?php echo $pegawai->alamat; ?></td>
      <td><?php echo $pegawai->tipe_gaji; ?></td>
      <td><?php echo $pegawai->gaji; ?></td>
      <td><?php echo $pegawai->no_telp; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $pegawai->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<?php echo $pegawai->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>
