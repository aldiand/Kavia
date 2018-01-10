<?php
  foreach ($dataCoa as $coa) {
    ?>
    <tr>
      <td><?php echo $coa->kode; ?></td>
      <td><?php echo $coa->nama; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataCoa" data-id="<?php echo $coa->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-coa" data-id="<?php echo $coa->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>
