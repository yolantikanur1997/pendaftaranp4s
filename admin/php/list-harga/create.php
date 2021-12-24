<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $no_paket = $_POST['no_paket'];
    $nama_paket = $_POST["nama_paket"];
    $deskripsi = $_POST["deskripsi"];
    $harga = stripcslashes($_POST["harga"]);



    $stmt = $koneksi->prepare("INSERT INTO list_harga (no_paket,nama_paket,deskripsi,harga) VALUES (?,?,?,?)");

    $stmt->bind_param("sssi",$no_paket,$nama_paket,$deskripsi,$harga);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>