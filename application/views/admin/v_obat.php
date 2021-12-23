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
                <h2>Data obat</h2>
                <?php if ($this->session->userdata('level')!="dokter"): ?>
                <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModalLong">
                 <i class="fas fa-plus"></i>  Tambah obat
                </button>
                <?php endif ?>
                <!-- <a href="#!" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Tambah obat</a> -->
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Masa Berlaku</th>
                                        <th>Jenis Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Tahun Produksi</th>
                                        <th>Stock Obat</th>
                                        <th>Merk</th>
                                        <th>Harga</th>
                                        <?php if ($this->session->userdata('level')!="dokter"): ?>
                                        <th>Aksi</th>
                                        <?php endif ?>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php foreach ($obat as $value): ?>
                                    <tr>
                                        <td><?= $value->masa_berlaku ?></td>
                                        <td><?= $value->jenis_obat ?></td>
                                        <td><?= $value->nama_obat ?></td>
                                        <td><?= $value->tahun_produksi ?></td>
                                        <td><?= $value->stok_obat ?></td>
                                        <td><?= $value->merk_obat ?></td>
                                        <td><?= $value->harga_obat ?></td>
                                        <?php if ($this->session->userdata('level')!="dokter"): ?>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value->id_obat ?>">
                                             <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="<?= base_url('obat/hapus/'.$value->id_obat) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus? Y/N')"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                        <?php endif ?>
                                    </tr>


<!-- Modal Edit-->
<div class="modal fade" id="edit<?= $value->id_obat ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?= base_url('obat/edit/'.$value->id_obat) ?>" method="POST" class="needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data <?= $value->nama_obat ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="masa" class="col-form-label">Masa Berlaku:</label>
            <input type="date" name="masa_berlaku" class="form-control" id="masa" value="<?= $value->masa_berlaku ?>" required>
            <div class="invalid-feedback">
                Masa Berlaku harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="jenis" class="col-form-label">Jenis Obat:</label>
            <input type="text" name="jenis_obat" class="form-control" id="jenis" value="<?= $value->jenis_obat ?>" required>
            <div class="invalid-feedback">
                Jenis Obat harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="obatname" class="col-form-label">Nama Obat:</label>
            <input type="text" name="nama_obat" class="form-control" id="obatname" value="<?= $value->nama_obat ?>" required>
            <div class="invalid-feedback">
                Nama Obat harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="tahun" class="col-form-label">Tahun Produksi Obat:</label>
            <input type="date" name="tahun_produksi" class="form-control" id="tahun" value="<?= $value->tahun_produksi ?>" required>
            <div class="invalid-feedback">
                Tahun Produksi Obat harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="stock" class="col-form-label">Stok Obat:</label>
            <input type="number" name="stok_obat" class="form-control" id="stock" value="<?= $value->stok_obat ?>" required>
            <div class="invalid-feedback">
                Stok Obat harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="merk" class="col-form-label">Merk Obat:</label>
            <input type="text" name="merk_obat" class="form-control" id="merk" value="<?= $value->merk_obat ?>" required>
            <div class="invalid-feedback">
                Merk Obat harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="harga" class="col-form-label">Harga Obat:</label>
            <input type="number" name="harga_obat" class="form-control" id="harga" value="<?= $value->harga_obat ?>" required>
            <div class="invalid-feedback">
                Harga Obat harus diisi.
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
    <form action="<?= base_url('obat/tambah') ?>" method="POST" class="needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="masa" class="col-form-label">Masa Berlaku:</label>
            <input type="date" name="masa_berlaku" class="form-control" id="masa" required>
            <div class="invalid-feedback">
                Masa Berlaku harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="jenis" class="col-form-label">Jenis Obat:</label>
            <input type="text" name="jenis_obat" class="form-control" id="jenis" required>
            <div class="invalid-feedback">
                Jenis Obat harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="obatname" class="col-form-label">Nama Obat:</label>
            <input type="text" name="nama_obat" class="form-control" id="obatname" required>
            <div class="invalid-feedback">
                Nama Obat harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="tahun" class="col-form-label">Tahun Produksi Obat:</label>
            <input type="date" name="tahun_produksi" class="form-control" id="tahun" required>
            <div class="invalid-feedback">
                Tahun Produksi Obat harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="stock" class="col-form-label">Stok Obat:</label>
            <input type="number" name="stok_obat" class="form-control" id="stock" required>
            <div class="invalid-feedback">
                Stok Obat harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="merk" class="col-form-label">Merk Obat:</label>
            <input type="text" name="merk_obat" class="form-control" id="merk" required>
            <div class="invalid-feedback">
                Merk Obat harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="harga" class="col-form-label">Harga Obat:</label>
            <input type="number" name="harga_obat" class="form-control" id="harga" required>
            <div class="invalid-feedback">
                Harga Obat harus diisi.
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