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

 if ($service == "1") {
  $harga = $jumlah * 29;
  $barang = "Instagram followers (SERVER 1,Max 5K)";
 } else if ($service == "101") {
  $harga = $jumlah * 19;
  $barang = "Instagram followers (SERVER 2,Max 5K)";
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

 $simpan = mysql_query("UPDATE user SET saldo = saldo-$harga WHERE username = '$username'");
 $simpan = mysql_query("INSERT INTO historyall(id, pembeli, barang, harga, status, data, tanggal) VALUES ('','$username','$jumlah $barang','$harga','Success','$ig_username','$date')");
 if ($simpan) { ?>

<? } else { ?>
<li class="list-group-item list-group-item-success">
                                        <span class="badge badge-success"><font color="green">Success</font></span>

<br><b>Sukses:</b> Pembelian berhasil!</br>
<b>Pembeli :</b>&nbsp; <?php echo $username?><br />
<b>Username :</b> <?php echo $ig_username?><br />
<b>Harga Potong Saldo:&nbsp;</b>Rp.<?php echo $harga?>,-<br />
<b>Jenis:</b> <?php echo $barang?><br />
<b>Jumlah:</b> <?php echo $jumlah?> Followers<br />
<b>Tanggal Pembelian:</b> <br><?php echo $date?> <br />

<?php if($service == '101') { ?>
                               <?php
    $api_key = "CMBCOWN2Z7FZGVO"; // 15 Random Kode Api Key Smart Voc anda
    $method = "order"; // Method jangan di ubah
    $layanan = "102"; // Kode layanan bisa dilihat di Tabel Layanan
    $jumlah = "$jumlah"; // Jumlah order
    $username_link = "$ig_username"; // Username atau link

    $url = "http://creativemarket.company/api/?api_key=".$api_key."&method=".$method."&layanan=".$layanan."&username_link=".$username_link."&jumlah=".$jumlah;
    $get = file_get_contents($url);
    $order = json_decode($get);

if ($order->result == "error") { ?>
    Order error karena <?php echo $order->alasan; ?>
<? } else if ($order->result == "success") { ?>
    <b>Order Success :</b> No. Order <?php echo $order->no_order; ?>
<? } ?>
<? } else if($service == '1') { ?>
                               <?php
    $api_key = "SVZC0652Q7O1PLE"; // 15 Random Kode Api Key Smart Voc anda
    $method = "order"; // Method jangan di ubah
    $layanan = "1"; // Kode layanan bisa dilihat di Tabel Layanan
    $jumlah = "$jumlah"; // Jumlah order
    $username_link = "$ig_username"; // Username atau link

    $url = "http://sv-panel.id/api.php?api_key=".$api_key."&method=".$method."&layanan=".$layanan."&username_link=".$username_link."&jumlah=".$jumlah;
    $get = file_get_contents($url);
    $order = json_decode($get);

if ($order->result == "error") { ?>
    Order error karena <?php echo $order->alasan; ?>
<? } else if ($order->result == "success") { ?>
    <b>Order Success :</b> No. Order <?php echo $order->no_order; ?>
<? } ?>
<? } ?>
</li>
<? }
}
 ?>