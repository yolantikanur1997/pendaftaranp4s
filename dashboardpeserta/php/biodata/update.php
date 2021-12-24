<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");


    $id_pengajuan_peserta = $_POST['id_pengajuan_peserta'];
    $nama_lengkap = $_POST["nama_lengkap"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat_lengkap = $_POST["alamat_lengkap"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $agama = $_POST["agama"];
    $no_hp = $_POST["no_hp"];
    $no_wa = $_POST["no_wa"];
    $fb = $_POST["fb"];
    $email = $_POST["email"];
    $hobby = $_POST["hobby"];
    $cita_cita = $_POST["cita_cita"];
    $pelatihan = $_POST["pelatihan"];
    $harapan = $_POST["harapan"];

    $id = $_POST["id_biodata"];

    $stmt = $koneksi->prepare("UPDATE biodata_peserta_pelatihan SET id_pengajuan_peserta=?,nama_lengkap=?,tempat_lahir=?,tanggal_lahir=?,alamat_lengkap=?,jenis_kelamin=?,agama=?,no_hp=?,no_wa=?,fb=?,email=?,hobby=?,cita_cita=?,pelatihan=?,harapan=? WHERE id =?");

    $stmt->bind_param("issssssiissssssi",$id_pengajuan_peserta,$nama_lengkap,$tempat_lahir,$tanggal_lahir,$alamat_lengkap,$jenis_kelamin,$agama,$no_hp,$no_wa,$fb,$email,$hobby,$cita_cita,$pelatihan,$harapan,$id);


    if ($stmt->execute()) {
        echo 1;
    }
    else
    {
        echo 0;
    }
    $stmt->close();
}
?> 