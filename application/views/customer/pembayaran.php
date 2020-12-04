<div class="container mt-5 mb-5">
  
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header alert alert-success">
        Pembayaran Anda
        </div>
        <div class="card-body">
          <table class="table">
            <?php foreach( $transaksi as $t ): ?>
                <tr>
                  <th>Merek Mobil</th>
                  <td>:</td>
                  <td><?= $t->merk;?></td>
                </tr>
                <tr>
                  <th>Tanggal Rental</th>
                  <td>:</td>
                  <td><?= $t->tanggal_rental;?></td>
                </tr>
                <tr>
                  <th>Tanggal Kembali</th>
                  <td>:</td>
                  <td><?= $t->tanggal_kembali;?></td>
                </tr>
                <tr>
                  <th>Biaya Sewa perhari</th>
                  <td>:</td>
                  <td><?= number_format($t->harga,0,',','.');?></td>
                </tr>
                <tr>
                  <?php
                    $x = strtotime($t->tanggal_kembali);
                    $y = strtotime($t->tanggal_rental);
                    $jmlH = abs(($x - $y)/(60*60*24));/* abs() Untuk mengembalikan nilai menjadi absolute(detik*menit*24 jam) agar kita bisa dapat berapa hari */
                  ?>
                  <th>Durasi Sewa</th>
                  <td>:</td>
                  <td><?= $jmlH;?> Hari</td>
                </tr>
                <tr>
                  <th class="text-success">JUMLAH PEMBAYARAN</th>
                  <td>:</td>
                  <td><button class="btn btn-sm btn-success" disabled>Rp. <?= number_format($t->harga * $jmlH,0,',','.');?></button></td>
                </tr>
                <tr>
                  <td colspan="2"><a style="width: 100%;" class="btn btn-sm btn-outline-primary" rel="stylesheet" href="<?= base_url('customer/transaksi/cetak_invoice/'.$t->id_rental);?>">Print Invoice</a></td>
                  <td><a style="width: 50%;" class="btn btn-sm btn-danger" rel="stylesheet" href="<?= base_url('customer/transaksi');?>">Kembali</a></td>
                  <td></td>
                </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header alert alert-info">
          Informasi Pembayaran
        </div>
        <div class="card-body">
          <p class="mb-4">Silakan lakukan pembayaran melalui nomor rekening di bawah ini :</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Mandiri 0002-3345-5542</li>
            <li class="list-group-item">BCA 0002-3345-1124</li>
            <li class="list-group-item">BNI 0002-5567-5542</li>
            <li class="list-group-item">CIMB NIAGA 0002-2235-5542</li>
          </ul>

          <?php if(empty($t->bukti_pembayaran) ): ?>
            <button type="button" style="width: 100%;" class="btn btn-sm btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
              Upload Bukti Pembayaran
            </button>
          <?php elseif($t->status_pembayaran == "0"): ?>
            <button style="width: 100%;" class="btn btn-sm btn-outline-secondary mt-3" >
              <i class="fa fa-clock-o"></i> Menunggu Konfirmasi
            </button>
          <?php elseif($t->status_pembayaran == "1"): ?>
            <button style="width: 100%;" class="btn btn-sm btn-success mt-3" >
              <i class="fa fa-check"></i> Pembayaran Selesai
            </button>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?= base_url('customer/transaksi/pembayaran_aksi');?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
             <div class="form-group">
               <label for="bukti_pembayaran">Bukti Pembayaran</label>
               <input class="form-control" name="id_rental" value="<?= $t->id_rental;?>" type="hidden">

               <input class="form-control" name="bukti_pembayaran"type="file" id="bukti_pembayaran">
             </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary">Upload</button>
            </div>
        </form>

    </div>
  </div>
</div>