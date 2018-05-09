<div class="row">
 <div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active" ><a href="#bb" data-toggle="tab">Bahan Baku</a></li>
            <li><a href="#bp" data-toggle="tab">Bahan Penolong</a></li>
        </ul>

        <div class="tab-content">
            <div class="active tab-pane" id="bb">
                <div class="row">
                    <div class="col-md-12">
                        <table id="list-data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>Nama Bahan Baku</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Last Active</th>
                            <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="report-bb">

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="bp">
                <div class="row">
                    <div class="col-md-12">     
                        <table id="list-data2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Nama Bahan Penolong</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Last Active</th>
                                <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="report-bp">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>

<?php echo $modal_grafik_bahan; ?>

<div id="tempat-modal"></div>
