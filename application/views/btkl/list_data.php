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

    </tr>
    <?php
  }
?>
