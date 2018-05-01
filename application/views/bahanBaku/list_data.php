<?php
  foreach ($dataBahanBaku as $bahanBaku) {
    ?>
    <tr>
      <td><?php echo $bahanBaku->id; ?></td>
      <td><?php echo $bahanBaku->nama_bahan_baku; ?></td>
      <td><?php echo $bahanBaku->satuan; ?></td>
      <td><?php echo $bahanBaku->harga; ?></td>
      <td><?php echo $bahanBaku->jumlah; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataBahanBaku" data-id="<?php echo $bahanBaku->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-bahanBaku" data-id="<?php echo $bahanBaku->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>
