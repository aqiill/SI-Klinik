<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Rekam Medis</title>

	<!-- Bootstrap -->
	<link href="<?= base_url('assets/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= base_url('assets/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?= base_url('assets/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="<?= base_url('assets/') ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="<?= base_url('assets/') ?>vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="<?= base_url('assets/') ?>vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="<?= base_url('assets/') ?>vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="<?= base_url('assets/') ?>vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="<?= base_url('assets/') ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="<?= base_url('assets/') ?>build/css/custom.min.css" rel="stylesheet">
	<style>
	    .atas tr {
	        line-height: 40px;
	    }
	    .atas td {
	        width: 30%;
	    }
	</style>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">


			<!-- page content -->
			<div class="" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
									<img width="10%" src="https://lh3.googleusercontent.com/proxy/V3Y6jGM8lTfgyZ9QEUYtqQf7LmEV1FbAgmem4NkFoEe2Ulu6LmOnu0-DT5BLInS0MHUxKmuWqoY1-lReFLOlBuk_lbihQRtZPfviIsGbqPfaEVFjqtYBGnFmDrey3prqyWY" alt="">
								<div class="x_title">
									<h2>KLINIK SEHAT</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content atas">
									<br />
									<table>
										<tr>
											<td>Nama Pasien</td>
											<td>:</td>
											<td><?= ucwords($pasien->nama_pasien) ?></td>
										</tr>
										<tr>
											<td>Usia</td>
											<td>:</td>
											<td><?= $pasien->umur_pasien ?></td>
										</tr>
										<tr>
											<td>Jenis Kelamin</td>
											<td>:</td>
											<td><?= ucwords($pasien->jenis_kelamin) ?></td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td>:</td>
											<td><?= $pasien->alamat_pasien ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h5 class="text-center">Riwayat Pemeriksaan</h5>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">

				                    <div class="table-responsive">
				                      <table class="table table-striped jambo_table bulk_action">
				                        <thead>
				                          <tr class="headings">
				                            <th class="column-title">No</th>
				                            <th class="column-title">Diganosa</th>
				                            <th class="column-title">Tindakan</th>
				                            <th class="column-title">Rujukan</th>
				                          </tr>
				                        </thead>

				                        <tbody>
				                        	<?php $no=1; foreach ($rekam_medis as $value): ?>
					                          <tr class="even pointer">
					                            <td class=" "><?= $no++ ?></td>
					                            <td class=""><?= ucwords($value->diagnosa) ?></td>
					                            <td class=""><?= ucwords($value->tindakan) ?></td>
					                            <td class=""><?= ucwords($value->rujukan) ?></td>
					                            </td>
					                          </tr>				                        		
				                        	<?php endforeach ?>
				                        </tbody>
				                      </table>
				                    </div>
								</div>
								<div class="x_content" style="margin-left: 80%;">
									<br>
									<p>ttd</p>
									<br><br><br>
									<p>KLINIK SEHAT</p>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
			<!-- /page content -->

		</div>
	</div>

	<!-- jQuery -->
	<script src="<?= base_url('assets/') ?>vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url('assets/') ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url('assets/') ?>vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="<?= base_url('assets/') ?>vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="<?= base_url('assets/') ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="<?= base_url('assets/') ?>vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="<?= base_url('assets/') ?>vendors/moment/min/moment.min.js"></script>
	<script src="<?= base_url('assets/') ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="<?= base_url('assets/') ?>vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="<?= base_url('assets/') ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="<?= base_url('assets/') ?>vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="<?= base_url('assets/') ?>vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="<?= base_url('assets/') ?>vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="<?= base_url('assets/') ?>vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="<?= base_url('assets/') ?>vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="<?= base_url('assets/') ?>vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="<?= base_url('assets/') ?>vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="<?= base_url('assets/') ?>vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="<?= base_url('assets/') ?>build/js/custom.min.js"></script>

	<script>
		window.print();
	</script>
</body></html>
