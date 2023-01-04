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
  $username1 = $_POST['username'];

  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username1'");  
  $dapat = mysql_fetch_array($cekuser);
  $cek = mysql_num_rows($cekuser);

  if($dapat['level'] == MemberVIP) { ?>
<div class="alert alert-danger">
Gagal : Username sudah menjadi MemberVIP.
</div>
<? } else if($cek == 0) { ?>
<div class="alert alert-danger">
Gagal : Username tidak terdaftar.
</div>
<? } else if(!$username1) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
 $simpan = mysql_query("UPDATE user SET level = 'MemberVIP' WHERE username = '$username1'");
 if($simpan) { ?>
<div class="alert alert-success"><center>
=== MemberToMemberVIP ===<br />
Upgrade member ke reseller sukses.<br />
Nama : <?php echo $dapat['nama']; ?> <br />
Username : <?php echo $username1; ?> <br />
Upgrade : Member ke Reseller <br />
Diupgrade Oleh : <?php echo $username; ?> <br />
=== Upgrade Member === <br />
</center></div>
<? } else { ?>
ERROR
<? }
?>
<? }
?>