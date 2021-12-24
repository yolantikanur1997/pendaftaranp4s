<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $id_pengajuan_peserta = $_POST['id_pengajuan_peserta'];
    $no_rekening = $_POST["no_rekening"];
    $atas_nama = $_POST["atas_nama"];
    $bank = $_POST["bank"];
    $tanggal_bayar = $_POST["tanggal_bayar"];
    $tanggal_konfirmasi = date('Y:m:d');
    $status = 'Sedang di Proses';
    $catatan = 'Belum ada catatan';


    $stmt = $koneksi->prepare("INSERT INTO konfirmasi_pembayaran (id_pengajuan_peserta,no_rekening,atas_nama,bank,tanggal_bayar,tanggal_konfirmasi,status,catatan) VALUES (?,?,?,?,?,?,?,?)");

    $stmt->bind_param("iissssss",$id_pengajuan_peserta,$no_rekening,$atas_nama,$bank,$tanggal_bayar,$tanggal_konfirmasi,$status,$catatan);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>