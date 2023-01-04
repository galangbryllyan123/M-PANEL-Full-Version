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
					<span class="panel-title">Pendaftaran [X]-VIP.Inc</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Link FB</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Link FB"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<option value="Member">Member Standar</option>
<option value="Member VIP">Member VIP</option>
<option value="Admin">Admin Standar</option>
<option value="Admin VIP">Admin VIP</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
- Member Standar : 25.000 Saldo
- Member VIP     : 30.000 Saldo
- Admin Standar  : 35.000 Saldo
- Admin VIP      : 50.000 Saldo
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var email = $('#email').val();
	var paket = $('#paket').val();
	$.ajax({
		url	: 'panel/groupvip().php',
		data	: 'email='+email+'&paket='+paket,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>