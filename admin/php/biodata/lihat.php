<?php
// session_start();
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT biodata_peserta_pelatihan.id,biodata_peserta_pelatihan.nama_lengkap,biodata_peserta_pelatihan.tempat_lahir,biodata_peserta_pelatihan.tanggal_lahir,biodata_peserta_pelatihan.alamat_lengkap,biodata_peserta_pelatihan.jenis_kelamin,biodata_peserta_pelatihan.agama,biodata_peserta_pelatihan.no_hp,biodata_peserta_pelatihan.no_wa,biodata_peserta_pelatihan.fb,biodata_peserta_pelatihan.email,biodata_peserta_pelatihan.hobby,biodata_peserta_pelatihan.cita_cita,biodata_peserta_pelatihan.pelatihan,biodata_peserta_pelatihan.harapan,pengajuan_peserta.no_pengajuan,pengajuan_peserta.tanggal_pengajuan
FROM biodata_peserta_pelatihan 
INNER JOIN pengajuan_peserta ON biodata_peserta_pelatihan.id_pengajuan_peserta = pengajuan_peserta.id 
INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id ORDER BY biodata_peserta_pelatihan.id DESC");

$stmt->bind_result($id,$nama_lengkap,$tempat_lahir,$tanggal_lahir,$alamat_lengkap,$jenis_kelamin,$agama,$no_hp,$no_wa,$fb,$email,$hobby,$cita_cita,$pelatihan,$harapan,$no_pengajuan,$tanggal_pengajuan);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id"=>$id,"nama_lengkap"=>$nama_lengkap,"tempat_lahir"=>$tempat_lahir,"tanggal_lahir"=>$tanggal_lahir,"alamat_lengkap"=>$alamat_lengkap,"jenis_kelamin"=>$jenis_kelamin,"agama"=>$agama,"no_hp"=>$no_hp,"no_wa"=>$no_wa,"fb"=>$fb,"email"=>$email,"hobby"=>$hobby,"cita_cita"=>$cita_cita,"pelatihan"=>$pelatihan,"harapan"=>$harapan,"no_pengajuan"=>$no_pengajuan,"tanggal_pengajuan"=>$tanggal_pengajuan);
    }
    echo json_encode($output);
}
$stmt->close();
?>