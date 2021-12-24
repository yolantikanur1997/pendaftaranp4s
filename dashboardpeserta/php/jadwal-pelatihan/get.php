<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT jadwal_pelatihan.id,jadwal_pelatihan.hari,jadwal_pelatihan.tanggal,jadwal_pelatihan_detail.mata_latihan,jadwal_pelatihan_detail.jp,jadwal_pelatihan_detail.fasilitator,pengajuan_peserta.no_pengajuan,jadwal_pelatihan_detail.jam_mulai,jadwal_pelatihan_detail.jam_selesai
FROM jadwal_pelatihan
INNER JOIN jadwal_pelatihan_detail ON jadwal_pelatihan_detail.id_jadwal_pelatihan = jadwal_pelatihan.id 
INNER JOIN pengajuan_peserta ON jadwal_pelatihan.id_pengajuan_peserta = pengajuan_peserta.id WHERE jadwal_pelatihan.id=?");

$id_jadwal = $_POST['id_jadwal'];
$stmt->bind_param("i", $id_jadwal);

$stmt->bind_result($id_jadwal,$hari,$tanggal,$mata_latihan,$jp,$fasilitator,$no_pengajuan,$jam_mulai,$jam_selesai);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output = array("id_jadwal"=>$id_jadwal,"hari"=>$hari,"tanggal"=>$tanggal,"mata_latihan"=>$mata_latihan,"jp"=>$jp,"fasilitator"=>$fasilitator,"no_pengajuan"=>$no_pengajuan,"jam_mulai"=>$jam_mulai,"jam_selesai"=>$jam_selesai);
    }
    echo json_encode($output);
}
$stmt->close();
?>