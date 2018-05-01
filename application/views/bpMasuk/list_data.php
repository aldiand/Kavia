<?php
  foreach ($dataBpMasuk as $bahanBaku) {
    ?>
    <tr>
      <td><?php echo $bahanBaku->id; ?></td>
      <td><?php echo $bahanBaku->tanggal; ?></td>
      <td><?php echo $bahanBaku->nama; ?></td>
      <td><?php echo $bahanBaku->harga_beli; ?></td>
      <td><?php echo $bahanBaku->jumlah; ?></td>
    </tr>
    <?php
  }
?>
