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
					<span class="panel-title">Followers Twitter Aktif</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Link/Username</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Link/Username"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<option value="100">100 Followers Twitter Aktif</option>
<option value="500">500 Followers Twitter Aktif</option>
<option value="700">700 Followers Twitter Aktif</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
- 100 Follower : 1000 Saldo
- 500 Follower : 5000 Saldo
- 700 Follower : 7000 Saldo
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var email = $('#email').val();
	var paket = $('#paket').val();
	$.ajax({
		url	: 'item/twitfollow2().php',
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