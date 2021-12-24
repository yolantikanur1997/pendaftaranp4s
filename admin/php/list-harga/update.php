<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");


    $no_paket = $_POST['no_paket'];
    $nama_paket = $_POST["nama_paket"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];
    $id = $_POST["id_list_harga"];

    $stmt = $koneksi->prepare("UPDATE list_harga SET no_paket=?,nama_paket=?,deskripsi=?,harga=? WHERE id =?");

       $stmt->bind_param("sssii",$no_paket,$nama_paket,$deskripsi,$harga,$id);


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