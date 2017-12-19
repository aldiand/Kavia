<?php
  foreach ($dataProduksi as $produksi) {
    ?>
    <tr>
      <td><a href="<?php echo base_url('/Produksi/id/').$produksi->id?>"><?php echo $produksi->id; ?></a></td>
      <td><?php echo $produksi->tanggal_mulai; ?></td>
      <td><?php echo $produksi->tanggal_selesai; ?></td>
      <td><?php echo $produksi->deskripsi; ?></td>
      <td><?php echo getStatus( $produksi->status  ); ?></td>
      <td class="text-center" style="min-width:230px;">
      <?php if ($produksi->status != 2): ?>

          <button class="btn btn-warning update-dataProduksi" data-id="<?php echo $produksi->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-produksi" data-id="<?php echo $produksi->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>

      <?php endif; ?>
      </td>
    </tr>
    <?php
  }
?>
