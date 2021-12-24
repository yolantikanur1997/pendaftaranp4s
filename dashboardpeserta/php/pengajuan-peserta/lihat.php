<?php
session_start();
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT pengajuan_peserta.id,pengajuan_peserta.no_pengajuan,pengajuan_peserta.tanggal_pengajuan,pengajuan_peserta.tanggal_mulai,pengajuan_peserta.sampai_tanggal,pengajuan_peserta.keterangan,pengajuan_peserta.status,pengajuan_peserta.catatan,list_harga.no_paket,list_harga.nama_paket,list_harga.deskripsi,list_harga.harga,registrasi_akun_instansi.nama_instansi
FROM pengajuan_peserta 
INNER JOIN list_harga ON pengajuan_peserta.id_list_harga = list_harga.id 
INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id WHERE registrasi_akun_instansi.id=". $_SESSION['id']);

$stmt->bind_result($id,$no_pengajuan,$tanggal_pengajuan,$tanggal_mulai,$sampai_tanggal,$keterangan,$status,$catatan,$no_paket,$nama_paket,$deskripsi,$harga,$nama_instansi);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id"=>$id,"no_pengajuan"=>$no_pengajuan,"tanggal_pengajuan"=>$tanggal_pengajuan,"tanggal_mulai"=>$tanggal_mulai,"sampai_tanggal"=>$sampai_tanggal,"keterangan"=>$keterangan,"status"=>$status,"catatan"=>$catatan,"no_paket"=>$no_paket,"nama_paket"=>$nama_paket,"deskripsi"=>$deskripsi,"harga"=>$harga,"nama_instansi"=>$nama_instansi);
    }
    echo json_encode($output);
}
$stmt->close();
?>