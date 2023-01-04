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
  $pw = $_POST['pw'];

  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username'");  
if(!$pw) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
 } else {
 $simpan = mysql_query("UPDATE user SET password = '$pw' WHERE username = '$username'");
 if($simpan) { ?>

                                        <li class="divider"></li>
Change Password

                                        <li class="divider"></li>

BEFORE : <?php echo $get['password']; ?>

AFTER : <?php echo $pw; ?>

TANGGAL : <?php
date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y');?>

                                        <li class="divider"></li>
<? } else { ?>
ERROR
<? }
} 
?>