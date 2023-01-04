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
  $paket = $_POST['paket'];

if ($paket == 'Member') {
$harga = 25000;
} else if ($paket == 'Member VIP') {
$harga = 30000;
} else if ($paket == 'Admin') {
$harga = 35000;
} else if ($paket == 'Admin VIP') {
$harga = 50000;
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
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','Pendaftaran $paket [X]-VIP.Inc','$harga','Belum','Link FB : $email','$tanggal')");
if($simpan) { 

?>
<div class="alert alert-success"><center>
==== Pendaftaran ====<br />
No.Order : <?php echo $no; ?><br />
Pembeli : <?php echo $get['nama']; ?><br />
Barang : <?php echo $paket; ?> [X]-VIP.Inc<br />
Link FB : <?php echo $email; ?><br />
Harga : <?php echo $harga; ?><br />
Tgl. Transaksi : <?php echo $tanggal; ?> <br />
==== Pendaftaran ====
</center></div>
<div class="alert alert-warning">
Perhatian : Harap menunggu dan memberikan hasil dan No.Order pada Admin.
</div>
<? } else { ?>
ERROR
<? }
} 
?>