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
  </form><hr>

  <div class="btn-group">
    <a href="<?= base_url('admin/laporan/print_laporan/?dari='.set_value('dari').'&sampai='.set_value('sampai'));?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print Laporan</a>
  </div>

  <div class="table-responsive mt-4">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Mobil</th>
            <th>Tgl. rental</th>
            <th>tgl. Kembali</th>
            <th>Harga/hari</th>
            <th>Total Denda</th>
            <th>Tgl. Dikembalikan</th>
          </tr>
        </thead>

        <tbody>
          <?php $no=1; foreach( $laporan as $l ): ?>
            <tr>
              <td><?= $no++;;?></td>
              <td><?= $l->nama;?></td>
              <td><?= $l->merk;?></td>
              <td><?= date('d/m/Y',strtotime($l->tanggal_rental));?></td>
              <td><?= date('d/m/Y',strtotime($l->tanggal_kembali));?></td>
              <td>Rp. <?= number_format($l->harga,0,',','.');?></td>
              <td>Rp. <?= number_format($l->total_denda,0,',','.');?></td>
              <td>
                <?php if($l->tanggal_pengembalian == "0000-00-00" ): ?>
                  <span class="badge badge-pill badge-danger">Belum Kembali</span>
                <?php else: ?>
                  <?= date('d/m/Y',strtotime($l->tanggal_rental));?>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
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
	



