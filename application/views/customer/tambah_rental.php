<div class="container">
  <div class="card" style="margin-top:50px;margin-bottom:150px">
   <div class="card-header">
      From Rental Mobil
   </div>
   <div class="card-body">
    <?php foreach( $dataMobil as $d ): ?>
        <form action="<?= base_url('customer/rental/tambah_aksi_rental');?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="harga">Harga Sewa/Hari</label>
            <input type="hidden" name="id_mobil" value="<?= $d->id_mobil;?>">
            <input readonly class="form-control" name="harga" value="<?= $d->harga;?>" type="text" id="harga">
          </div>

          <div class="form-group">
            <label for="denda">Denda/Hari</label>
            <input class="form-control" name="denda" value="<?= $d->denda;?>" type="text" id="denda" readonly>
          </div>

          <div class="form-group">
            <label for="tanggal_rental">Tanggal Rental</label>
            <input class="form-control" name="tanggal_rental" value="<?= set_value('tanggal_rental')?>" type="date" id="tanggal_rental">
            <?= form_error('tanggal_rental', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          
          <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input class="form-control" name="tanggal_kembali" value="<?= set_value('tanggal_kembali')?>" type="date" id="tanggal_kembali">
            <?= form_error('tanggal_kembali', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          
          <button type="submit" class="btn btn-primary">Sewa</button>     
        </form>
    <?php endforeach; ?>
  </div>
  </div>
</div>