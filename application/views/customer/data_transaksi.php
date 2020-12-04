<div class="container">
  <div class="card mx-auto" style="margin-top: 100px;margin-bottom:200px; width:80%">
    <div class="card-header">
      Data Transaksi Anda
    </div>
    <?php if( $this->session->flashdata('pesan')): ?>
    <div class="row mt-4 mb-4">
      <div class="col">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $this->session->flashdata('pesan');?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>
    <div class="card-body">
      <table class="table table-border table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Merk Mobil</th>
            <th>No.Plat</th>
            <th>Harga Sewa</th>
            <th>Aksi</th>
            <th>Batal</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach( $transaksi as $t ): ?>
              <tr>
                <td><?= $no++;?></td>
                <td><?= $t->nama;?></td>
                <td><?= $t->merk;?></td>
                <td><?= $t->no_plat;?></td>
                <td><?= number_format($t->harga,0,',','.');?></td>
                <td>
                  <?php if( $t->status_rental == "Selesai" ): ?>
                      <span class="badge badge-success">Rental selesai</span>
                  <?php else: ?>
                    <a class="btn btn-sm btn-primary" rel="stylesheet" href="<?= base_url('customer/transaksi/pembayaran/'.$t->id_rental);?>">Cek Pembayaran</a>                    
                  <?php endif; ?>
                </td>
                <td>
                 <?php if( $t->status_rental == "Belum Selesai" ): ?>
                    <a onclick="return confirm('Yakin Batal')" href="<?= base_url('customer/transaksi/batal_transaksi/'.$t->id_rental);?>" class="btn btn-sm btn-danger">Batal</a>
                 <?php else: ?>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                    Batal
                  </button>
                 <?php endif; ?>

                </td>
              </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Batal Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Maaf Transaksi ini sudah selesai, Tidak bisa di batalkan
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>