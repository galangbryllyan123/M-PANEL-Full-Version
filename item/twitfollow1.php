<?php 
//Script by RTM Store

 session_start();

 if(!isset($_SESSION['username'])) { 
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'"); 
$tampil = mysql_fetch_array($query); ?>
				<div class="panel-heading">
					<span class="panel-title">Twitter Followers</span>
				</div>
				<div style="text-align:left;"><div class="panel-body">
  <div class="alert alert-info alert-block fade in"> <h4> <i class="icon-info-sign"></i> <font color='red'><b>INFO :</b></font></h4><b><p>- Instant Processing(Proses secara auto/langsung tanpa menunggu lama.<br />- Pastikan akun/tweet, Publik/Tidak di private. <br>- Untuk followers twitter harap masukkan link akun, bukan username<br>- Untuk yang melanggar peraturan, Jika terjadi error dan saldonya berkurang, bukan tanggung jawab kami</b><p><p><i>Terjadi Masalah? Hubungi Admin.</i><p><i>Terimakasih.</i></div>
                                         </div> <div class="form-horizontal">
                                             <div class="control-group">
                                                <div class="col-md-3">
 <label for="normal-field" class="control-label">Link Akun</label>
 </div>
                                                    <div class="col-md-9">
 <div class="form-group"> <input type="text" placeholder="Link akun twitter" class="form-control" id="username" name="username"> </div>
 </div> </div> 
                                            <div class="control-group">
                                               <div class="col-md-3"> 
                                         <label for="normal-field" class="control-label">Layanan</label> </div> 
                                           <div class="col-md-9"> 
                                          <div class="form-group">
 <select class="form-control" id="service" name="service">
 <option value="100">Twitter Followers S1(High Quality, Mixed, dan Instant)</option> 
 </select>
 </div>
 </div>
 </div> 
                                            <div class="control-group">
                                               <div class="col-md-3"> 
 <label for="normal-field" class="control-label">Jumlah</label>
 </div> 
                                                  <div class="col-md-9">
                                                 <div class="form-group"> 
 <input type="text" placeholder="Min 100, Max 4k" class="form-control" id="jumlah" name="jumlah" onkeyup="kalkulatorTambah(this.value).value;">
 </div>
 </div>
 </div>
                                      <div class="control-group">
                                      <div class="col-md-3">
 <label for="normal-field" class="control-label">Harga</label>
 </div>
                                           <div class="col-md-9">
                                             <div class="form-group">
                                             <div class="input-group">
<span class="input-group-addon">Rp.</span>
 <input type="text" placeholder="0" class="form-control" id="harga" name="harga" disabled="disabled"></div>
 </div>
 </div>
 </div>
                                                <div class="form-actions">
 <div>
<center>
 <button class="btn btn-primary" type="submit" onclick="kirim();">Submit</button>
 </center>
</div>
 </div>
 </div>
 </div>
 </div>
 <script> function kalkulatorTambah(jumlah){ var namaaplikasi = $("#service").val(); if (namaaplikasi== "100"){ var hasil = eval(jumlah) * 39; $('#harga').val(hasil); } else if (namaaplikasi== "16"){ var hasil = eval(jumlah) * 25; $('#harga').val(hasil); } else if (namaaplikasi== "36"){ var hasil = eval(jumlah) * 30; $('#harga').val(hasil); } else if (namaaplikasi== "51"){ var hasil = eval(jumlah) * 20; $('#harga').val(hasil); } } function kirim()
 { 
post();
 	var username = $('#username').val();
 	var service = $('#service').val();
 	var jumlah = $('#jumlah').val();
 	$.ajax({
 		url	: 'item/twitfollow1().php',
 		data	: 'username='+$('#username').val()+'&service='+$('#service').val()+'&jumlah='+$('#jumlah').val(),
 		type	: 'POST',
 		dataType: 'html',
 		success	: function(result){
 hasil();
 	$("#result").html(result);
 	}
 	});
 }
 </script>