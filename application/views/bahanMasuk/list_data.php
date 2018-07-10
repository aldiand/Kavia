<?php
  foreach ($dataBahanMasuk as $bahanBaku) {
    ?>
    <tr>
      <td><?php echo $bahanBaku->id; ?></td>
      <td><?php echo $bahanBaku->tanggal; ?></td>
      <td><?php echo $bahanBaku->nama_bahan_baku; ?></td>
      <td><?php echo rupiah($bahanBaku->harga_beli); ?></td>
      <td><?php echo $bahanBaku->jumlah; ?></td>
    </tr>
    <?php
  }
?>
