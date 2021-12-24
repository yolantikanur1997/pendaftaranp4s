<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");


    $hari2 = $_POST['hari'];
    $tanggal2 = $_POST["tanggal"];
    $id = $_POST["id_jadwal"];


    $stmt = $koneksi->prepare("UPDATE jadwal_pelatihan SET hari=?,tanggal=? WHERE id =?");

       $stmt->bind_param("ssi",$hari2,$tanggal2,$id);


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