<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");


    $id_pengajuan_peserta = $_POST['id_pengajuan_peserta'];
    $no_rekening = $_POST["no_rekening"];
    $atas_nama = $_POST["atas_nama"];
    $bank = $_POST["bank"];
    $tanggal_bayar = $_POST["tanggal_bayar"];
    $id = $_POST["id_konfirmasi"];
    $status = $_POST["status"];
    $catatan = $_POST["catatan"];

    $stmt = $koneksi->prepare("UPDATE konfirmasi_pembayaran SET id_pengajuan_peserta=?,no_rekening=?,atas_nama=?,bank=?,tanggal_bayar=?,status=?,catatan=? WHERE id=?");

    $stmt->bind_param("iisssssi",$id_pengajuan_peserta,$no_rekening,$atas_nama,$bank,$tanggal_bayar,$status,$catatan,$id);


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