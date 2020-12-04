<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $judul;?></title>

  <!-- Bootstrap core CSS -->
  
  <link href="<?= base_url('assets/assets_shop/');?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/assets_shop/');?>css/shop-homepage.css" rel="stylesheet">

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url('customer/dashboard');?>">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('');?>">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('customer/transaksi');?>">Transaksi</a>
        </li>
          <li class="nav-item dropdown ">
            <?php if( $this->session->userdata('email') ): ?>
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="<?= base_url('auth/logout');?>" role="button" aria-haspopup="true" aria-expanded="false">Hai! <?= $this->session->userdata('nama');?> </a>
              <div class="dropdown-menu navbar-dark bg-dark">
                <a class="nav-link" href="<?= base_url('auth/ganti_password');?>">Ganti Password</a>
                <a class="nav-link" href="<?= base_url('auth/logout');?>" ><span>Logout</span></a>
              </div>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/login');?>">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('register');?>">Register</a>
              </li>
            <?php endif; ?>
          </li>   
      </ul>
    </div>
  </div>
</nav>

  