<?php
  foreach ($dataBbb as $bbb) {
    ?>
    <tr>
      <td><?php echo $bbb->id; ?></td>
      <td><?php echo $bbb->tanggal; ?></td>
      <td><?php echo $bbb->nama_bahan_baku; ?></td>
      <td><?php echo $bbb->jumlah; ?></td>
      <td><?php echo $bbb->harga; ?></td>
    </tr>
    <?php
  }
?>
