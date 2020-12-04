<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
      <div class="main-content mb-3">
        <section class="section">
          <div class="section-header mt-3">
            <h1>Tambah Customer</h1>
          </div>
          <?php echo form_open_multipart('admin/data_customer/tambah_aksi'); ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input class="form-control" name="nama" value="<?= set_value('nama')?>" type="text" id="nama">
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="form-group">
                  <label for="username">Username</label>
                  <input class="form-control" name="username" value="<?= set_value('username')?>" type="text" id="username">
                  <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" name="alamat" value="<?= set_value('alamat')?>" id="alamat" rows="3"></textarea>
                  <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select name="gender" class="form-control">
                    <option disabled selected>Pilih</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                  <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label for="no_telepon">No.Telepon</label>
                  <input class="form-control" name="no_telepon" value="<?= set_value('no_telepon')?>" type="text" id="no_telepon">
                  <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="form-group">
                  <label for="no_ktp">No.ktp</label>
                  <input class="form-control" name="no_ktp" value="<?= set_value('no_ktp')?>" type="text" id="no_ktp">
                  <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control" name="password" value="<?= set_value('password')?>" type="password" id="password">
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

              </div>
            </div>
            <button class="btn btn-primary mt-4 mr-2" type="submit">Simpan</button>
            <button class="btn btn-danger mt-4" type="reset">Reset</button>
          <?= form_close();?>
        </section>
      </div>
    </div>
  </main>
</div>  
