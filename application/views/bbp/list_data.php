<?php
  foreach ($dataBbp as $bbp) {
    ?>
    <tr>
      <td><?php echo $bbp->id; ?></td>
      <td><?php echo $bbp->tanggal; ?></td>
      <td><?php echo $bbp->nama; ?></td>
      <td><?php echo $bbp->jumlah; ?></td>
      <td><?php echo $bbp->harga; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataBbp" data-id="<?php echo $bbp->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-bbp" data-id="<?php echo $bbp->id; ?>" data-toggle="modal" data-target="#konfirmasiHapusBbp"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>
