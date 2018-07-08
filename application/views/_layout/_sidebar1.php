<?php $jenis = $this->session->userdata('jenis') ?>

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">


    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <?php if($jenis == "admin" || $jenis == "pemilik") { ?>
      <li class="treeview">
        <a href="#">
            <i class="fa fa-database"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>Coa/#"><i class="fa fa-circle-o"></i> COA</a></li>
            <li><a href="<?php echo base_url(); ?>BahanBaku/#"><i class="fa fa-circle-o"></i> Bahan Baku</a></li>
            <li><a href="<?php echo base_url(); ?>BahanPenolong/#"><i class="fa fa-circle-o"></i> Bahan Penolong</a></li>
            <li><a href="<?php echo base_url(); ?>Overhead/#"><i class="fa fa-circle-o"></i> Overhead</a></li>
            <li><a href="<?php echo base_url(); ?>Pegawai/"><i class="fa fa-circle-o"></i> Pegawai</a></li>
          </ul>
        </li>
      <?php }?>
      <li class="treeview">
        <a href="#">
            <i class="fa fa-edit"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($jenis == "admin" || $jenis == "pemilik") { ?>
            <li><a href="<?php echo base_url(); ?>Pesanan/"><i class="fa fa-circle-o"></i> Pesanan</a></li>
          <?php } ?>
            <?php if($jenis == "produksi") { ?>
            <li><a href="<?php echo base_url(); ?>Produksi/"><i class="fa fa-circle-o"></i> Produksi</a></li>
            <?php }?>
            <?php if($jenis == "admin" || $jenis == "pemilik") { ?>
            <li><a href="<?php echo base_url(); ?>BahanMasuk/#"><i class="fa fa-circle-o"></i> Bahan Baku Masuk</a></li>
            <li><a href="<?php echo base_url(); ?>BpMasuk/#"><i class="fa fa-circle-o"></i> Bahan Penolong Masuk</a></li>
            <li><a href="<?php echo base_url(); ?>Pesanan/riwayat#"><i class="fa fa-circle-o"></i> Riwayat Pesanan</a></li>
          <?php }?>
          </ul>
        </li>

      <?php if($jenis == "admin" || $jenis == "pemilik") { ?>
      <li class="treeview">
        <a href="#">
            <i class="fa fa-book"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>Report/KartuHPP/#"><i class="fa fa-circle-o"></i> Kartu Harga Pokok Pesanan</a></li>
            <li><a href="<?php echo base_url(); ?>Report/LaporanPerhitunganHargaJual/#"><i class="fa fa-circle-o"></i> Perhitungan Harga Jual</a></li>
            <li><a href="<?php echo base_url(); ?>Jurnal/#"><i class="fa fa-circle-o"></i> Jurnal</a></li>
            <li><a href="<?php echo base_url(); ?>Jurnal/BukuBesar#"><i class="fa fa-circle-o"></i> Buku Besar</a></li>
            <li><a href="<?php echo base_url(); ?>Report/Bahan#"><i class="fa fa-circle-o"></i> Report Bahan</a></li>
            <li><a href="<?php echo base_url(); ?>Report/Penjualan#"><i class="fa fa-circle-o"></i> Report Penjualan</a></li>
            <li><a href="<?php echo base_url(); ?>Report/HPProduksi#"><i class="fa fa-circle-o"></i> HPProduksi</a></li>
            <li><a href="<?php echo base_url(); ?>Report/HPPenjualan#"><i class="fa fa-circle-o"></i> HPPenjualan</a></li>
            <li><a href="<?php echo base_url(); ?>Report/labarugi#"><i class="fa fa-circle-o"></i> Laba Rugi</a></li>

          </ul>
        </li>
        <?php }?>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
