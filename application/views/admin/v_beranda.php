<?php
if ($this->session->flashdata('sukses') != "") { ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('sukses') ?>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
        <div class="card text-center bg-dark text-light">
            <div class="card-body">
                <b><i class="fas fa-user-injured"></i> Total Pasien</b>
                <h1>2560</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
        <div class="card text-center bg-info text-light">
            <div class="card-body">
                <b><i class="fas fa-user-nurse"></i> Total Dokter</b>
                <h1>26</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
        <div class="card text-center bg-success text-light">
            <div class="card-body">
                <b><i class="fas fa-money-bill-wave-alt"></i> Total Pendapatan</b>
                <h1>Rp 35.554.000</h1>
            </div>
        </div>
    </div>
</div>
<!-- <br> -->
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Pasien</h2>
                <a href="#!" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Tambah Pasien</a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama Pasien</th>
                                        <th>JK</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    for ($i = 0; $i < 5; $i++) {
                                    ?>
                                        <tr>
                                            <td>1376010002532220</td>
                                            <td>Tiger Nixon</td>
                                            <td>L</td>
                                            <td>
                                                <a href="#!" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i> Info</a>
                                                <a href="#!" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="#!" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus? Y/N')"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1376010002532220</td>
                                            <td>Garrett Winters</td>
                                            <td>L</td>
                                            <td>
                                                <a href="#!" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i> Info</a>
                                                <a href="#!" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="#!" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus? Y/N')"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>