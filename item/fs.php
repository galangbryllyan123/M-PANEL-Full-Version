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
				<div class="panel-heading">
					<span class="panel-title">Pembelian PP Friend Sign</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kontak</label>
                                            <div class="col-md-9">
<textarea class="form-control" id="kontak" name="kontak" placeholder="Link Facebook"></textarea>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Model / Artis</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="model" id="model" placeholder="Model / Artis"/>
                                            </div>
                                        </div> 
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
PP Friend Sign : 1.500 Saldo
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var kontak = $('#kontak').val();
	var jualan = $('#jualan').val();
	var model = $('#model').val();
	$.ajax({
		url	: 'item/fs().php',
		data	: 'kontak='+kontak+'&jualan='+jualan+'&model='+model,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>