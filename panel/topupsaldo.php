<?php
//Script by Sebastian Wirajaya

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
<?php if($get['level'] == Member) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>TopUp Saldo</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username Penerima</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Username Penerima"/>
                                            </div>
                                        </div>           
<br />       
<br /> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jumlah Saldo</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="jumlah" name="jumlah">
<option value="1">5.000 Saldo</option>
<option value="2">10.000 Saldo</option>
<option value="3">15.000 Saldo</option>
<option value="4">20.000 Saldo</option>
<option value="5">25.000 Saldo</option>
<option value="6">30.000 Saldo</option>
<option value="7">35.000 Saldo</option>
<option value="8">40.000 Saldo</option>
<option value="9">45.000 Saldo</option>
<option value="10">50.000 Saldo</option>
<option value="11">55.000 Saldo</option>
<option value="12">60.000 Saldo</option>
<option value="13">65.000 Saldo</option>
<option value="14">70.000 Saldo</option>
<option value="15">75.000 Saldo</option>
<option value="16">80.000 Saldo</option>
<option value="17">85.000 Saldo</option>
<option value="18">90.000 Saldo</option>
<option value="19">95.000 Saldo</option>
<option value="20">100.000 Saldo</option>
                                                </select>
                                            </div>
                                        </div>
<br />       
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-warning">
Anti BUG! :p Saldo anda berkurang sesuai yang di kirim.
</div>
                                </div>

<script>
function kirim()
{
post();
	var penerima = $('#penerima').val();
	var jumlah = $('#jumlah').val();
	$.ajax({
		url	: 'panel/topupsaldo().php',
		data	: 'penerima='+penerima+'&jumlah='+jumlah,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>
<? } ?>