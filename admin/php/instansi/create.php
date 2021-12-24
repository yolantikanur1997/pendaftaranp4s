<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $nama_instansi = $_POST['nama_instansi'];
    $kategori = $_POST["kategori"];
    $telepon = $_POST["telepon"];
    $alamat = $_POST["alamat"];
    $tanggal_registrasi = date('Y-m-d');
    $username = $_POST["username"];
    $password = mysqli_escape_string ($koneksi, $_POST['password']);

    $password = password_hash($password, PASSWORD_DEFAULT);



    $stmt = $koneksi->prepare("INSERT INTO registrasi_akun_instansi (nama_instansi,kategori,telepon,alamat,tanggal_registrasi,username,password) VALUES (?,?,?,?,?,?,?)");

    $stmt->bind_param("ssissss",$nama_instansi,$kategori,$telepon,$alamat,$tanggal_registrasi,$username,$password);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>