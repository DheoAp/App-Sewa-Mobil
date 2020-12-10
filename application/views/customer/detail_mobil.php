<div class="container mt-5 mb-5">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <?php foreach( $dataDetail as $d ): ?>
          <div class="row">

            <div class="col-md-7">
              <img src="<?= base_url('assets/upload/'.$d->gambar);?>" alt="">
            </div>
            <div class="col-md-5">
              <table class="table"  style="width: 400px;">
                <tr>
                  <td>Type Mobil</td>
                  <td>
                    <?= $d->kode_type;?>
                  </td>
                </tr>
                <tr>
                  <td>Merk</td>
                  <td><?= $d->merk;?></td>
                </tr>
                <tr>
                  <td>No Plat</td>
                  <td><?= $d->no_plat;?></td>
                </tr>
                <tr>
                  <td>Warna</td>
                  <td><?= $d->warna;?></td>
                </tr>
                <tr>
                  <td>Tahun</td>
                  <td><?= $d->tahun;?></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td><?php
                    if ($d->status == "0") {
                      echo  "<span class='badge badge-danger'>Tidak Tersedia</span>";
                    }else {
                    echo "<span class='badge badge-success'>Tersedia</span>";
                    }
                  ?></td>
                </tr>
                <tr>
                  <td>
                    <a href="<?= base_url('customer/dashboard');?>" class="btn btn-sm btn-danger">Kembali</a> 
                    
                  </td>
                  <td>
                  <?php
                      if ($d->status == "0") {
                        echo "<button class='btn btn-sm btn-outline-secondary' disabled>Sudah Di Rental</button>";
                      }else{
                        echo anchor('customer/rental/tambah_rental'.$d->id_mobil,'<button class="btn btn-sm btn-primary">Sewa</button>');
                      }
                    ?>
                  </td>
                </tr>
              </table>
                          
            </div>  

          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
