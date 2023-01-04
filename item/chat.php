  <?php 
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['password'])){
    die('');//jika belum login jangan lanjut..
} ?>
<?php
include_once "../koneksi.php";
include_once "form.php";

		$pw = $_SESSION['password'];
                $date = date('Y-m-d');

$query = mysql_query("SELECT * FROM user WHERE password = '$pw'");
$jz = mysql_num_rows($query);
$hasil = mysql_fetch_array($query);
$fbid = $hasil['fbid'];
$nama = $hasil['nama'];
$utrans = "SELECT * FROM chat ORDER BY tanggal ASC";
$jtrans = mysql_num_rows($qtrans);
 $exe = mysql_query($utrans);
$hasiltrans = mysql_fetch_array($utrans);

$jt = mysql_query("SELECT harga, SUM(harga) FROM transaksi");
$jtr = mysql_num_rows($jt);
$htr = mysql_fetch_array($jt);

function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
} 
?>
<?php if($_GET['id'] == chat) { ?>
<?php
while($rowa = mysql_fetch_assoc($exe))
  { ?>
                <li>
                  <img src="http://graph.facebook.com/<?php echo $rowa['fbid']; ?>/picture" alt="img">
                  <span class="name"><?php echo $rowa['nama']; ?></span>
                  <?php echo $rowa['pesan']; ?>
                </li>
<?  }
mysql_close;
?>
<? } else { ?>
      <!-- Start Post -->

          <div class="panel panel-default" >
            <div class="panel-body status">
              <ul class="panel-tools panel-tools-hover">
                <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
              </ul>
              <div class="who clearfix">
                <img src="http://graph.facebook.com/<?php echo $fbidadmin; ?>/picture" alt="img">
                <span class="name"><b>Muh Rizky Ramadhani</b> berbagi kiriman</span>
                <span class="from"><b>26 Agustus 2016</b> via Mobile, Surabaya</span>
              </div>
              <div class="text">Sekarang AdminRizky telah menyediakan fitur chat untuk para user yang ingin menyampaikan pendapat, saran maupun kritikan. Harap gunakan dengan bijak, dilarang menggunakan kata-kata yang bermakna negatif.</div>
              <ul class="comments" style="height: 300px; overflow:auto;">
<div id="chatnya">
<?php
while($rowa = mysql_fetch_assoc($exe))
  { ?>
                <li>
                  <img src="http://graph.facebook.com/<?php echo $rowa['fbid']; ?>/picture" alt="img">
                  <span class="name"><?php echo $rowa['nama']; ?></span>
                  <?php echo $rowa['pesan']; ?>
                </li>
<?  }
mysql_close;
?>
</div>
                <li>
                  <img src="http://graph.facebook.com/<?php echo $hasil['fbid']; ?>/picture" alt="img">
                  <input type="text" class="form-control" id="pesan" placeholder="Masukan pesan anda..."><br><?php echo $tombol; ?>
                </li>
              </ul>
            </div>
          </div>
<script>
function submit(){
    post();
    var pesan = $('#pesan').val();

	$.ajax({
		url	: 'item/kirimpesan.php',
		data	: 'pesan='+pesan,
		type	: 'POST',
		dataType: 'html',
		success	: function(pesan){
hasil();
            if(pesan == 'LOGINSUKSES'){
                    $('#pophasil').html("<div id='alerttopright' class='kode-alert kode-alert-img alert3 kode-alert-top-right'><img src='https://graph.facebook.com/<?php echo $fbidadmin; ?>/picture?width=200&height=200' class='img' alt='img'><h4>Sukses!</h4>Anda berhasil login...</div>");
    $("#alerttopright").slideToggle(350);
                setTimeout('to_dashboard()', 1000);
            } else {
                 $('#pophasil').html(pesan);
    $("#alerttopright").slideToggle(350);
            }
	    }
	});
}

function to_dashboard() {
	window.location = '/';
}

function tutup() {
 var proceed = true;
        if (proceed) {
$('#submit').removeAttr("disabled");
$('#tutup').attr("disabled", "disabled");
$("#alerttopright").slideToggle(350);
normal();		
}
}
</script>  
<script>
$(document).ready(function(){
setInterval(function(){
$("#chatnya").load('menu/chat.php?id=chat')
}, 2000);
});
</script>
<? }
?>
        <!-- End Post -->