<div class="clearfix"></div>
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
<?php
if ($this->session->flashdata('gagal') != "") { ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('gagal') ?>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pengambilan Obat Pasien</h2>

                <!-- <a href="#!" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Tambah obat</a> -->
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-12 col-sm-8">
                        <div class="card-box table-responsive">

                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Antrian</th>
                                        <th>Nama Pasien</th>
                                        <th>Diagnosa</th>
                                        <th>Tanggal Checkup</th>
                                        <th>Usia Pasien</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php $no=1; foreach ($resep as $value): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->NO_ANTRIAN ?></td>
                                        <td><?= $value->NAMA_PASIEN ?></td>
                                        <td><?= $value->DIAGNOSA ?></td>
                                        <td><?= $value->TGL_CHECKUP ?></td>
                                        <td><?= $value->UMUR_PASIEN ?></td>
                                        <td>
                                            <a href="<?= base_url('obat/pengambilan/'.$value->ID_REKAM_MEDIS) ?>" class="btn btn-sm btn-info"><i class="fas fa-capsules"></i> Detail Obat</a>
                                        </td>
                                    </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="x_title">
                            <h2>Detail Obat Pasien</h2>
                            <?php if ($this->uri->segment(3) !=""){ ?>
                                <?php if ($this->session->userdata('level') =="dokter" ||$this->session->userdata('level') =="administrator" ): ?>
                                <a href="<?= base_url('obat/pasien/'.$detail_obat[0]->ID_REKAM_MEDIS) ?>" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus" aria-hidden="true"></i> Tambah obat</a>
                                <?php endif ?>
                            <?php } ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-box table-responsive">
                            <?php if ($this->uri->segment(3) !=""){ ?>
                                <table border="0" class="table">
                                    <?php $no=1; foreach ($detail_obat as $value): ?>
                                        <tr>
                                            <td>Nama Obat</td>
                                            <td>:</td>
                                            <td><?= $value->NAMA_OBAT ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah</td>
                                            <td>:</td>
                                            <td><?= $value->JUMLAH_OBAT ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td><?= $value->KETERANGAN ?></td>
                                        </tr>
                                        <tr>
                                            <td>Masa Berlaku</td>
                                            <td>:</td>
                                            <td><?= $value->MASA_BERLAKU ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            <?php }else{
                                echo "<p class='text-center'>Data Belum Tersedia</p>";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
