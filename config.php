<?php

$host = "localhost";
$user = "danux";
$pass = "danux";
$db = "project";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "koneksi gagal" . mysqli_error();
}

// function quran($service = '', $param = '')
// {
//     $token = "99c279bb173a6e28359c";
//     $url = "https://api.npoint.io/" . $token . "/" . "$service" . "/" . "$param";
//     $session = curl_init();
//     curl_setopt($session, CURLOPT_RETURNTRANSFER, TRUE);
//     curl_setopt($session, CURLOPT_URL, $url);
//     $result = curl_exec($session); // will return true or false
//     curl_close($session);
//     $res = json_decode($result, true);
//     return $res;
// }

function quran($param = '')
{
    $url = "https://api-alquranid.herokuapp.com/surah/" . $param;
    // $url = "https://quran-endpoint.vercel.app/" . $service . "/" . $param . "/";
    $data = file_get_contents($url);
    $res = json_decode($data, TRUE);
    return $res;
}

function tes()
{
    // $url = "https://api-alquranid.herokuapp.com/surah/" . $param;
    $url = "https://raw.githubusercontent.com/penggguna/QuranJSON/master/quran.json";
    // $url = "https://quran-endpoint.vercel.app/" . $service . "/" . $param . "/";
    $data = file_get_contents($url);
    $res = json_decode($data, TRUE);
    return $res;
}





function register($data)
{
    global $koneksi;

    $username = htmlspecialchars($data['username']);
    $pass = mysqli_real_escape_string($koneksi, $data['password']);
    $pass2 = mysqli_real_escape_string($koneksi, $data['password2']);

    // cek username sudah terdaftar atau belum
    $cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' ");

    if (mysqli_fetch_assoc($cek_user)) {
        echo "<script> alert('Username sudah terdaftar'); </script>";
        return false;
    }

    // cek konfirmasi password
    if ($pass !== $pass2) {
        echo "<script> alert('Konfirmasi password tidak sesuai') </script>";
        return false;
    }

    // enkripsi password
    $enkripsi = password_hash($pass, PASSWORD_DEFAULT);

    // tambahkan ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES(NULL, '$username', '$enkripsi') ");

    return mysqli_affected_rows($koneksi);
}
