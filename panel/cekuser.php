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
					<span class="panel-title">Cek User</span>
				</div>
				<div class="panel-body"> 

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>FbiD</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Nama</th>
                                                    <th>Level</th>
                                                    <th>Saldo</th>
                                                    <th>Uplink</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i=0;

$tampil = mysql_query("SELECT * FROM user ORDER BY id DESC");

while($data = mysql_fetch_array($tampil))
 {
 $i++;
 
echo "
<tr>
 <td>".$data[fbid]."</td>
 <td>".$data[username]."</td>
 <td>".$data[password]."</td>
 <td>".$data[nama]."</td>
 <td>".$data[level]."</td>
 <td>".$data[saldo]."</td>
 <td>".$data[uplink]."</td>
</tr>";
}
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
<? } ?>