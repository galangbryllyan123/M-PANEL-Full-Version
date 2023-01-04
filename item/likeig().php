<?php

  $jumlah = $_POST['jumlah'];


$harga = $jumlah * 20;
$link = $_POST['link'];
?>
<?php if (isset($_POST['link']) && isset($_POST['jumlah'])) {
    $url = $_POST['link'];
    $point = $_POST['jumlah'];
    $s = file_get_contents("http://api.instagram.com/publicapi/oembed/?url=" . $_POST['link']);
    $data = json_decode($s, true);
    $likeid = $data['media_id'];
    $thumbnail = $data['thumbnail_url'];
    $thumbnail_url = $data['thumbnail_url'];
    $account = $data['author_name'];
    $ser = str_replace("_", "", $likeid);
    if (!is_numeric($ser)) {
        die("Pastikan url/link foto yang Anda masukan benar dan pastikan juga akun anda tidak dalam posisi privasi :)
Salam, Bantolo Setiadi (@bantolocs)");
    }
    if ($_POST['points'] > "1000") {
        echo "Jancuk! Jangan memasukan jumlah like terlalu banyak, nanti keblokir cuk -_-";
        exit();
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, "http://www.metinogtem.com/Instagram/add.php?ID=" . $likeid . "&Link=" . $thumbnail . "&Points=" . $point . "&PushID=APA91bGEMEooQB5OQE6IGxQq1ya0NPUB4e8Ourf2xj1nNm5VgFK252Z34ZAoqTs-LGZIcMyMlE9KXL7LgPOxzsVLQFe9vJwsu94bMELe8CXyGmLYL9ZbSlNVakpMTgNS9DV6MvXvesGU&Type=Android");
    $headers = array();
    $headers[] = 'User-Agent: Mozilla/5.0 (Linux; U; Android 4.0.4; zh-cn; Lenovo A390_ROW/S030)';
    $headers[] = 'Host: www.metinogtem.com';
    $headers[] = 'Accept-Encoding: gzip';
    $headers[] = 'Connection: close';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $out = curl_exec($ch);
    curl_close($ch);
    $s = json_decode($out, true);
    if ($s['PriKey'] != 0) {
        die("====================<br>
| Pengiriman " . $_POST['jumlah'] . " like instagram sukses!<br>
| URL/Link Foto : " . $_POST['link'] . "<br>
| Pengirim : $nama<br>
| Penerima : @" . $account . "<br>
| Status : Terkirim<br>
| Waktu : ".DateToIndo($date)." (".$jam.")<br>
====================<br>
$linkweb :)");

    } else {

        die("====================<br>
GAGAL! @" . $account . ", " . $_POST['jumlah'] . " like gagal dikirim ke : " . $_POST['link'] . ". Kemungkinan besar dikarenakan akun masih privasi/IP anda/akun tsb telah diblokir. <br>
====================<br>
Salam, Bantolo Setiadi (@bantolcs)");
    }
}
?>