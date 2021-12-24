<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");


    $status2 = $_POST['status'];
    $catatan2 = $_POST["catatan"];
    $id = $_POST["id_pengajuan"];


    $stmt = $koneksi->prepare("UPDATE pengajuan_peserta SET status=?,catatan=? WHERE id =?");

       $stmt->bind_param("ssi",$status2,$catatan2,$id);


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