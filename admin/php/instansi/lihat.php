<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT id,nama_instansi,kategori,telepon,alamat,tanggal_registrasi,username,password FROM registrasi_akun_instansi ORDER BY id DESC");

$stmt->bind_result($id,$nama_instansi,$kategori,$telepon,$alamat,$tanggal_registrasi,$username,$password);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id"=>$id,"nama_instansi"=>$nama_instansi,"kategori"=>$kategori,"telepon"=>$telepon,"alamat"=>$alamat,"tanggal_registrasi"=>$tanggal_registrasi,"username"=>$username,"password"=>$password);
    }
    echo json_encode($output);
}
$stmt->close();
?>