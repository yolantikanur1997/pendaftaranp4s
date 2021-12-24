<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id,nama,username,email FROM admin WHERE id=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_admin = $_POST['id_admin'];
    $stmt->bind_param("i", $id_admin);


   $stmt->bind_result($id,$nama,$username,$email);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_admin"=>$id_admin,"nama"=>$nama,"username"=>$username,"email"=>$email);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>