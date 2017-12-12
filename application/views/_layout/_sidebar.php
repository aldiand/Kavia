<?php $jenis = $this->session->userdata('jenis') ?>

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">


    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <?php if($jenis == "admin") { ?>
      <li class="treeview <?php if ($page == 'master') {echo "active";}?>">
        <a href="#">
            <i class="fa fa-database"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>Pegawai/"><i class="fa fa-circle-o"></i> Pegawai</a></li>
            <li><a href="<?php echo base_url(); ?>Bahanbaku/#"><i class="fa fa-circle-o"></i> Bahan Baku</a></li>
            <li><a href="<?php echo base_url(); ?>Bahanpenolong/#"><i class="fa fa-circle-o"></i> Bahan Penolong</a></li>
            <li><a href="<?php echo base_url(); ?>Overhead/#"><i class="fa fa-circle-o"></i> Overhead</a></li>
          </ul>
        </li>
      <?php } ?>

        <?php if($jenis == "admin") { ?>
        <li <?php if ($page == 'pesanan') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Pesanan'); ?>">
            <i class="fa fa-edit"></i>
            <span>Data Pesanan</span>
          </a>
        </li>
        <?php } ?>

      <?php if($jenis == "produksi" || $jenis == "admin") { ?>
      <li <?php if ($page == 'produksi') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Produksi'); ?>">
          <i class="fa fa-dashboard"></i>
          <span>Data Produksi</span>
        </a>
      </li>
      <?php } ?>

      <?php if($jenis == "admin") { ?>
      <li class="treeview <?php if ($page == 'master') {echo "active";}?>">
        <a href="#">
            <i class="fa fa-database"></i>
            <span>Biaya Produksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>Biaya/bahan_baku"><i class="fa fa-circle-o"></i> Bahan Baku</a></li>
            <li><a href="<?php echo base_url(); ?>Biaya/bahan_penolong"><i class="fa fa-circle-o"></i> Bahan Penolong</a></li>
            <li><a href="<?php echo base_url(); ?>Biaya/btkl"><i class="fa fa-circle-o"></i> BTKL</a></li>
            <li><a href="<?php echo base_url(); ?>Biaya/bop"><i class="fa fa-circle-o"></i> BOP</a></li>
          </ul>
        </li>
      <?php } ?>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
