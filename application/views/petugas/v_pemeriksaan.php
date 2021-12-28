<div class="clearfix"></div>
<div class="card">
	<div class="card-header">
		Pemeriksaan Petugas
	</div>
	<div class="card-body">
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $data->NAMA_PASIEN ?></td>
			</tr>
			<tr>
				<td>Usia Pasien</td>
				<td>:</td>
				<td><?= $data->UMUR_PASIEN ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?= $data->JENIS_KELAMIN ?></td>
			</tr>
			<tr>
				<td>Petugas Pemeriksa</td>
				<td>:</td>
				<td><?= $data->NAMA_USER ?></td>
			</tr>
		</table>
	</div>
	<div class="card-body">
		<form method="POST" action="<?= base_url('antrian/periksa/'.$data->ID_ANTRIAN) ?>" class="needs-validation" novalidate>
			<div class="row">
				<div class="col-12 col-md-6">
				<div class="form-group">
				    <label for="tekanan_darah">Tekanan Darah</label>
				    <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah" required>
				    <div class="invalid-feedback">
		                Tekanan Darah harus diisi.
		            </div>
				</div>
				</div>
				<div class="col-12 col-md-6">
				  <div class="form-group">
				    <label for="suhu_badan">Suhu Badan</label>
				    <input type="text" class="form-control" id="suhu_badan" name="suhu_badan" required>
				    <div class="invalid-feedback">
		                Suhu Badan harus diisi.
		            </div>
				  </div>
				</div>
				<div class="col-12">
				  <div class="form-group">
				    <label for="keluhan">Keluhan</label>
				    <textarea class="form-control" id="keluhan" rows="5" name="keluhan" required></textarea>
				    <div class="invalid-feedback">
		                Keluhan harus diisi.
		            </div>
				  </div>
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>