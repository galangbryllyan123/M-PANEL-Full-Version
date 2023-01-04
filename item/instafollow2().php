<?php
//Script by RTM Store

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

date_default_timezone_set("Asia/Jakarta");
$date = date("Y/m/d h:i:sa");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$tampil = mysql_fetch_array($query);

<?php
  require_once("../koneksi.php");
  $username = $_POST['username'];
  $service = $_POST['service'];
  $jumlah = $_POST['jumlah']
$saldo = $tampil['saldo'];

 $ig_username = $_POST['username'];
 $service = $_POST['service'];
 $jumlah = $_POST['jumlah'];

 if ($service == "102") {
  $harga = $jumlah * 19;
  $barang = "Instagram followers (SERVER 1,Max 4k)";
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
 $send = mysql_query("INSERT INTO historytransaksi(id, pembeli, barang, harga, status, data, tanggal) VALUES ('','$username','$jumlah $barang','$harga','Success','$ig_username','$date')");
 if ($send) { ?>
<?php
$apikey = "CMBCOWN2Z7FZGVO";
$command = "add";
$link = $ig_username;
$kode = $service;
$jumlah = $jumlah;
$url = "http://creativemarket.company/api/?apikey=$apikey&order=$command&link=$link&service=$kode&jumlah=$jumlah";
$jsonx = file_get_contents($url);
$jsony = json_decode($jsonx, true);
$msg = $jsony['ServerResponse'];
if($jsony['error'] == "1") {
echo "Perintah yang baru dilakukan ERROR!"; // disini adalah pesan yan dikeluarkan jika gagal
echo "Server Error : $msg"; // akan menampilkan balasan pesan dari server
} else if($jsony['error'] == "0") {
echo "Pesananan Ada Berhasil"; // Ubah jika berhasil akan menampilkan kode seperti apa
}
?>
<? } else { ?>
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','$paket Followers Pasif Instagram','$harga','Belum','Url/Username : $email','$tanggal')");
if($simpan) { 

?>
<div class="row">
                <div class="col-lg-10 col-lg-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <center>Struk Pemesanan</center>
                        </div>
                        <div class="panel-body">
                           <center>
<b>Berikut ini merupakan detail pemesanan anda :</b>
<hr>
Jenis &nbsp;:Like Instagram
<hr>
<td><span class="label label-success"><text-align:right>No Orderan</span></td>&nbsp&nbsp;<td><span <class="badge badge-warning"><?php echo $no ; ?></span></td>
<hr>
<td><span class="label label-success"><text-align:right>Pembeli :</span></td> <?php echo $get['nama']; ?>
<hr>
<i class="zmdi zmdi-facebook"></i>Barang : <?php echo $barang; ?>Followers Pasif
<hr>
<i class="zmdi zmdi-key"></i>Link : <?php echo $ig_username; ?>
<hr>
<i class="zmdi zmdi-money"></i>Harga : <?php echo $jumlah; ?>
<hr>
<i class="zmdi zmdi-face"></i>Tgl.Transaksi : <?php echo $date; ?>
<hr>

Status : Proses
                        </div>
                        <div class="panel-footer">
                            <center><a href="index.php"><button type="button" class="btn btn-outline btn-success" a href="index.php">Reload</button></a></center>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 --
<? } else { ?>
<? } } ?>