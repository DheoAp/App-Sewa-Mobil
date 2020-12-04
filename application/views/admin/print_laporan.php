<link href="<?= base_url('assets/assets_shop/');?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?= base_url('assets/assets_shop/');?>css/shop-homepage.css" rel="stylesheet">
<style>
  h3{
    text-align: center;
  }
</style>
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">      
      <h3>Laporan Transaksi Rental Mobil</h3> 
      <table>
      <tr>
        <td>Dari Tanggal</td>
        <td>:</td>
        <td><?= date('d-M-Y',strtotime($_GET['dari']));?></td>
      </tr>
      <tr>
        <td>Sampai Tanggal</td>
        <td>:</td>
        <td><?= date('d-M-Y',strtotime($_GET['sampai']));?></td>
      </tr>
    </table>

    <table class="table table-bordered table-striped mt-5">
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
  </main>
</div>


<script>
  window.print();
</script>