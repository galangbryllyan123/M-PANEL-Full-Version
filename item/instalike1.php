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
					<span class="panel-title">Instagram Like</span>
				</div>
				<div style="text-align:left;"><div class="panel-body">
  <div class="alert alert-info alert-block fade in"> <h4> <i class="icon-info-sign"></i> <font color='red'>INFO :</font></h4><b><p> - Pastikan akun instagram tidak private / di gembok.<br /> - Masukkan link foto instagram dengan benar. <br>- Untuk yang melanggar peraturan, Jika terjadi error dan saldonya berkurang, bukan tanggung jawab kami</b><p><p><i>Terjadi Masalah? Hubungi Admin.</i><p><i>Terimakasih.</i></div>
                                         </div> <div class="form-horizontal">
                                             <div class="control-group">
                                                <div class="col-md-3">
 <label for="normal-field" class="control-label">Link Foto</label>
 </div>
                                                    <div class="col-md-9">
 <div class="form-group"> <input type="text" placeholder="Link Foto Instagram" class="form-control" id="username" name="username"> </div>
 </div> </div> 
                                            <div class="control-group">
                                               <div class="col-md-3"> 
                                         <label for="normal-field" class="control-label">Layanan</label> </div> 
                                           <div class="col-md-9"> 
                                          <div class="form-group">
 <select class="form-control" id="service" name="service">
 <option value="2">Instagram Like V1(Max 5k)</option> 
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
 <input type="text" placeholder="Min 100, Max 5k" class="form-control" id="jumlah" name="jumlah" onkeyup="kalkulatorTambah(this.value).value;">
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
 <script> function kalkulatorTambah(jumlah){ var namaaplikasi = $("#service").val(); if (namaaplikasi== "2"){ var hasil = eval(jumlah) * 19; $('#harga').val(hasil); } else if (namaaplikasi== "16"){ var hasil = eval(jumlah) * 25; $('#harga').val(hasil); } else if (namaaplikasi== "36"){ var hasil = eval(jumlah) * 30; $('#harga').val(hasil); } else if (namaaplikasi== "51"){ var hasil = eval(jumlah) * 20; $('#harga').val(hasil); } } function kirim()
 { 
post();
 	var username = $('#username').val();
 	var service = $('#service').val();
 	var jumlah = $('#jumlah').val();
 	$.ajax({
 		url	: 'item/instalike1().php',
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