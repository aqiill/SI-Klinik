<div class="clearfix"></div>
<?php if ($this->session->flashdata('sukses') != ""): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('sukses') ?>
            </div>
        </div>
    </div>
<?php endif ?>
<?php if ($this->session->flashdata('gagal') != ""): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('gagal') ?>
            </div>
        </div>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Pembayaran</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Total Bayar</th>
                                        <th>Status Bayar</th>
                                        <th>Petugas</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php $no=1; foreach ($pembayaran as $value): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->NIK_PASIEN ?></td>
                                            <td><?= $value->NAMA_PASIEN ?></td>
                                            <td><?= $value->TGL_BAYAR ?></td>
                                            <td>Rp. <?= number_format($value->TOTAL_BAYAR) ?></td>
                                            <td>
                                                <?php if ($value->STATUS_BAYAR =="pending"){ ?>
                                                    <a href="<?= base_url('periksa/proses_bayar/'.$value->ID_ANTRIAN.'/y/'.$value->ID_PEMBAYARAN) ?>" class="btn btn-sm btn-warning"><i class="fas fa-money-bill-wave-alt"></i> Pending</a>
                                                <?php }elseif ($value->STATUS_BAYAR =="lunas") { ?>
                                                    <a href="<?= base_url('periksa/proses_bayar/'.$value->ID_ANTRIAN.'/n/'.$value->ID_PEMBAYARAN) ?>" class="btn btn-sm btn-success"><i class="fas fa-money-bill-wave-alt"></i> Lunas</a>
                                                <?php } ?>
                                            </td>
                                            <td><?= $value->NAMA_USER ?></td>
                                        </tr>




                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

