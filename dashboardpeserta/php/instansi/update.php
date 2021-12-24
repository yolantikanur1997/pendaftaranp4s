<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");


    $nama_instansi = $_POST['nama_instansi'];
    $kategori = $_POST["kategori"];
    $telepon = $_POST["telepon"];
    $alamat = $_POST["alamat"];
    $username = $_POST["username"];
    $id = $_POST["id_instansi"];

    $stmt = $koneksi->prepare("UPDATE registrasi_akun_instansi SET nama_instansi=?,kategori=?,telepon=?,alamat=?,username=? WHERE id =?");

    $stmt->bind_param("ssissi",$nama_instansi,$kategori,$telepon,$alamat,$username,$id);


    if ($stmt->execute()) {
        echo 1;
    }
    else
    {
        echo 0;
    }
    $stmt->close();
}
?> 