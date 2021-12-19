<div class="row">
	<div class="col-12">

<div class="card mb-3">
  <div class="card-header">
    Edit Profile
  </div>
  <?php if ($this->session->flashdata('sukses')!=""): ?>
      <div class="card-body">
          <div class="form-group">
              <div class="alert alert-success" role="alert">
               <?= $this->session->flashdata('sukses') ?>
           </div>
       </div>
   </div>
  <?php endif ?>  

  <?php if ($this->session->flashdata('gagal')!=""): ?>
      <div class="card-body">
          <div class="form-group">
              <div class="alert alert-danger" role="alert">
               <?= $this->session->flashdata('gagal') ?>
           </div>
       </div>
   </div>
  <?php endif ?> 
  <div class="card-body">
    <form method="POST" action="<?= base_url('setting/edit/'.$this->session->userdata('id_user')) ?>" class="needs-validation" novalidate>
    	<div class="row">
	      <div class="mb-3 col-12">
	        <label for="nik" class="form-label">NIK</label>
	        <input name="nik" required type="number" placeholder="16 digit angka" class="form-control" value="<?= ucwords($profile->nik) ?>"  value="<?= ucwords($profile->nik) ?>" id="nik">
	        <div class="invalid-feedback">
	          NIK harus diisi.
	        </div>
	      </div>
	      <div class="mb-3 col-12 ">
	        <label for="nama" class="form-label">Nama Lengkap</label>
	        <input name="nama" required type="text" class="form-control" value="<?= ucwords($profile->nama_user) ?>" id="nama">
	        <div class="invalid-feedback">
	          Nama Lengkap harus diisi.
	        </div>
	      </div>
	      <div class="mb-3 col-12 ">
	        <label for="username" class="form-label">Username</label>
	        <input name="username" disabled value="<?= $this->session->userdata('username') ?>" type="text" class="form-control" id="username">

	      </div>
	      <div class="mb-3 col-12">
		    <label name="alamat" for="alamat">Alamat Lengkap</label>
		    <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?= ucwords($profile->alamat) ?></textarea>
	        <div class="invalid-feedback">
	          Alamat Lengkap harus diisi.
	        </div>
	      </div>

	      <div class="mb-3 col-12">
	      <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
      	</div>
    </form>
  </div>
</div>

	</div>
</div>