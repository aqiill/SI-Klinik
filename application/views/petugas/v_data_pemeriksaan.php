<div class="clearfix"></div>
<?php if ($this->session->flashdata('sukses') != ""): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('sukses') ?>
            </div>
        </div>
    </div>
<?php endif ?>
<?php if ($this->session->flashdata('gagal') != ""): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('gagal') ?>
            </div>
        </div>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Pemeriksaan</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>No Antrian</th>
                                        <th>Nama Pasien</th>
                                        <th>Petugas Pemeriksa</th>
                                        <th>Keluhan</th>
                                        <th>Status Pemeriksaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php $no=1; foreach ($periksa as $value): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->no_antrian ?></td>
                                            <td><?= $value->nama_pasien ?></td>
                                            <td><?= $value->nama_user ?></td>
                                            <td><?= $value->keluhan ?></td>
                                            <td>Oleh: <i class="fa fa-user-md" aria-hidden="true"></i> <?= ucwords($value->status_pemeriksaan) ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit<?= $value->id_pemeriksaan ?>">
                                                 <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Detail
                                                </button>
                                                <?php if ($value->status_pemeriksaan=="petugas"){ ?>
                                                    <?php if ($this->session->userdata('level') == "dokter"){ ?>
                                                        <a href="<?= base_url('periksa/dokter/'.$value->id_pemeriksaan) ?>" class="btn btn-sm btn-warning"><i class="fa fa-user-md" aria-hidden="true"></i> Tindakan Dokter</a>
                                                    <?php }else{ ?>
                                                        <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-user-md" aria-hidden="true"></i> Tindakan Dokter</a>
                                                    <?php } ?>

                                                <?php } else{ ?>
                                                    <a href="#!" class="btn btn-sm btn-dark"><i class="fa fa-user-md" aria-hidden="true"></i> Sedang Diperiksa</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
<!-- Modal Edit-->
<div class="modal fade" id="edit<?= $value->id_pemeriksaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="#!" method="POST" class="needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pasien <?= $value->nama_pasien ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">       
            <div class="form-group col-12 col-md-12">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="text" disabled class="form-control" value="<?= $value->nama_pasien ?>" id="nama_pasien">
            </div>
                    
            <div class="form-group col-12 col-md-6">
                <label for="umur_pasien">Usia Pasien</label>
                <input type="number" disabled class="form-control" value="<?= $value->umur_pasien ?>" id="umur_pasien">
            </div>
                    
            <div class="form-group col-12 col-md-6">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input type="text" disabled class="form-control" value="<?= $value->jenis_kelamin ?>" id="jenis_kelamin">
            </div>
                    
            <div class="form-group col-12 col-md-6">
                <label for="tekanan_darah">Tekanan Darah</label>
                <input type="text" disabled class="form-control" value="<?= $value->tekanan_darah ?>" id="tekanan_darah">
            </div>
                    
            <div class="form-group col-12 col-md-6">
                <label for="suhu_badan">Suhu Badan</label>
                <input type="text" disabled class="form-control" value="<?= $value->suhu_badan ?>" id="suhu_badan">
            </div>

            <div class="form-group col-12 col-md-12">
                <label for="keluhan">Keluhan</label>
                <textarea disabled name="keluhan_pasien" class="form-control"id="keluhan" rows="3"><?= $value->keluhan ?></textarea>
            </div>  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
