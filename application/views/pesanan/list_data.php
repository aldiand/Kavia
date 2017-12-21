<?php
  foreach ($dataPesanan as $data) {
    ?>
    <tr>
      <td><a href="<?php echo base_url('/Pesanan/id/').$data->id?>"><?php echo $data->id; ?></a></td>
      <td><?php echo $data->tanggal_pesanan; ?></td>
      <td><?php echo $data->nama_pemesan; ?></td>
      <td><?php echo $data->alamat; ?></td>
      <td><?php echo $data->pesanan; ?></td>
      <td><?php echo $data->deskripsi_pesanan; ?></td>
      <td><?php echo $data->harga_kisaran; ?></td>
      <td><?php echo $data->jumlah; ?></td>
      <td><?php echo $data->dp; ?></td>
      <<?php if ($page!="riwayat") { ?>

        <td><?php echo $data->status==0 ?  "Belum diproses" : "Sedang diproses"; ?></td>
        <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataPesanan" data-id="<?php echo $data->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-pesanan" data-id="<?php echo $data->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
        </td>

      <?php } ?>
    </tr>
    <?php
  }
?>
