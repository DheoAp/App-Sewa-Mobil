<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
      <div class="main-content">
        <section class="section mb-3">
          <div class="section-header mt-3">
            <h1>Update Data Mobil</h1>
          </div>
          <div class="card">
            <div class="card-body">
              <?php foreach( $dataMobil as $m ): ?>
                <?php echo form_open_multipart('admin/data_mobil/update_mobil_aksi'); ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="hidden" name="id_mobil" value="<?= $m->id_mobil;?>">
                        <label>Type Mobil</label>
                        <select name="kode_type" class="form-control">
                          <option value="<?= $m->kode_type;?>" ><?= $m->kode_type;?></option>
                          <?php foreach( $dataType as $t ): ?>
                              <option value="<?= $t->kode_type ?>"><?= $t->nama_type ?></option>
                          <?php endforeach; ?>
                        </select>
                        <?= form_error('kode_type', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="merk">Merk</label>
                        <input class="form-control" name="merk" value="<?= $m->merk;?>" type="text" id="merk">
                        <?= form_error('merk', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="no_plat">No.plat</label>
                        <input class="form-control" name="no_plat" value="<?= $m->no_plat;?>" type="text" id="no_plat">
                        <?= form_error('no_plat', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="warna">Warna</label>
                        <input class="form-control" name="warna" value="<?= $m->warna;?>" type="text" id="warna">
                        <?= form_error('warna', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="harga">harga</label>
                        <input class="form-control" name="harga" value="<?= $m->harga;?>" type="text" id="harga">
                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="denda">denda</label>
                        <input class="form-control" name="denda" value="<?= $m->denda;?>" type="text" id="denda">
                        <?= form_error('denda', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="tahun">Tahun</label>
                          <input class="form-control" name="tahun" value="<?= $m->tahun;?>" type="text" id="tahun">
                          <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                          <label>Tersedia</label>
                          <select name="status" class="form-control">
                            <option <?php if($m->status == "1"){echo "selected='selected'";} echo $m->status;?>
                                    value="1">Tersedia    
                            </option>              
                            <option <?php if($m->status == "0"){echo "selected='selected'";} echo $m->status;?>
                                    value="0">Tidak Tersedia    
                            </option> 
                          </select>
                          <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="kapasitas">kapasitas</label>
                          <input class="form-control" name="kapasitas" value="<?= $m->kapasitas;?>" type="text" id="kapasitas">
                          <?= form_error('kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="gambar">Gambar</label>
                          <input class="form-control" name="gambar" value="<?= set_value('gambar')?>" type="file" id="gambar">
                        </div>

                        <button class="btn btn-primary mt-4 mr-2" type="submit">Simpan</button>
                        <button class="btn btn-danger mt-4" type="rest">Reset</button>
                    </div>
                  </div>
                <?= form_close();?>
              <?php endforeach; ?>
              
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
</div>  
