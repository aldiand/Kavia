<?php
  foreach ($dataBtkl as $btkl) {
    ?>
    <tr>
      <td><?php echo $btkl->id; ?></td>
      <td><?php echo $btkl->tanggal; ?></td>
      <td><?php echo $btkl->nama_pegawai; ?></td>

    </tr>
    <?php
  }
?>
