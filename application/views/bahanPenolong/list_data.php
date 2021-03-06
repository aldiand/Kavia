<?php
  foreach ($dataBahanPenolong as $bahanPenolong) {
    ?>
    <tr>
      <td><?php echo $bahanPenolong->sid; ?></td>
      <td><?php echo $bahanPenolong->nama; ?></td>
      <td><?php echo $bahanPenolong->jumlah; ?></td>
      <td><?php echo $bahanPenolong->satuan; ?></td>
      <td><?php echo rupiah($bahanPenolong->harga); ?></td>
      <td><?php echo rupiah($bahanPenolong->harga*$bahanPenolong->jumlah); ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataBahanPenolong" data-id="<?php echo $bahanPenolong->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-bahanPenolong" data-id="<?php echo $bahanPenolong->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>
