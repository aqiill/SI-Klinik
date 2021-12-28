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
                        <td><?= $pasien->NIK_PASIEN ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pasien</td>
                        <td>:</td>
                        <td><?= $pasien->NAMA_PASIEN ?></td>
                    </tr>
                    <tr>
                        <td>Usia</td>
                        <td>:</td>
                        <td><?= $pasien->UMUR_PASIEN ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= $pasien->JENIS_KELAMIN ?></td>
                    </tr>
                </table>
                <div class="clearfix"></div>
            </div> 
            <div class="x_title">
                <h2>Daftar Obat Pasien</h2>
                <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModalLong">
                 <i class="fa fa-plus" aria-hidden="true"></i>  Tambah Obat Pasien
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
                                            <td><?= $value->NAMA_OBAT ?></td>
                                            <td><?= $value->JUMLAH_OBAT ?></td>
                                            <td><?= number_format($value->HARGA_OBAT) ?></td>
                                            <td><?= number_format($value->HARGA_OBAT*$value->JUMLAH_OBAT) ?></td>
                                            <td><?= $value->KETERANGAN ?></td>
                                            <td>
                                                <a href="<?= base_url('obat/hapus_resep/'.$value->ID_RESEP_OBAT) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus? Y/N')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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
    <form action="<?= base_url('obat/tambah_obat_pasien/'.$pasien->ID_REKAM_MEDIS) ?>" method="POST" class="needs-validation" novalidate>
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
                  <option value="<?= $value->ID_OBAT ?>"><?= $value->NAMA_OBAT ?> - Sisa Stok <?= $value->STOK_OBAT ?></option>
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