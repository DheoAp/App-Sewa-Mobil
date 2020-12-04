<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
      <div class="main-content">
        <section class="section">
          <div class="section-header mt-3">
            <h1>Tambah Data Type</h1>
          </div>
          <div class="card">
            <div class="card-body">
              <?php echo form_open_multipart('admin/data_type/tambah_type_aksi'); ?>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Type</label>
                        <input class="form-control" name="kode_type" value="<?= set_value('kode_type')?>" type="text" id="kode_type">
                        <?= form_error('kode_type', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="merk">Nama Type</label>
                        <input class="form-control" name="nama_type" value="<?= set_value('nama_type')?>" type="text" id="nama_type">
                        <?= form_error('nama_type', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                        <button class="btn btn-primary mt-4 mr-2" type="submit">Simpan</button>
                        <button class="btn btn-danger mt-4" type="rest">Reset</button>
                    </div>
                  </div>
              <?= form_close();?>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
</div>  
