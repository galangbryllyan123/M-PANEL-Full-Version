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
					<span class="panel-title">WHM</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Domain</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="domaina" id="domaina" placeholder="Domain"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="packagea" name="packagea">
<option value="mini">Mini</option>
<option value="medium">Medium</option>
<option value="extra">Extra</option>
<option value="unli">Unlimitade</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
WHM Mini       = 15.000 Saldo
WHM Medium     = 25.000 Saldo
WHM Extra      = 30.000 Saldo
WHM UNLIMITADE = 35.000 Saldo

Jangan Membuat Scam & Mailer & Phising !!
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var packagea = $('#packagea').val();
	var domaina = $('#domaina').val();
	$.ajax({
		url	: 'item/whm().php',
		data	: 'packagea='+packagea+'&domaina='+domaina,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>