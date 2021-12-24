<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE jadwal_pelatihan, jadwal_pelatihan_detail
        FROM jadwal_pelatihan
        INNER JOIN jadwal_pelatihan_detail ON jadwal_pelatihan.id = jadwal_pelatihan_detail.id_jadwal_pelatihan 
        WHERE jadwal_pelatihan.id=?");
    $stmt->bind_param("i",$id);

    $id = $_POST["id_jadwal"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>