<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE admin SET nama=?,username=?,email=? WHERE id =?");

     $stmt->bind_param("sssi",$nama,$username,$email,$id);

    $nama = $_POST['nama'];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $id  = $_POST['id_admin'];

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