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
                <h2>Data User</h2>
                <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModalLong">
                 <i class="fas fa-plus"></i>  Tambah User
                </button>
                <!-- <a href="#!" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Tambah User</a> -->
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
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php foreach ($user as $value): ?>
                                    <tr>
                                        <td><?= $value->nik ?></td>
                                        <td><?= $value->nama_user ?></td>
                                        <td><?= $value->username ?></td>
                                        <td><?= $value->level ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value->id_user ?>">
                                             <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="<?= base_url('user/hapus/'.$value->id_user) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus? Y/N')"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>


<!-- Modal Edit-->
<div class="modal fade" id="edit<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?= base_url('user/edit/'.$value->id_user) ?>" method="POST" class="needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data <?= $value->username ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">

            <label for="level" class="col-form-label">Level:</label>
            <select class="custom-select" id="level" name="level" required>
              <option></option>
              <option <?php if($value->level =="administrator"){echo "selected";} ?> value="administrator">Administrator</option>
              <option <?php if($value->level =="petugas"){echo "selected";} ?> value="petugas">Petugas</option>
              <option <?php if($value->level =="dokter"){echo "selected";} ?> value="dokter">Dokter</option>
              <option <?php if($value->level =="apoteker"){echo "selected";} ?> value="apoteker">Apoteker</option>
            </select>
            <div class="invalid-feedback">
                Level harus diisi.
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
    <form action="<?= base_url('user/tambah') ?>" method="POST" class="needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="username" class="col-form-label">Username:</label>
            <input type="text" name="username" class="form-control" id="username" required>
            <div class="invalid-feedback">
                Username harus diisi.
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="password" required>
            <div class="invalid-feedback">
                Password harus diisi.
            </div>
          </div>
          <div class="form-group">

            <label for="level" class="col-form-label">Level:</label>
            <select class="custom-select" id="level" name="level" required>
              <option></option>
              <option value="administrator">Administrator</option>
              <option value="petugas">Petugas</option>
              <option value="dokter">Dokter</option>
              <option value="apoteker">Apoteker</option>
            </select>
            <div class="invalid-feedback">
                Level harus diisi.
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