<?php
  foreach ($dataBbp as $bbp) {
    ?>
    <tr>
      <td><?php echo $bbp->id; ?></td>
      <td><?php echo $bbp->tanggal; ?></td>
      <td><?php echo $bbp->nama; ?></td>
      <td><?php echo $bbp->jumlah; ?></td>
      <td><?php echo $bbp->harga; ?></td>
    </tr>
    <?php
  }
?>
