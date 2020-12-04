<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
      <div class="main-content mb-3">
        <section class="section">
          <div class="section-header mt-3">
            <h1>Update Customer</h1>
          </div>
          <?php foreach( $dataCustomer as $c ): ?>
            <?php echo form_open_multipart('admin/data_customer/update_aksi'); ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="hidden" name="id_customer" value="<?= $c->id_customer;?>"></input>
                    <input class="form-control" name="nama" value="<?= $c->nama?>" type="text" id="nama">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" value="<?= $c->email?>" type="text" id="email">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control">
                      <option value="<?= $c->gender?>"><?= $c->gender?></option>
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                    <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="no_telepon">No.Telepon</label>
                    <input class="form-control" name="no_telepon" value="<?= $c->no_telepon?>" type="text" id="no_telepon">
                    <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label for="no_ktp">No.KTP</label>
                    <input class="form-control" name="no_ktp" value="<?= $c->no_ktp?>" type="text" id="no_ktp">
                    <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" value="<?= $c->alamat?>" id="alamat" rows="3"><?= $c->alamat?></textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                </div>
              </div>
              <button class="btn btn-primary mt-4 mr-2" type="submit">Simpan</button>
              <button class="btn btn-danger mt-4" type="reset">Reset</button>
            <?= form_close();?>
          <?php endforeach; ?>
        </section>
      </div>
    </div>
  </main>
</div>  
