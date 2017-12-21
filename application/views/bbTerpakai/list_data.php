<?php
  foreach ($dataBbb as $bbb) {
    ?>
    <tr>
      <td><?php echo $bbb->id; ?></td>
      <td><?php echo $bbb->tanggal; ?></td>
      <td><?php echo $bbb->nama_bahan_baku; ?></td>
      <td><?php echo $bbb->jumlah; ?></td>
      <td><?php echo $bbb->harga; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataBbb" data-id="<?php echo $bbb->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-bbb" data-id="<?php echo $bbb->id; ?>" data-toggle="modal" data-target="#konfirmasiHapusBbb"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>
