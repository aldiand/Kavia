<?php
  foreach ($dataBtkl as $btkl) {
    ?>
    <tr>
      <td><?php echo $btkl->id; ?></td>
      <td><?php echo $btkl->tanggal; ?></td>
      <td><?php echo $btkl->nama_pegawai; ?></td>
      <td><?php echo $btkl->jam_masuk; ?></td>
      <?php if (!empty($btkl->jam_keluar)){ ?>
      <td><?php echo $btkl->jam_keluar; ?></td>
    <?php } else {?>
      <td>
      <button class="btn btn-warning update-dataBtkl" data-id="<?php echo $btkl->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Selesai</button>
      </td>
    <?php } ?>

    </tr>
    <?php
  }
?>
