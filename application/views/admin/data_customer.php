<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Data Customer</h1>
			<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Tanggal : <?= date("d F Y");;?></li>
			</ol>
			<?php if( $this->session->flashdata('pesan')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('pesan');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<?php elseif ($this->session->flashdata('pesan_hapus')): ?>
				<div class="alert alert-primary alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('pesan_hapus');?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php elseif ($this->session->flashdata('pesan_gagal')): ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?= $this->session->flashdata('pesan_gagal');?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php endif; ?>
			<a href="<?= base_url('admin/data_customer/tambah_customer');?>" class="btn btn-primary mb-3">Tambah Data</a>
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
									<th>No</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Alamat</th>
									<th>Gender</th>
									<th>No.Telp</th>
									<th>No.KTP</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th width="20px">No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Alamat</th>
									<th>Gender</th>
									<th>No.Telp</th>
									<th>No.KTP</th>
									<th>Aksi</th>
								</tr>
								
							</tfoot>
							<tbody>
							<?php $no=1; foreach( $dataCustomer as $c ): ?>
								<tr>
									<td><?= $no++;?></td>
									<td><?= $c->nama;?></td>
									<td><?= $c->email;?></td>
									<td><?= $c->alamat;?></td>
									<td><?= $c->gender;?></td>
									<td><?= $c->no_telepon;?></td>
									<td><?= $c->no_ktp;?></td>
									<td>
										<a href="<?= base_url('admin/data_customer/detail_customer/'.$c->id_customer);?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
										<a href="<?= base_url('admin/data_customer/delete_customer/'.$c->id_customer);?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
										<a href="<?= base_url('admin/data_customer/update_customer/'.$c->id_customer);?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
	



