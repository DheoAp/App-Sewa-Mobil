<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
      <div class="main-content">
        <section class="section">
          <div class="section-header mt-3">
            <h1>Transaksi Selesai</h1>
          </div>
        </section>
        <?php foreach( $transaksi as $t ): ?>
          <?php echo form_open_multipart('admin/transaksi/transaksi_selesai_aksi'); ?>
            <input type="hidden" name="id_rental" value="<?= $t->id_rental;?>">
            
            <input type="hidden" name="denda" value="<?= $t->denda;?>">

            <div class="form-group">
              <label for="tanggal_pengembalian">Tanggal Kembali</label>
              <input class="form-control" type="date" name="tanggal_kembali" value="<?= $t->tanggal_kembali;?>" readonly>
              <?= form_error('tanggal_pengembalian', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
              <input class="form-control" name="tanggal_pengembalian" value="<?= $t->tanggal_pengembalian;?>" type="date" id="tanggal_pengembalian">
              <?= form_error('tanggal_pengembalian', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            
            <div class="form-group">
              <label for="status_pengembalian">Status Pengembalian</label>
              <select name="status_pengembalian" class="form-control">
                <option value="<?= $t->status_pengembalian;?>"><?= $t->status_pengembalian;?></option>
                <option value="Sudah Kembali">Sudah Kembali</option>
                <option value="Belum Kembali">Belum Kembali</option>
              </select>
              <?= form_error('status_pengembalian', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
              <label for="status_rental">Status Rental</label>
              <select name="status_rental" class="form-control">
                <option value="<?= $t->status_rental;?>"><?= $t->status_rental;?></option>
                <option value="Sudah Selesai">Sudah Selesai</option>
                <option value="Belum Selesai">Belum Selesai</option>
              </select>
              <?= form_error('status_rental', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
          <?= form_close();?>
        <?php endforeach; ?>
      </div>
    </div>
  </main>
</div>  
