<?php 
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['password'])){
    die('');//jika belum login jangan lanjut..
} ?>
<?php
include_once "../koneksi.php";

		$pw = $_SESSION['password'];
                $date = date('Y-m-d');

$query = mysql_query("SELECT * FROM user WHERE password = '$pw'");
$jz = mysql_num_rows($query);
$hasil = mysql_fetch_array($query);
?>
<?php
date_default_timezone_set("Asia/Jakarta");
$date = date('Y-m-d H:i:s');
$jam = date('H:i:s');
$no = rand(11111,99999);
$pesan = $_POST['pesan'];
$namaku = $hasil['nama'];
$fbidku = $hasil['fbid'];

function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
	
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
		
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
}


  if ($hasil['saldo'] < 0) { ?>
Maaf <?php echo $namadepana; ?>, anda tidak bisa melakukan proses ini...
<? 
 } else if (!$pesan) { echo "".$datatidaklengkap."";

 } else { ?>
<?php 
 $simpan = mysql_query("INSERT INTO chat VALUES('$no','$namaku','$fbidku','$pesan','$date')");
 die("<div id='alerttopright' class='kode-alert kode-alert-img alert1 kode-alert-top-right'>
            <img src='https://graph.facebook.com/".$fbidadmin."/picture?width=200&height=200' class='img' alt='img'>
          
            <h4>Pesan anda berhasil dikirim...</h4>
<br>
Salam, Muh Rizky Ramadhani (@RizkyCS)</div>");
?>
<? }
?>