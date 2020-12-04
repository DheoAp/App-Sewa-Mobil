<!-- <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
} -->
</style>
<table style="width: 40%;">
  <h2>Invoice Pembayaran</h2>
  <?php foreach( $transaksi as $t ): ?>
      <tr>
        <td>Nama customer</td>
        <td>:</td>
        <td><?= $t->nama;?></td>
      </tr>
      <tr>
        <td>Merek Mobil</td>
        <td>:</td>
        <td><?= $t->merk;?></td>
      </tr>
      <tr>
        <td>Tanggal Rental</td>
        <td>:</td>
        <td><?= $t->tanggal_rental;?></td>
      </tr>
      <tr>
        <td>Tanggal Kembali</td>
        <td>:</td>
        <td><?= $t->tanggal_kembali;?></td>
      </tr>
      <tr>
        <td>Biaya Sewa perhari</td>
        <td>:</td>
        <td><?= number_format($t->harga,0,',','.');?></td>
      </tr>
      <tr>
        <?php
          $x = strtotime($t->tanggal_kembali);
          $y = strtotime($t->tanggal_rental);
          $jmlH = abs(($x - $y)/(60*60*24));/* abs() Untuk mengembalikan nilai menjadi absolute(detik*menit*24 jam) agar kita bisa dapat berapa hari */
        ?>
        <td>Durasi Sewa</td>
        <td>:</td>
        <td><?= $jmlH;?> Hari</td>
      </tr>
      <tr>
        <td>Status Pembayaran</td>
        <td>:</td>
        <td>
          <?php 
            if ($t->status_pembayaran == "0") {
              echo "Belum Lunas";
            }else{
              echo "Sudah Lunas";
            }
          ?>
        </td>
      </tr>
      
      <tr>
        <td colspan="3"><hr></td>
      </tr>
      <tr>
        <td style="font-weight:bold">JUMLAH PEMBAYARAN</td>
        <td>:</td>
        <td>Rp. <?= number_format($t->harga * $jmlH,0,',','.');?></td>
      </tr>
      <tr><td><br></td></tr>
      <tr>
        <td rowspan="5">Rekening Pembayaran</td>
      </tr>
      <tr>
        <td>Mandiri 0002-3345-5542</td>
      </tr>
      <tr>
        <td>BCA 0002-3345-1124</td>
      </tr>
      <tr>
        <td>BNI 0002-5567-5542</td>
      </tr>
      <tr>
        <td>CIMB NIAGA 0002-2235-5542</td>
      </tr>
  <?php endforeach; ?>
</table>

<script type="text/javascript">
  window.print();
</script>