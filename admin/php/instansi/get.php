<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id,nama_instansi,kategori,telepon,alamat,tanggal_registrasi,username,password FROM registrasi_akun_instansi ORDER BY id=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_instansi = $_POST['id_instansi'];
    $stmt->bind_param("i", $id_instansi);


   $stmt->bind_result($id,$nama_instansi,$kategori,$telepon,$alamat,$tanggal_registrasi,$username,$password);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_instansi"=>$id_instansi,"nama_instansi"=>$nama_instansi,"kategori"=>$kategori,"telepon"=>$telepon,"alamat"=>$alamat,"tanggal_registrasi"=>$tanggal_registrasi,"username"=>$username,"password"=>$password);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>