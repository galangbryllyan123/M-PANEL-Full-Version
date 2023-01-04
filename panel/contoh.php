                        <!--tab nav start-->
                        <section class="panel general">
                            <header class="panel-heading tab-bg-dark-navy-blue">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#home-2">
                                            <i class="fa fa-user-plus">Tambah User</i>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#about-2">
                                            <i class="fa fa-user-times"></i>
                                            Hapus User
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#contact-2">
                                            <i class="fa fa-money"></i>
                                            Top Up Saldo
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#voucher-2">
                                            <i class="fa fa-credit-card"></i>
                                            Buat Voucher Saldo
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#upgrade-2">
                                            <i class="fa fa-level-up"></i>
                                            Upgrade Member
                                        </a>
                                    </li>
                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div id="home-2" class="tab-pane active">
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
					<span class="panel-title">Tambah User</span>
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
<option value="MemberVIP">MemberVIP</option>

<? } else if ($get['level'] == "MemberVIP") { ?>
<option value="Member">Member</option>

<? } else if ($get['level'] == "Admin") { ?>
<option value="Reseller">Reseller</option>
<option value="MemberVIP">MemberVIP</option>
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
Member : Rp 10.000 + 5.000 Saldo<br /> MemberVIP : Rp 30.000 + 15.000 Saldo<br /> Reseller : Rp 50.000 + 30.000 Saldo
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
		url	: 'panel/tambahuser().php',
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
                                    </div>
                                    <div id="about-2" class="tab-pane ">
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
<?php if($get['level'] !== Admin) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
				<div class="panel-heading">
					<span class="panel-title">Hapus User</span>
				</div>
				<div class="panel-body"> 
 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                                            </div>
                                        </div>           
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="hapususer();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-warning">
Berhati-hatilah memasukkan data.
</div>
                                </div>

<script>
function hapususer()
{
post();
	var username = $('#username').val();
	$.ajax({
		url	: 'panel/hapususer().php',
		data	: 'username='+username,
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
</div>
                                    <div id="contact-2" class="tab-pane ">
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
					<span class="panel-title">TopUp Saldo</span>
				</div>
				<div class="panel-body"> 
 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kode</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="kode" id="kode" placeholder="SCT-****-****"/>
                                            </div>
                                        </div>           
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="buat();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-warning">
Berhati-hatilah memasukkan data.
Contoh : SCT-50230
</div>
                                </div>

<script>
function buat()
{
post();
	var kode = $('#kode').val();
	$.ajax({
		url	: 'panel/topupsaldo().php',
		data	: 'kode='+kode,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>

</div>
                                    <div id="voucher-2" class="tab-pane active">
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
					<span class="panel-title">Buat Voucher Saldo</span>
				</div>
				<div class="panel-body"> 
 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Isi</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="isi" id="isi" placeholder="Isi"/>
                                            </div>
                                        </div>           
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kode</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="kode" id="kode" placeholder="****-****"/>
                                            </div>
                                        </div>           
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="buat();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-warning">
Berhati-hatilah memasukkan data. Saldo berkurang sesuai isi voucher yang di submit.
</div>
                                </div>

<script>
function buat()
{
post();
	var isi = $('#isi').val();
	var kode = $('#kode').val();
	$.ajax({
		url	: 'panel/vocsaldo().php',
		data	: 'isi='+isi+'&kode='+kode,
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
</div>
                                    <div id="upgrade-2" class="tab-pane active">
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
<?php if($get['level'] !== Admin) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
				<div class="panel-heading">
					<span class="panel-title">Upgrade Member To VIP</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username member</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                                            </div>
                                        </div>               
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="upgrademember();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-warning">
Berhati-hatilah memasukkan data.
</div>
                                </div>

<script>
function upgrademember()
{
post();
	var username = $('#username').val();
	$.ajax({
		url	: 'panel/upgrademember().php',
		data	: 'username='+username,
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
</div>
                                </div>
                            </div>
                        </section>
                        <!--tab nav end-->