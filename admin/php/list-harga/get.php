<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id,no_paket,nama_paket,deskripsi,harga FROM list_harga ORDER BY id=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_list_harga = $_POST['id_list_harga'];
    $stmt->bind_param("i", $id_list_harga);


   $stmt->bind_result($id,$no_paket,$nama_paket,$deskripsi,$harga);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_list_harga"=>$id_list_harga,"no_paket"=>$no_paket,"nama_paket"=>$nama_paket,"deskripsi"=>$deskripsi,"harga"=>$harga);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>