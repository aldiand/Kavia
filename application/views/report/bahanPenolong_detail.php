<?php
$jenis = $this->session->userdata('jenis');
  foreach ($dataBahan as $bahan) {
    ?>
<div class="row">
 <div class="col-md-12">    
 <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active" ><a href="#overview" data-toggle="tab">Ringkasan</a></li>
                <li><a href="#history" data-toggle="tab">Riwayat</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="overview">
                    <div class="row">
                        <div class="col-md-5">
                        <div class="box">
                                    <div class="box-body box-profile">
                                        <p class="text-muted text-center">Detail Bahan Baku</p>
                                        <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                        <li class="list-group-item">
                                            <b>ID Bahan</b> <br> <a style="word-wrap: break-word;"><?php echo $bahan->id; ?></a>
                                        </li>
                                            <b>Nama</b> <br> <a style="word-wrap: break-word;"><?php echo $bahan->nama; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Satuan</b> <br> <a style="word-wrap: break-word;"><?php echo $bahan->satuan; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Harga</b> <br> <a style="word-wrap: break-word;"><?php echo $bahan->harga; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Stok</b> <br> <a style="word-wrap: break-word;"><?php echo $bahan->jumlah; ?></a>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    
                        <div class="col-md-5">
                            <div class="input-group form-group">
                            <label  class="control-label">Pilih tahun</label>
                            <select class="form-control select2" id="pilihTahun" aria-describedby="sizing-addon2">
                                <?php for($i = 2017; $i <= Date('Y'); $i++ ) {
                                    echo "<option value='$i'"; echo $i==Date('Y')?"selected":""; echo ">$i</option>";
                                } ?>
                            </select>
                            </div>
                            <canvas id="myChart" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="history">
                    <div class="row">
                        <div class="col-md-12">
                        <h2> Riwayat Barang Masuk </h2>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="report-list-data" class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Tanggal</th>
                                <th>Harga Beli</th>
                                <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="data-bbmasuk">
                                <?php
                                foreach ($dataBahanMasuk as $bahanBaku) {
                                    ?>
                                    <tr>
                                    <td><?php echo $bahanBaku->id; ?></td>
                                    <td><?php echo $bahanBaku->tanggal; ?></td>
                                    <td><?php echo $bahanBaku->harga_beli; ?></td>
                                    <td><?php echo $bahanBaku->jumlah; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <h2> Riwayat Barang Keluar </h2>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="report-list-data2" class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Id Produksi</th>
                                </tr>
                            </thead>
                            <tbody id="data-bbkeluar">
                            <?php
                            foreach ($dataBbp as $bbb) {
                                ?>
                                <tr>
                                <td><?php echo $bbb->id; ?></td>
                                <td><?php echo $bbb->tanggal; ?></td>
                                <td><?php echo $bbb->jumlah; ?></td>
                                <td><?php echo $bbb->id_produksi; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

    <div>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/plugins/datatable/datatables.min.js"></script>

<script>

window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};

$(document).ready(function() {
    $('#report-list-data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ]
    } );
} );
$(document).ready(function() {
    $('#report-list-data2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ]
    } );
} );

var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
            label: 'Jumlah barang masuk',
            fill: false,
            backgroundColor: window.chartColors.blue,
            borderColor: window.chartColors.blue,
            data: <?php $obj = json_decode($dataChart); echo json_encode($obj->grafikMasuk) ?>,
        },
        {
            label: 'Jumlah barang keluar',
            fill: false,
            backgroundColor: window.chartColors.red,
            borderColor: window.chartColors.red,
            data: <?php $obj = json_decode($dataChart); echo json_encode($obj->grafikKeluar) ?>,
        }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

    document.getElementById('pilihTahun').addEventListener('change', function() {

            $.ajax({
                method: 'POST',
                url: '<?php echo base_url("report/getGrafikBpData/$bahan->id/"); ?>'+ this.value,
            }).done(function(data) {
			    var out = jQuery.parseJSON(data);
                myChart.data.datasets[0].data = out.grafikMasuk;
                myChart.data.datasets[1].data = out.grafikKeluar;
                myChart.update();
            })
            });
</script>

  <?php } ?>