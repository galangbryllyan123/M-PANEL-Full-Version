<?php
//Script by RTM Store

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$tampil = mysql_fetch_array($query);

?>

          <div class="widget">
            <div class="widget-header"> <i class="icon-star "></i>
              <h3>Instagram Followers Aktif</h3>
            </div>
            <div class="widget-content">
                  <div class="alert alert-info alert-block fade in">
                    <h4> <i class="icon-info-sign"></i> Mohon membaca sebelum submit : </h4>
                    <p>
- Pastikan akun tidak private / di gembok.<br />
- Masukkan username tanpa "@"". <br>
- Followers Indo High Quality. <br>
- Followers Masuk Instant .
</p>
                  </div>

              <div class="form-horizontal">

                  <div class="control-group">
                  <div class="col-md-3">
                    <label for="normal-field" class="control-label">Username</label>
                    </div>
                    <div class="col-md-9">
                    <div class="form-group">
                      <input type="text" placeholder="Username" class="form-control" id="username" name="username">
                    </div>
                    </div>
                  </div>

                  <div class="control-group">
                  <div class="col-md-3">
                    <label for="normal-field" class="control-label">Layanan</label>
                    </div>
                    <div class="col-md-9">
                    <div class="form-group">
                      <select class="form-control" id="service" name="service">
                        
<option value="#">Pilih layanan..</option>

<option value="100">Instagram followers aktif(SERVER 1,Fast,Quality)</option>
                         <option value="16">SERVER MAINTENANCE</option>
        
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
                      <input type="text" placeholder="Jumlah" class="form-control" id="jumlah" name="jumlah" onkeyup="kalkulatorTambah(this.value).value;">
                    </div>
                    </div>
                  </div>

                  <div class="control-group">
                  <div class="col-md-3">
                    <label for="normal-field" class="control-label">Harga</label>
                    </div>
                    <div class="col-md-9">
                    <div class="form-group"><div class="input-group"><span class="input-group-addon">Rp.</span>
                      <input type="text" placeholder="0" class="form-control" id="harga" name="harga" disabled="disabled"></div>
                    </div>
                    </div>
                  </div>

                <div class="form-actions">
                  <div><center>
                    <button class="btn btn-primary" type="submit" onclick="kirim();">Submit</button>
                  </center></div>
                </div>

              </div>
            </div>
          </div>

<script>
function kalkulatorTambah(jumlah){
var namaaplikasi = $("#service").val();
if (namaaplikasi== "100"){
var hasil = eval(jumlah) * 90;
$('#harga').val(hasil);
  
} else if (namaaplikasi== "16"){
var hasil = eval(jumlah) * 25; 
$('#harga').val(hasil); 

} else if (namaaplikasi== "36"){
var hasil = eval(jumlah) * 30;
$('#harga').val(hasil);

} else if (namaaplikasi== "51"){
var hasil = eval(jumlah) * 20; 
$('#harga').val(hasil); 
}

} 


function kirim()
{
post();
	var username = $('#username').val();
	var service = $('#service').val();
	var jumlah = $('#jumlah').val();
	$.ajax({
		url	: 'item/instafollow2().php',
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