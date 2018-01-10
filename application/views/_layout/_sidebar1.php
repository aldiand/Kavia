<?php $jenis = $this->session->userdata('jenis') ?>

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">


    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->
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
            <li><a href="<?php echo base_url(); ?>Bahanbaku/#"><i class="fa fa-circle-o"></i> Bahan Baku</a></li>
            <li><a href="<?php echo base_url(); ?>Bahanpenolong/#"><i class="fa fa-circle-o"></i> Bahan Penolong</a></li>
            <li><a href="<?php echo base_url(); ?>Pegawai/"><i class="fa fa-circle-o"></i> Pegawai</a></li>
          </ul>
        </li>

      <li class="treeview">
        <a href="#">
            <i class="fa fa-edit"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>Pesanan/"><i class="fa fa-circle-o"></i> Pesanan</a></li>
            <li><a href="<?php echo base_url(); ?>Produksi/"><i class="fa fa-circle-o"></i> Produksi</a></li>
            <li><a href="<?php echo base_url(); ?>Bahanmasuk/#"><i class="fa fa-circle-o"></i> Bahan Baku Masuk</a></li>
            <li><a href="<?php echo base_url(); ?>Bpmasuk/#"><i class="fa fa-circle-o"></i> Bahan Penolong Masuk</a></li>
            
            <li><a href="<?php echo base_url(); ?>Pesanan/riwayat#"><i class="fa fa-circle-o"></i> Riwayat Pesanan</a></li>
        
          </ul>
        </li>

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
            <li><a href="<?php echo base_url(); ?>#"><i class="fa fa-circle-o"></i> Jurnal</a></li>
            <li><a href="<?php echo base_url(); ?>#/"><i class="fa fa-circle-o"></i> Buku Besar</a></li>
           
          </ul>
        </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
