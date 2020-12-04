<!-- Page Content -->
<div class="container">
    <?php if( $this->session->flashdata('pesan')): ?>
    <div class="row mt-3">
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
  <div class="row">
    
    <div class="col-md mt-3">
      <div class="row">
        <?php foreach( $dataMobil as $m ): ?>
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?= base_url('assets/upload/'.$m->gambar);?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?= $m->merk;?></a>
                </h4>
                <h5><?= $m->no_plat;?></h5>
                <p class="card-text">Rp. <?= number_format($m->harga,0,',','.')?> / Hari</p>
                <span class="card-text">Kapasitas <?= $m->kapasitas;?> orang</span>
              </div>
              <div class="card-footer">
                <?php
                  if ($m->status == "0") {
                    echo "<button class='btn btn-sm btn-outline-secondary' disabled>Sudah Di Rental</button>";
                  }else{
                    echo anchor('customer/rental/tambah_rental/'.$m->id_mobil,'<button class="btn btn-sm btn-primary">Sewa</button>');
                  }
                ?>
                <a href="<?= base_url('customer/dashboard/detail_mobil/'.$m->id_mobil);?>" class="btn btn-sm btn-success">Detail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->


