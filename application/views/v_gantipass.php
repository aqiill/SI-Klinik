<form action="<?= base_url('setting/changepass') ?>" method="POST" class="needs-validation" novalidate>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" disabled value="<?= $this->session->userdata('username') ?>" class="form-control" id="username">
    </div>
    <div class="form-group">
        <label for="pl">Password Lama</label>
        <input type="password" name="password_lama" class="form-control" required id="pl">
        <div class="invalid-feedback">
            Password Lama harus diisi!
        </div>
    </div>
    <div class="form-group">
        <label for="pb">Password Baru</label>
        <input type="password" name="password_baru" class="form-control" required id="pb">
        <div class="invalid-feedback">
            Password Baru harus diisi!
        </div>
    </div>
    <div class="form-group">
        <label for="pk">Konfirmasi Password</label>
        <input type="password" name="password_konf" class="form-control" required id="pk">
        <div class="invalid-feedback">
            Konfirmasi Password harus diisi!
        </div>
    </div>
    <div class="form-group">
        <?php if ($this->session->flashdata('gagal') != "") { ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('gagal') ?>
            </div>
        <?php } ?>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>