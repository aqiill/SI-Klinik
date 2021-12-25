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
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
        <div class="card text-center bg-dark text-light">
            <div class="card-body">
                <b><i class="fas fa-user-injured"></i> Total Pasien</b>
                <h1><?= $pasien ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
        <div class="card text-center bg-info text-light">
            <div class="card-body">
                <b><i class="fas fa-user-nurse"></i> Total Dokter</b>
                <h1><?= $dokter ?></h1>
            </div>
        </div>
    </div>
    <?php if ($this->session->userdata('level')=="administrator"): ?>
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
        <div class="card text-center bg-success text-light">
            <div class="card-body">
                <b><i class="fas fa-money-bill-wave-alt"></i> Total Pendapatan</b>
                <h1>Rp <?= number_format($jlm_pendapatan) ?>,-</h1>
            </div>
        </div>
    </div>
    <?php endif ?>
</div>