<?php
// Script by Sebastian Wirajaya Licensed

session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");
$date = date("Y/m/d h:i:sa");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $username1 = $_POST['penerima'];
  $jumlah = $_POST['jumlah'];

if ($jumlah == 1) {
$saldo = 5000;
} else if ($jumlah == 2) {
$saldo = 10000;
} else if ($jumlah == 3) {
$saldo = 15000;
} else if ($jumlah == 4) {
$saldo = 20000;
} else if ($jumlah == 5) {
$saldo = 25000;
} else if ($jumlah == 6) {
$saldo = 30000;
} else if ($jumlah == 7) {
$saldo = 35000;
} else if ($jumlah == 8) {
$saldo = 40000;
} else if ($jumlah == 9) {
$saldo = 45000;
} else if ($jumlah == 10) {
$saldo = 50000;
} else if ($jumlah == 11) {
$saldo = 55000;
} else if ($jumlah == 12) {
$saldo = 60000;
} else if ($jumlah == 13) {
$saldo = 65000;
} else if ($jumlah == 14) {
$saldo = 70000;
} else if ($jumlah == 15) {
$saldo = 75000;
} else if ($jumlah == 16) {
$saldo = 80000;
} else if ($jumlah == 17) {
$saldo = 85000;
} else if ($jumlah == 18) {
$saldo = 90000;
} else if ($jumlah == 19) {
$saldo = 95000;
} else if ($jumlah == 20) {
$saldo = 100000;
} else {
$tiket = a;
}
  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username1'");  
  $dapat = mysql_num_rows($cekuser);
  $data = mysql_fetch_array($cekuser);

  if ($get['saldo'] < $jumlah) { ?>
Gagal : Saldo tidak mencukupi.
<? } else if($dapat == 0) { ?>
<div class="alert alert-danger">
Gagal : Username tidak terdaftar.
</div>
<? } else if(!$username || !$jumlah) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
 $simpan = mysql_query("UPDATE user SET saldo=saldo+$saldo WHERE username = '$username1'");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$saldo WHERE username = '$username'");
 if($simpan) { ?>
<li class="list-group-item list-group-item-success">
                                        <span class="badge badge-success"><font color="green">Success</font></span>

<br><b>Sukses:</b> Topup Deposti Berhasil!</br>
<b>Pengirim :</b>&nbsp; <?php echo $username?><br />
<b>Penerima :</b> <?php echo $username1?><br />
<b>Harga Potong Saldo:&nbsp;</b>Rp.<?php echo $saldo?>,-<br />
<b>Saldo didapat:</b> <?php echo $saldo?><br />
<b>Tanggal Transfer:</b> <br><?php echo $date?> <br />
<? } else { ?>
ERROR
<? }
?>
<? }
?>