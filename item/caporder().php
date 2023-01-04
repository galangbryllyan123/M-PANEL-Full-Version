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
  $kontak = $_POST['kontak'];
  $anime = $_POST['anime'];
  $jualan = $_POST['jualan'];
  $lapak = $_POST['lapak'];
  $harga = '2500';

  if ($get['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else if (!$kontak || !$anime) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','Cap Order','$harga','Belum','Kontak : [ $kontak ] -- Anime : [ $anime ]','$tanggal')");
if($simpan) { 

?>
<div class="alert alert-success"><center>
==== Kebutuhan Editing ====<br />
No.Order : <?php echo $no; ?><br />
Pemesanan Cap Order sukses.<br />
Pembeli : <?php echo $get['nama']; ?><br />
Barang : Cap Order<br />
Kontak : <?php echo $kontak; ?><br />
Harga : <?php echo $harga; ?><br />
Tgl. Transaksi : <?php echo $tanggal; ?> <br />
==== Kebutuhan Editing ====
</center></div>
<div class="alert alert-warning">
Perhatian : Harap menunggu dan memberikan hasil dan No.Order pada Admin.
</div>
<? } else { ?>
ERROR
<? }
} 
?>