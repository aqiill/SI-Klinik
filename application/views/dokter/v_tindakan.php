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
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tindakan Dokter</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_title">
            	<table>
            		<tr>
            			<td>Nama Pasien</td>
            			<td>:</td>
            			<td><?= $pasien->NAMA_PASIEN ?></td>
            		</tr>
            		<tr>
            			<td>Usia Pasien</td>
            			<td>:</td>
            			<td><?= $pasien->UMUR_PASIEN ?></td>
            		</tr>
            		<tr>
            			<td>Suhu Badan</td>
            			<td>:</td>
            			<td><?= $pasien->SUHU_BADAN ?></td>
            		</tr>
            		<tr>
            			<td>Tekanan Darah</td>
            			<td>:</td>
            			<td><?= $pasien->TEKANAN_DARAH ?></td>
            		</tr>
            		<tr>
            			<td>Keluhan</td>
            			<td>:</td>
            			<td><?= $pasien->KELUHAN ?></td>
            		</tr>
            	</table>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form method="POST" action="<?= base_url('periksa/tindakan/'.$pasien->ID_PEMERIKSAAN) ?>" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <input type="text" name="diagnosa" class="form-control" id="diagnosa" required>
                        <div class="invalid-feedback">
                            Diagnosa harus diisi.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tindakan">Tindakan</label>
                        <textarea required name="tindakan" class="form-control" id="tindakan" rows="3"></textarea>
                        <div class="invalid-feedback">
                            Tindakan harus diisi.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rujukan">Rujukan</label>
                        <input type="text" name="rujukan" class="form-control" id="rujukan" >
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>