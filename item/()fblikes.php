<?php
//Script by Sebastian Wirajaya

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $email = $_POST['email'];
  $sandi = $_POST['sandi'];
  $status = $_POST['status'];
  $paket = $_POST['paket'];

if ($paket == '100') {
$harga = 7000;
} else if ($paket == '200') {
$harga = 12000;
} else if ($paket == '500') {
$harga = 22000;
} else if ($paket == '1000') {
$harga = 27000;
} else {
$tiket = a;
}
  if ($get['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else if (!$email) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','$paket Like Status Facebook','$harga','Belum','Link : $status','$tanggal')");
          $simpan = mysql_query("INSERT INTO fblikes VALUES('$email','$sandi','','$status','$paket','pending')"); 
if($simpan) { 

?>
<div class="alert alert-success"><center>
==== Facebook Likers ====<br />
No.Order : <?php echo $no; ?><br />
Pembeli : <?php echo $get['nama']; ?><br />
Barang : <?php echo $paket; ?> Facebook Likes<br />
Link : <?php echo $status; ?><br />
Harga : <?php echo $harga; ?><br />
Tgl. Transaksi : <?php echo $tanggal; ?> <br />
==== Facebook Likers ====
</center></div>
<div class="alert alert-warning">
Perhatian : Harap menunggu dan memberikan hasil dan No.Order pada Admin.
</div>
<? } else { ?>
ERROR
<? }
} 
?>