<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Data Transaksi</h1>
			<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Tanggal : <?= date("d F Y");;?></li>
			</ol>
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
			<div class="card mb-4">
				<div class="card-header">
						<i class="fas fa-table mr-1"></i>
						DataTable
				</div>
				<div class="card-body">
					<div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Customer</th>
                  <th>Mobil</th>
                  <th>Tgl. rental</th>
                  <th>tgl. Kembali</th>
                  <!-- <th>Harga/hari</th>
                  <th>Denda</th>
                  <th>Total Denda</th> -->
                  <th>Tgl. Dikembalikan</th>
                  <th>Status Rental</th>
                  <th>Status Pengembalian</th>
                  <th>Cek Pembayaran</th>
                  <th >Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach( $transaksi as $t ): ?>
                  <tr>
                    <td><?= $no++;;?></td>
                    <td><?= $t->nama;?></td>
                    <td><?= $t->merk;?></td>
                    <td><?= date('d/m/Y',strtotime($t->tanggal_rental));?></td>
                    <td><?= date('d/m/Y',strtotime($t->tanggal_kembali));?></td>
                    <!-- <td>Rp. <?= number_format($t->harga,0,',','.');?></td>
                    <td>Rp. <?= number_format($t->denda,0,',','.');?></td>
                    <td>Rp. <?= number_format($t->total_denda,0,',','.');?></td> -->
                    <td>
                      <?php
                        if($t->tanggal_pengembalian == "0000-00-00"){
                          echo "-";
                        }else{
                          echo date('d/m/Y',strtotime($t->tanggal_pengembalian));
                        }
                      ?>
                    </td>
                    <td>
                      <?php if($t->status_rental == "Belum Selesai" ): ?>
                        <span class="badge badge-danger"><?=$t->status_rental;?></span>
                      <?php else: ?>
                        <span class="badge badge-success"><?= $t->status_rental;?></span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($t->status_pengembalian == "Belum Kembali" ): ?>
                        <span class="badge badge-danger"><?= $t->status_pengembalian;?></span>
                      <?php else: ?>
                        <span class="badge badge-success"><?= $t->status_pengembalian;?></span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if( empty($t->bukti_pembayaran) ): ?>
                          <button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>
                      <?php else: ?>
                        <a class="btn btn-sm btn-success" rel="stylesheet" href="<?= base_url('admin/transaksi/pembayaran/'.$t->id_rental);?>"><i class="fas fa-check-circle"></i></a>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php
                        if($t->status == "1"){
                          echo "-";
                        }else{?>
                        <div class="row">
                          <a class="btn btn-sm btn-success" rel="stylesheet" href="<?= base_url('admin/transaksi/transaksi_selesai/'.$t->id_rental);?>"><i class="fa fa-check"></i></a>
                          <a class="btn btn-sm btn-danger" rel="stylesheet" href="<?= base_url('admin/transaksi/batal_transaksi/'.$t->id_rental);?>"><i class="fa fa-times"></i></a>
                        </div>
                      <?php }?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer class="py-4 bg-light mt-auto">
		<div class="container-fluid">
			<div class="d-flex align-items-center justify-content-between small">
				<div class="text-muted">Copyright &copy; Dheo Aprainsyah <?= date('Y');?></div>
				<div>
					<a href="#">Privacy Policy</a>
					&middot;
					<a href="#">Terms &amp; Conditions</a>
				</div>
			</div>
		</div>
	</footer>
</div>
	



