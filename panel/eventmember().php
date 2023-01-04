<?php
// Script by Sebastian Wirajaya Licensed

session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$date = date("Y/m/d h:i:sa");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $username1 = $_POST['username'];
  $fbid = $_POST['fbid'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $level = $_POST['level'];

if ($level == Member) {
$harga = 0;
$bonus = 0;
} else {
$tiket = a;
}
  if ($hasil['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else {
  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username1'");  
  if(mysql_num_rows($cekuser) <> 0) { ?>
<div class="alert alert-danger">
Gagal : Username sudah terdaftar.
</div>
<? } else if(!$username1 || !$fbid || !$password || !$nama) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else { 
 $simpan = mysql_query("INSERT INTO user(fbid, username, password, nama, level, saldo, uplink) VALUES('$fbid','$username1', '$password', '$nama', '$level', '$bonus','$username')");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
if($simpan)  { ?>
            <li class="list-group-item list-group-item-success">
                                        <span class="badge badge-success"><font color="green">Success</font></span>

<br><b>Sukses:</b> Pendaftaran berhasil!</br>
<b>Pendaftar :</b>&nbsp; <?php echo $username?><br />
<b>Harga Potong Saldo:</b>Rp.<?php echo $harga?>,-<br />
<b>Tanggal Pendaftaran:&nbsp;</b><?php echo $date?><br />
-----DATA USER BARU-----<br />
<b>Nama:</b> <?php echo $nama?><br />
<b>Username:</b> <?php echo $username1?> <br />
<b>Password:</b> <?php echo $password?> <br />
<b>Level :</b> <?php echo $level?> <br />
<b>Bonus Saldo:</b>Rp.<?php echo $bonus?>,-<br />
<? } else { ?>
ERROR
<? }
?>
<? }
}
?>