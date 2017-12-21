<?php
  foreach ($dataBtkl as $btkl) {
    ?>
    <tr>
      <td><?php echo $btkl->id; ?></td>
      <td><?php echo $btkl->tanggal; ?></td>
      <td><?php echo $btkl->nama_pegawai; ?></td>
      <td><?php echo $btkl->jam_masuk; ?></td>
      <td><?php echo $btkl->jam_keluar; ?></td>
      <td><?php echo $btkl->biaya; ?></td>

      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataBtkl" data-id="<?php echo $btkl->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-btkl" data-id="<?php echo $btkl->id; ?>" data-toggle="modal" data-target="#konfirmasiHapusBtkl"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>
