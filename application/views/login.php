<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
  <link href="<?= base_url('assets/templates/login/bootstrap/');?>bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/templates/login/');?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/templates/login/');?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../assets/templates/login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Login Page
					</span>
				</div>
				<?php if( $this->session->flashdata('pesan')): ?>
						<div class="alert alert-success alert-dismissible fade show m-2" role="alert">
							<?= $this->session->flashdata('pesan');?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php elseif($this->session->flashdata('salah_password')): ?>
						<div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
							<?= $this->session->flashdata('salah_password');?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>					
					<?php elseif($this->session->flashdata('login')): ?>
						<div class="alert alert-primary alert-dismissible fade show m-2" role="alert">
							<?= $this->session->flashdata('login');?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>					
					<?php elseif($this->session->flashdata('gagal_login')): ?>					
						<div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
							<?= $this->session->flashdata('gagal_login');?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
				<?php endif; ?>					
				<form class="login100-form validate-form" action="<?= base_url('auth/login');?>" method="post">

					<div class="section mb-4">
						<div class="wrap-input100 validate-input m-b-26">
							<span class="label-input100">email</span>
							<input class="input100" value="<?= set_value('email');?>" autocomplete="off" type="text" name="email" placeholder="Masukan email">
							<span class="focus-input100"></span>
						</div>
						<?= form_error('email', '<small class="text-danger p-1">', '</small>'); ?>
					</div>
					<div class="section mb-4">
						<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="password" placeholder="Masukan password">
							<span class="focus-input100"></span>
						</div>
						<?= form_error('password', '<small class="text-danger p-1">', '</small>'); ?>
					</div>
					

					<div class="flex-sb-m w-full p-b-30">
						<div>
							<a href="<?= base_url('register');?>" class="txt1">
								Buat Akun
							</a>
						</div>
						<div>
							<a href="#" class="txt1">
								Lupa Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/templates/login/');?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/templates/login/');?>js/bootstrap.bundle.min.js"></script>

</body>
</html>