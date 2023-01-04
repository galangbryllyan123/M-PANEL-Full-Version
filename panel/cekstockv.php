<?php
//Script by Sebastian Wirajaya

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");
?>
				<div class="panel-heading">
					<span class="panel-title">Cek Stock Voucher Game</span>
				</div>
				<div class="panel-body"> 

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Jenis</th>
                                                    <th>Isi</th>
                                                    <th>Harga</th>
                                                    <th>Kode Cash</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i=0;

$tampil = mysql_query("SELECT * FROM stockcash ORDER BY jenis DESC");

while($data = mysql_fetch_array($tampil))
 {
 $i++;
 
echo "
<tr>
 <td>".$data[jenis]."</td>
 <td>".$data[isi]."</td>
 <td>".$data[harga]."</td>
 <td>".$data[kodecash]."</td>
</tr>";
}
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>