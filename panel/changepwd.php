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
<?php if($get['level'] == orang) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
 				<div class="panel-heading">
					<span class="panel-title">Ganti Password</span>
				</div>
				<div class="panel-body"> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="pw" id="pw" placeholder="Password"/>
                                            </div>
                                        </div>           
<br />
</span>
<small class="desc">Password bisa dirubah kapan saja..</small>
                        </p>
<div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>
							</div>

<script>
function kirim()
{
post();
	var pw = $('#pw').val();
	$.ajax({
		url	: 'panel/changepwd().php',
		data	: 'pw='+pw,
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