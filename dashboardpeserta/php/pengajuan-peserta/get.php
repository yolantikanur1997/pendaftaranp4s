<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT pengajuan_peserta.id,pengajuan_peserta.no_pengajuan,pengajuan_peserta.tanggal_pengajuan,pengajuan_peserta.tanggal_mulai,pengajuan_peserta.sampai_tanggal,pengajuan_peserta.keterangan,pengajuan_peserta.status,pengajuan_peserta.catatan,list_harga.no_paket,list_harga.nama_paket,list_harga.deskripsi,list_harga.harga,registrasi_akun_instansi.nama_instansi,pengajuan_peserta_detail.nama_perwakilan
FROM pengajuan_peserta 
INNER JOIN pengajuan_peserta_detail ON pengajuan_peserta.id = pengajuan_peserta_detail.id_pengajuan_peserta
INNER JOIN list_harga ON pengajuan_peserta.id_list_harga = list_harga.id
INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id WHERE pengajuan_peserta.id=?");

$id_pengajuan = $_POST['id_pengajuan'];
$stmt->bind_param("i", $id_pengajuan);

$stmt->bind_result($id_pengajuan,$no_pengajuan,$tanggal_pengajuan,$tanggal_mulai,$sampai_tanggal,$keterangan,$status,$catatan,$no_paket,$nama_paket,$deskripsi,$harga,$nama_instansi,$nama_perwakilan);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output = array("id_pengajuan"=>$id_pengajuan,"no_pengajuan"=>$no_pengajuan,"tanggal_pengajuan"=>$tanggal_pengajuan,"tanggal_mulai"=>$tanggal_mulai,"sampai_tanggal"=>$sampai_tanggal,"keterangan"=>$keterangan,"status"=>$status,"catatan"=>$catatan,"no_paket"=>$no_paket,"nama_paket"=>$nama_paket,"deskripsi"=>$deskripsi,"harga"=>$harga,"nama_instansi"=>$nama_instansi,"nama_perwakilan"=>$nama_perwakilan);
    }
    echo json_encode($output);
}
$stmt->close();
?>