<?php
  foreach ($dataProduksi as $produksi) {
    ?>
    <tr>
      <td><?php echo $produksi->id; ?></a></td>
      <td><?php echo $produksi->tanggal_mulai; ?></td>
      <td><?php echo $produksi->tanggal_selesai; ?></td>
      <td><?php echo $produksi->deskripsi; ?></td>
      <td><?php echo getStatus( $produksi->status  ); ?></td>
      <td style="min-width:270px;">
        <a href="<?php echo base_url('/Produksi/id/').$produksi->id?>"> <button class="btn btn-info detail-dataPosisi" data-id="<?php echo $produksi->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button></a>

      <?php if ($produksi->status != 2): ?>

          <button class="btn btn-warning update-dataProduksi" data-id="<?php echo $produksi->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
     <?php endif; ?>
      </td>
    </tr>
    <?php
  }
?>
