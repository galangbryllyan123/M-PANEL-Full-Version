<?php
//Script by RTM Store

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

date_default_timezone_set("Asia/Surabaya");
$no = rand(1111, 9999);
$date = date("Y/m/d h:i:sa");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$tampil = mysql_fetch_array($query);

$saldo = $tampil['saldo'];

 $ig_username = $_POST['username'];
 $service = $_POST['service'];
 $jumlah = $_POST['jumlah'];

 if ($service == "2") {
  $harga = $jumlah * 19;
  $barang = "Like Instagram V1 ";
 } else if ($service == "16") {
  $harga = $jumlah * 25;
  $barang = "Instagram followers (SERVER 3,Max 5K)";
 } else if ($service == "36") {
  $harga = $jumlah * 30;
  $barang = "Instagram Followers (SERVER 4,Max 8k)";
 } else {
  $harga = $saldo; // buat IE
 }
 if (!$ig_username || !$jumlah) { ?>
<div class="alert alert-warning"><h4>Error!</h4>
<b>Error</b> : Masih ada data yang kosong.
</div>
<? } else if ($saldo < $harga) { ?>
<div class="alert alert-warning"><h4>Error!</h4>
<b>Error</b> : Saldo anda tidak mencukupi, silahkan topup.
</div>
<? } else {
// tempat API

 $send = mysql_query("UPDATE user SET saldo = saldo-$harga WHERE username = '$username'");
 $send = mysql_query("INSERT INTO historyall(id, pembeli, barang, harga, status, data, tanggal) VALUES ('','$username','$jumlah $barang','$harga','Success','$ig_username','$date')");
 if ($send) { ?>

<? } else { ?>
<li class="list-group-item list-group-item-success">
                                        <span class="badge badge-success"><font color="green">Success</font></span>

<title>Script API Panel Pedia</title>
<h2>Script API Panel Pedia</h2>
<form method="POST">
<label>Link :</label>
<input type="text" name="link" value=""><br>
<label>Type :</label>
<input type="text" name="type" value=""><br>
<label>Jumlah :</label>
<input type="text" name="jumlah" value=""><br>
<input type="submit" value="Submit"><br><br>
<label>Script bisa kalian kreasikan sendiri</label>
</form>



<?php
if(isset($_POST['link'])){
$api_key = "opfmrqqcqqus0hvuju0qqj2qdddqv7t9";
$link = $_POST['username'];
$jenis = $_POST['service'];
$jumlah = $_POST['jumlah'];
$postdata = 'api_key='.$api_key.'&link='.$link.'&jenis='.$jenis.'&jumlah='.$jumlah.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://panelpedia.id/api.php');
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
$store = curl_exec ($ch);
curl_close ($ch);
echo $store;
}
?