<?php
  foreach ($dataBahanBaku as $bahanBaku) {
    ?>
    <tr>
      <td><?php echo $bahanBaku->id; ?></td>
      <td><?php echo $bahanBaku->nama_bahan_baku; ?></td>
      <td><?php echo $bahanBaku->satuan; ?></td>
      <td align="right"><?php echo rupiah($bahanBaku->harga); ?></td>
      <td><?php echo $bahanBaku->last_active; ?></td>
      <td class="text-center" style="max-width:30px;">
        <a href="<?php echo base_url('/Report/reportBb/').$bahanBaku->id?>"> <button class="btn btn-info info-dataBahanBaku" data-id="<?php echo $bahanBaku->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Info</button></a>
      </td>
    </tr>
    <?php
  }
?>
