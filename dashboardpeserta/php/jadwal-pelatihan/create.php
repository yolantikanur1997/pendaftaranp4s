<?php
session_start();
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $stmt = $koneksi->prepare("INSERT INTO jadwal_pelatihan (id_pengajuan_peserta,hari,tanggal) VALUES (?,?,?)");
    $stmt->bind_param("iss",$id_pengajuan_peserta,$hari,$tanggal);

    $id_pengajuan_peserta = $_POST['id_pengajuan_peserta'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];


}


if ($stmt->execute()) {

    $last_id = $koneksi->insert_id;
}

$relation_list = $_POST['data'];

for ($x=0; $x < count($relation_list); $x++) {

    $stmt1 = $koneksi->prepare("INSERT INTO jadwal_pelatihan_detail (id_jadwal_pelatihan,mata_latihan,jam_mulai,jam_selesai,jp,fasilitator)
                                VALUES(?,?,?,?,?,?)");
    $stmt1->bind_param("isssss",$last_id,$mata_latihan,$jam_mulai,$jam_selesai,$jp,$fasilitator);
    $mata_latihan = $relation_list[$x]['mata_latihan'];
    $jam_mulai = $relation_list[$x]['jam_mulai'];
    $jam_selesai = $relation_list[$x]['jam_selesai'];
    $jp = $relation_list[$x]['jp'];
    $fasilitator = $relation_list[$x]['fasilitator'];

    if ($stmt1->execute()) {


    }
    else
    {

    }

    $stmt1->close();

}

echo json_encode(array("last_id"=>$last_id));
$stmt->close();

?>