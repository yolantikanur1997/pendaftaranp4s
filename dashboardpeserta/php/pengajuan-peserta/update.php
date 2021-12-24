<?php
// session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
include("../../../config/koneksi.php");

 $id_pengajuan = $_GET['id_pengajuan'];

    $tanggal_mulai = $_POST['tanggal_mulai'];
    $sampai_tanggal = $_POST['sampai_tanggal'];
     $id = $_POST["id_pengajuan"];

    $stmt = $koneksi->prepare("UPDATE pengajuan_peserta SET tanggal_mulai=?,sampai_tanggal=? WHERE id=$pengajuan");

    $stmt->bind_param("ssi",$tanggal_mulai,$sampai_tanggal,$id);



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