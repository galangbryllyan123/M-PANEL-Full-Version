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
 				<div class="panel-heading">
					<span class="panel-title">[Event] Register Member</span>
				</div>
				<div class="panel-body"> 


                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"/>
                                            </div>
                                        </div>           
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                                            </div>
                                        </div>           
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Facebook ID</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="fbid" id="fbid" placeholder="Facebook ID"/>
                                            </div>
                                        </div>           
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="password" id="password" placeholder="Password"/>
                                            </div>
                                        </div>           
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Level</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="level" name="level">
<?php if ($get['level'] == "Reseller") { ?>
<option value="Member">Member</option>

<? } else if ($get['level'] == "MemberVIP") { ?>
<option value="Member">Member</option>

<? } else if ($get['level'] == "Admin") { ?>
<option value="Member">Member</option>
<? }
?>
                                                </select>
                                            </div>
                                        </div>
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="tambahuser();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-info">
Member : Rp 0
</div>
                                </div>

<script>
function tambahuser()
{
post();
	var nama = $('#nama').val();
	var username = $('#username').val();
	var fbid = $('#fbid').val();
	var password = $('#password').val();
	var level = $('#level').val();
	$.ajax({
		url	: 'panel/eventmember().php',
		data	: 'nama='+nama+'&username='+username+'&fbid='+fbid+'&password='+password+'&level='+level,
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