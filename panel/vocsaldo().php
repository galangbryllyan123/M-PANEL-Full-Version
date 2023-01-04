<?php
// Script by Sebastian Wirajaya Licensed

session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $isi = $_POST['isi'];
  $kode = $_POST['kode'];

  if(!$isi || !$kode) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
  $cekuser = mysql_query("SELECT * FROM vouchersaldo WHERE kode = '$kode'");  
  if(mysql_num_rows($cekuser) <> 0) { ?>
<div class="alert alert-danger">
Gagal : Kode sudah terinput. Gunakan kode lain.
</div>
<? } else {
 $simpan = mysql_query("INSERT INTO vouchersaldo(id, isi, kode) VALUES('', '$isi', '$kode')");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$isi WHERE username = '$username'");
 if($simpan) { ?>
<div class="alert alert-success"><center>
=== Buat Voucher Saldo ===<br />
Buat voucher saldo sukses.<br />
Pembuat : <?php echo $username; ?> <br />
Isi Saldo : <?php echo $isi; ?> <br />
Kode : <?php echo $kode; ?> <br />
=== Buat Voucher Saldo === <br />
</center></div>
<? } else { ?>
ERROR
<? }
?>
<? }
}
?>