<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Laporan</h1>
			<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Tanggal : <?= date("d F Y");;?></li>
			</ol>
			<form action="<?= base_url('admin/laporan');?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="dari">Dari Tanggal</label>
					<input class="form-control" name="dari" value="<?= set_value('dari')?>" type="date" id="dari">
					<?= form_error('dari', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				
				<div class="form-group">
					<label for="sampai">Sampai Tanggal</label>
					<input class="form-control" name="sampai" value="<?= set_value('sampai')?>" type="date" id="sampai">
					<?= form_error('sampai', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				
				<button type="sumbit" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Tampilkan Data</button>
			</form>
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
	



