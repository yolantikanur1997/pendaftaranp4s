<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM konfirmasi_pembayaran WHERE id=?");
    $stmt->bind_param("i",$id);

    $id = $_POST["id_konfirmasi"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>