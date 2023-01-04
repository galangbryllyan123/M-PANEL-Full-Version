<?php
// Script by Sebastian Wirajaya

$host = "localhost";
$user = "mpanel_database";
$pass = "team321";
$db = "mpanel_database";
$konek = mysql_connect($host, $user, $pass) or die ('Koneksi Gagal! ');
mysql_select_db($db);
?>