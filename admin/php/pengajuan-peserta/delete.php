<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE pengajuan_peserta, pengajuan_peserta_detail
        FROM pengajuan_peserta
        INNER JOIN pengajuan_peserta_detail ON pengajuan_peserta.id = pengajuan_peserta_detail.id_pengajuan_peserta 
        WHERE pengajuan_peserta.id=?");
    $stmt->bind_param("i",$id);

    $id = $_POST["id_pengajuan"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>