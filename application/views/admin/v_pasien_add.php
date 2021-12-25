<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Pasien Baru</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form method="POST" action="#!" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" name="nik" class="form-control" id="nik" placeholder="Enter NIK" required>
                        <div class="invalid-feedback">
                            NIK harus diisi.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter Nama" required>
                        <div class="invalid-feedback">
                            Nama harus diisi.
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="lk" name="jk" value="Laki-Laki" class="custom-control-input">
                        <label class="custom-control-label" for="lk">Laki-Laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline mb-3">
                        <input type="radio" id="pr" name="jk" value="Perempuan" class="custom-control-input">
                        <label class="custom-control-label" for="pr">Perempuan</label>
                    </div>

                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="number" name="umur" class="form-control" id="umur" placeholder="Enter Umur" required>
                        <div class="invalid-feedback">
                            Umur harus diisi.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea required name="alamat" class="form-control" id="alamat" rows="3"></textarea>
                        <div class="invalid-feedback">
                            Alamat harus diisi.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>