<?php
  foreach ($dataOverhead as $overhead) {
    ?>
    <tr>
      <td><?php echo $overhead->sid; ?></td>
      <td><?php echo $overhead->nama; ?></td>
      <td><?php echo rupiah($overhead->harga_per_bulan); ?></td>
      <td><?php echo ($overhead->dibebankan_per_produksi*100/$overhead->harga_per_bulan).'%'; ?></td>
      <td><?php echo rupiah($overhead->dibebankan_per_produksi); ?></td>
      <td><?php echo rupiah($overhead->jumlah); ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataOverhead" data-id="<?php echo $overhead->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-overhead" data-id="<?php echo $overhead->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>
