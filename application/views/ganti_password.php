<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url('assets/assets_stisla/')?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Ganti Password</h4></div>
              <?php if( $this->session->flashdata('pesan')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('pesan');?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <div class="card-body">
                <form method="POST" action="<?= base_url('auth/ganti_password_aksi')?>">
                  <div class="form-group">
                    <label for="pass_baru">Password Baru</label>
                    <input id="pass_baru" type="password" class="form-control" name="pass_baru" tabindex="1" autofocus>
                    <?= form_error('pass_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                    	<label for="ulang_pass" class="control-label">Ulang Password</label>
                    </div>
                    <input id="ulang_pass" type="password" class="form-control" name="ulang_pass" tabindex="2">
                    <?= form_error('ulang_pass', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Ganti Password
                    </button>
                  </div>
                </form>

              </div>
            </div>
            
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>