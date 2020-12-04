<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
      <div class="main-content">
        <section class="section">
          <div class="section-header mt-3">
            <h3>Konfirmasi Pembayaran</h3>
          </div>
          <div class="card" style="width: 55%;">
            <div class="card-header">
              Konfirmasi Pembayaran
            </div>
            <div class="card-body">
              <form action="<?= base_url('admin/transaksi/cek_pembayaran');?>" method="post" enctype="multipart/form-data">
                <?php foreach( $pembayaran as $p ): ?>
                  <div class="row">
                    <div class="col-lg-5">
                      <a class="btn btn-sm btn-success mb-3" rel="stylesheet" href="<?= base_url('admin/transaksi/download_pembayaran/'.$p->id_rental);?>"><i class="fas fa-download"></i> Download Bukti Pembayaran</a>
                    </div>
                    <div class="col-lg-6">
                      <div class="custom-control custom-switch">
                        <input type="hidden" value="<?= $p->id_rental;?>" name="id_rental">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="status_pembayaran">
                        <label class="custom-control-label" for="customSwitch1">Konfirmasi Pembayaran</label>
                      </div>
                    </div>
                  </div>
                    <hr>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <?php endforeach; ?>
              </form>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
</div>
