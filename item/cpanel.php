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
					<span class="panel-title">cPanel X</span>
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
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="usera" id="usera" placeholder="Username"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="passworda" id="passworda" placeholder="Password"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="packagea" name="packagea">
<option value="rafli_cpanel mini">Mini</option>
<option value="rafli_cpanel medium">Medium</option>
<option value="rafli_cpanel extra">Extra</option>
<option value="rafli_cpanel unli">Unlimitade</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
cPanel X :
Mini = 3.000
Medium = 8.000
Extra = 12.000
unlimitade = 17.000
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var usera = $('#usera').val();
	var passworda = $('#passworda').val();
	var packagea = $('#packagea').val();
	var domaina = $('#domaina').val();
	$.ajax({
		url	: 'item/cpanel().php',
		data	: 'usera='+usera+'&passworda='+passworda+'&packagea='+packagea+'&domaina='+domaina,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>