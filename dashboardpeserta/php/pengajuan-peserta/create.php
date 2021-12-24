<?php
session_start();
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $stmt = $koneksi->prepare("INSERT INTO pengajuan_peserta(id_list_harga,id_registrasi_akun_instansi,no_pengajuan,tanggal_pengajuan,tanggal_mulai,sampai_tanggal,keterangan,status) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("iissssss",$id_list_harga,$id_registrasi_akun_instansi,$no_pengajuan,$tanggal_pengajuan,$tanggal_mulai,$sampai_tanggal,$keterangan,$status);

    $id_list_harga = $_POST['id_list_harga'];
    $id_registrasi_akun_instansi = $_SESSION['id'];
    $no_pengajuan = $_POST['no_pengajuan'];
    $tanggal_pengajuan = date('Y-m-d');
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $sampai_tanggal = $_POST['sampai_tanggal'];
    $keterangan = $_POST['keterangan'];
    $status = 'Diajukan';

}


if ($stmt->execute()) {

    $last_id = $koneksi->insert_id;
}

$relation_list = $_POST['data'];

for ($x=0; $x < count($relation_list); $x++) {

    $stmt1 = $koneksi->prepare("INSERT INTO pengajuan_peserta_detail(id_pengajuan_peserta,nama_perwakilan)
                                VALUES(?,?)");
    $stmt1->bind_param("is",$last_id,$nama_perwakilan);
    $nama_perwakilan = $relation_list[$x]['nama_perwakilan'];

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