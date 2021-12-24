<?php
// session_start();
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT konfirmasi_pembayaran.id,konfirmasi_pembayaran.no_rekening,konfirmasi_pembayaran.atas_nama,konfirmasi_pembayaran.bank,konfirmasi_pembayaran.tanggal_bayar,konfirmasi_pembayaran.tanggal_konfirmasi,konfirmasi_pembayaran.status,konfirmasi_pembayaran.catatan,pengajuan_peserta.no_pengajuan,registrasi_akun_instansi.nama_instansi
FROM konfirmasi_pembayaran 
INNER JOIN pengajuan_peserta ON konfirmasi_pembayaran.id_pengajuan_peserta = pengajuan_peserta.id 
INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id ORDER BY konfirmasi_pembayaran.id DESC");

$stmt->bind_result($id,$no_rekening,$atas_nama,$bank,$tanggal_bayar,$tanggal_konfirmasi,$status,$catatan,$no_pengajuan,$nama_instansi);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id"=>$id,"no_rekening"=>$no_rekening,"atas_nama"=>$atas_nama,"bank"=>$bank,"tanggal_bayar"=>$tanggal_bayar,"tanggal_konfirmasi"=>$tanggal_konfirmasi,"status"=>$status,"catatan"=>$catatan,"no_pengajuan"=>$no_pengajuan,"nama_instansi"=>$nama_instansi);
    }
    echo json_encode($output);
}
$stmt->close();
?>