<?php
// Script by Sebastian Wirajaya Licensed

session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $username1 = $_POST['username'];

  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username1'");  
  $dapat = mysql_num_rows($cekuser);
  $data = mysql_fetch_array($cekuser);

  if($dapat == 0) { ?>
<div class="alert alert-danger">
Gagal : Username tidak terdaftar.
</div>
<? } else if(!$username) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
 $simpan = mysql_query("DELETE FROM user WHERE username = '$username1'");
 if($simpan) { ?>
<table>
<i class="fa fa-information"></i>Hapus User : <?php echo $username1; ?>
<hr>
<i class="fa fa-accounts-alt"></i>Username : <?php echo $username; ?>
<hr>
<i class="fa fa-accounts-alt"></i>Di Hapus Oleh : <?php echo $username; ?> <br />
<hr>
</table>
<? } else { ?>
ERROR
<? }
?>
<? }
?>