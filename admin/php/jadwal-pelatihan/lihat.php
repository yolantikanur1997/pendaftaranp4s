<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT jadwal_pelatihan.id,jadwal_pelatihan.hari,jadwal_pelatihan.tanggal,pengajuan_peserta.no_pengajuan
	FROM jadwal_pelatihan
	INNER JOIN pengajuan_peserta ON jadwal_pelatihan.id_pengajuan_peserta = pengajuan_peserta.id ORDER BY jadwal_pelatihan.tanggal DESC");

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