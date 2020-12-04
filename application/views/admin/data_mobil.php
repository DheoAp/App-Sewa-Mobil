<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Data Mobil</h1>
			<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Tanggal : <?= date("d F Y");;?></li>
			</ol>
			<!-- <div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-body">Primary Card</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-warning text-white mb-4">
						<div class="card-body">Warning Card</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-success text-white mb-4">
						<div class="card-body">Success Card</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-danger text-white mb-4">
						<div class="card-body">Danger Card</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
			</div> -->
			<?php if( $this->session->flashdata('pesan')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('pesan');?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php elseif ($this->session->flashdata('pesan_hapus')): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('pesan_hapus');?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
			<a href="<?= base_url('admin/data_mobil/tambah_mobil');?>" class="btn btn-primary mb-3">Tambah Data</a>
			<div class="card mb-4">
				<div class="card-header">
						<i class="fas fa-table mr-1"></i>
						DataTable
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
								<th>NO</th>
								<th>Gambar</th>
								<th>Type</th>
								<th>Merk</th>
								<th>No. Plat</th>
								<th>Status</th>
								<th>Aksi</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
								<th>NO</th>
								<th>Gambar</th>
								<th>Type</th>
								<th>Merk</th>
								<th>No. Plat</th>
								<th>Status</th>
								<th>Aksi</th>
								</tr>
								
							</tfoot>
							<tbody>
								<?php $no=1; foreach( $dataMobil as $m ): ?>
								<tr>
									<td><?= $no++;?></td>
									<td>
										<img width="100px" src="<?= base_url('assets/upload/'.$m->gambar);?>" alt="">  
									</td>              
									<td><?= $m->kode_type;?></td>              
									<td><?= $m->merk;?></td>              
									<td><?= $m->no_plat;?></td>              
									<td>
										<?php
											if($m->status == 1){
												echo "<span class='badge badge-success'>Tersedia</span>";
											}else{
												echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
											}
										?>
									</td>              
									<td>
										<a href="<?= base_url('admin/data_mobil/detail_mobil/'.$m->id_mobil);?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
										<a href="<?= base_url('admin/data_mobil/delete_mobil/'.$m->id_mobil);?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
										<a href="<?= base_url('admin/data_mobil/update_mobil/'.$m->id_mobil);?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
	



