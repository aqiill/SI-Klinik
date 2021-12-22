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
<!-- <br> -->
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Obat Pasien</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_title">
                <table>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><?= $pasien->nik_pasien ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pasien</td>
                        <td>:</td>
                        <td><?= $pasien->nama_pasien ?></td>
                    </tr>
                    <tr>
                        <td>Usia</td>
                        <td>:</td>
                        <td><?= $pasien->umur_pasien ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= $pasien->jenis_kelamin ?></td>
                    </tr>
                </table>
                <div class="clearfix"></div>
            </div> 
            <div class="x_title">
                <h2>Daftar Obat Pasien</h2>
                <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModalLong">
                 <i class="fas fa-plus"></i>  Tambah Obat Pasien
                </button>
                <div class="clearfix"></div>
            </div>           
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah Obat</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah Harga</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php $no=1; foreach ($obat as $value): ?>                                        
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value->nama_obat ?></td>
                                            <td><?= $value->jumlah_obat ?></td>
                                            <td><?= number_format($value->harga_obat) ?></td>
                                            <td><?= number_format($value->harga_obat*$value->jumlah_obat) ?></td>
                                            <td><?= $value->keterangan ?></td>
                                            <td>
                                                <a href="<?= base_url('obat/hapus_resep/'.$value->id_resep_obat) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus? Y/N')"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
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


<!-- Modal Add-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?= base_url('obat/tambah_obat_pasien/'.$pasien->id_rekam_medis) ?>" method="POST" class="needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pasien Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
        <div class="form-group">
            <label for="obat">Pilih Obat</label>
            <select name="obat" class="form-control" id="obat" required>
              <option></option>
              <?php foreach ($list_obat as $value): ?>
                  <option value="<?= $value->id_obat ?>"><?= $value->nama_obat ?> - Sisa Stok <?= $value->stok_obat ?></option>
              <?php endforeach ?>
            </select>
            <div class="invalid-feedback">
                Pilihan obat harus diisi.
            </div>
        </div>
        <div class="form-group">
            <label for="jlm_obat">Jumlah Obat</label>
            <input type="number" name="jumlah_obat" class="form-control" id="jlm_obat" required>
            <div class="invalid-feedback">
                Jumlah Obat harus diisi.
            </div>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea required name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
            <div class="invalid-feedback">
                Keterangan harus diisi.
            </div>
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>