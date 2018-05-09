<?php
  foreach ($dataBahanPenolong as $bahanPenolong) {
    ?>
    <tr>
      <td><?php echo $bahanPenolong->id; ?></td>
      <td><?php echo $bahanPenolong->nama; ?></td>
      <td><?php echo $bahanPenolong->satuan; ?></td>
      <td align="right"><?php echo rupiah($bahanPenolong->harga); ?></td>
      <td><?php echo $bahanPenolong->last_active; ?></td>
      <td class="text-center" style="max-width:30px;">
        <a href="<?php echo base_url('/Report/reportBp/').$bahanPenolong->id?>"><button class="btn btn-info info-dataBahanPenolong" data-id="<?php echo $bahanPenolong->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Info</button></a>
      </td>
    </tr>
    <?php
  }
?>
