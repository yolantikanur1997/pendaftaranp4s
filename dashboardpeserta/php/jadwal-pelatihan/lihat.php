<?php
session_start();
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT jadwal_pelatihan.id,jadwal_pelatihan.hari,jadwal_pelatihan.tanggal,pengajuan_peserta.no_pengajuan
	FROM jadwal_pelatihan
	INNER JOIN pengajuan_peserta ON jadwal_pelatihan.id_pengajuan_peserta = pengajuan_peserta.id 
	INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id WHERE registrasi_akun_instansi.id=" . $_SESSION['id']);

$stmt->bind_result($id,$hari,$tanggal,$no_pengajuan);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id"=>$id,"hari"=>$hari,"tanggal"=>$tanggal,"no_pengajuan"=>$no_pengajuan);
    }
    echo json_encode($output);
}
$stmt->close();
?>