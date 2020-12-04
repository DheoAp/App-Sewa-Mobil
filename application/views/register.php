<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Daftar Akun</title>
	<link href="<?= base_url('assets/templates/sb-admin/')?>css/styles.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7 mb-5">
						<div class="card shadow-lg border-0 rounded-lg mt-5">
							<div class="card-header"><h3 class="text-center font-weight-light my-4">Daftar Akun</h3></div>
							<div class="card-body">

								<form method="POST" action="<?php base_url('register')?>">
									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
											<label class="small mb-1" for="no_ktp">No KTP</label>
											<input class="form-control py-4" name="no_ktp" placeholder="Masukan No KTP" value="<?= set_value('no_ktp')?>" type="text" id="no_ktp">
											<?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="small mb-1" for="nama">Nama Lengkap</label>
												<input name="nama" value="<?= set_value('nama')?>" class="form-control py-4" id="nama" type="text" placeholder="Masukan nama lengkap" />
												<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>											
									</div>

									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="gender">Gender</label>
												<select name="gender" class="form-control">
													<option disabled selected value="<?= set_value('gender')?>">Pilih</option>
													<option value="laki-laki">Laki-laki</option>
													<option value="perempuan">Perempuan</option>
												</select>
												<?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label for="no_telepon">No. Telepon</label>
												<input class="form-control" name="no_telepon" placeholder="Masuka No Telp" value="<?= set_value('no_telepon')?>" type="text" id="no_telepon">
												<?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>											
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input id="email" value="<?= set_value('email')?>" type="email" class="form-control" name="email" placeholder="Mauskan email" value="<?= set_value('user_name')?>">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>

									<div class="form-group">
										<label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" value="<?= set_value('alamat')?>" id="alamat"  rows="5"><?= set_value('alamat')?></textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>

									<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="small mb-1" for="password">Password</label>
													<input name="password" class="form-control py-4" id="password" type="password" placeholder="Masukan password" />
													<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="small mb-1" for="inputConfirmPassword">Konfirm Password</label>
													<input name="password2" class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Konfirm password" />
												</div>
											</div>
									</div>
									<div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block"  >Daftar Akun</button></div>
								</form>
								
							</div>
							<div class="card-footer text-center">
								<div class="small"><a href="<?= base_url('auth/login');?>">Sudah punya akun? Silakan login</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<div id="layoutAuthentication_footer">
		<footer class="py-4 bg-light mt-auto">
			<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between small">
					<div class="text-muted">Copyright &copy; Dheo Apriansyah <?= date('Y');?></div>
					<!-- <div>
							<a href="#">Privacy Policy</a>
							&middot;
							<a href="#">Terms &amp; Conditions</a>
					</div> -->
				</div>
			</div>
		</footer>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/templates/sb-admin/')?>js/scripts.js"></script>
</body>
</html>
