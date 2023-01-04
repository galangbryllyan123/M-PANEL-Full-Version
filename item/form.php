<?php
include_once "../id-config.php";

		$pw = $_SESSION['password'];
                $date = date('Y-m-d');

$query = mysql_query("SELECT * FROM userweb WHERE password = '$pw'");
$jz = mysql_num_rows($query);
$hasil = mysql_fetch_array($query);

$flink = '<div class="form-group">
                  <label for="input2" class="form-label">Username/Link</label>
                       <div class="input-group">
                      <div class="input-group-addon">@</div>
                      <input type="text" class="form-control" id="link" name="link" placeholder="Masukan username/link...">
                    </div>
                </div>';
$fkode = '<div class="form-group">
                  <label for="input1" class="form-label">Kode Voucher</label>
                  <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan kode voucher...">
                </div>';
$fkodeaktivasi = '<div class="form-group">
                  <label for="input1" class="form-label">Kode Aktivasi</label>
                  <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan kode aktivasi...">
                </div>';
$fjumlah = '<div class="form-group">
                  <label for="input2" class="form-label">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" onkeypress="validate(event)" placeholder="Masukan jumlah...">
                </div>';
$fjumlahh = '<div class="form-group">
                  <label for="input2" class="form-label">Jumlah</label>
                  <input type="text" class="form-control" onkeyup="getharga(this.value).value;" onkeypress="validate(event)" id="quantity" name="quantity" placeholder="Masukan jumlah...">
                </div>';
$fharga = '<div class="form-group">
                  <label for="input2" class="form-label">Harga</label>
                       <div class="input-group">
                      <div class="input-group-addon">Rp </div>
                      <input type="text" class="form-control" id="hargaa" placeholder="Harga..." disabled>
                      <div class="input-group-addon">,00</div>
                    </div>
                </div>';
$ffbid = '<div class="form-group">
                  <label for="input3" class="form-label">Facebook ID</label>
                  <input type="text" class="form-control" id="fbid" name="fbid" placeholder="Masukan Facebook ID...">
                </div>';
$fusername = '<div class="form-group">
                  <label for="input4" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username...">
                </div>';
$usernameku = '<div class="form-group">
                  <label for="input4" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" value="'.$hasil['username'].'">
                </div>';
$passwordlama = '<div class="form-group">
                  <label for="input4" class="form-label">Password Lama</label>
                  <input type="text" class="form-control" id="passwordlama" name="passwordlama" value="'.$hasil['password'].'" disabled>
                </div>';
$fpassword = '<div class="form-group">
                  <label for="input5" class="form-label">Password</label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="Masukan password...">
                </div>';
$fpasswordbaru = '<div class="form-group">
                  <label for="input5" class="form-label">Password Baru</label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="Masukan password baru...">
                </div>';
$frandom = '<div class="form-group">
                  <label for="input5" class="form-label">Jumlah</label>
                  <input type="text" class="form-control" id="random" value="Random" disabled/>
                </div>';
$fukey = '<div class="form-group">
                  <label for="input5" class="form-label">UserKey</label>
                  <input type="text" class="form-control" id="ukey" name="ukey" placeholder="Masukan UserKey...">
                </div>';
$fsessionkey = '<div class="form-group">
                  <label for="input5" class="form-label">SessionKey</label>
                  <input type="text" class="form-control" id="sessionkey" name="sessionkey" placeholder="Masukan SessionKey...">
                </div>';
$tombol = '<button type="submit" id="submit" onclick="submit();" class="btn btn-default btn-rounded"><i class="fa fa-mail-forward"></i> Submit</button>
                <button type="submit" id="tutup" onclick="tutup();" class="btn btn-basic btn-rounded" disabled><i class="fa fa-times"></i> Tutup</button>';
?>