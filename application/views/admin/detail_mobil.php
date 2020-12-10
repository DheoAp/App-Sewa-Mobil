<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Mobil</h1>
          </div>
        </section>

        <?php foreach( $dataDetail as $d ): ?>
            <div class="card">
              <div class="card-body">
                
              <div class="row">

                <div class="col-md-5">
                  <img src="<?= base_url('assets/upload/'.$d->gambar);?>" alt="">
                </div>

                <div class="col-md-7">
                  <table class="table">
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
                        <a href="<?= base_url('admin/data_mobil');?>" class="btn btn-sm btn-danger">Kembali</a>            
                        <a href="<?= base_url('admin/data_mobil/update_mobil/'.$d->id_mobil);?>" class="btn btn-sm btn-primary">Update Mobil</a>
                      </td>
                    </tr>
                  </table>
                              
                </div>  

              </div>

              </div>
            </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>
</div>