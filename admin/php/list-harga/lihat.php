<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT id,no_paket,nama_paket,deskripsi,harga FROM list_harga ORDER BY id DESC");

$stmt->bind_result($id,$no_paket,$nama_paket,$deskripsi,$harga);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id"=>$id,"no_paket"=>$no_paket,"nama_paket"=>$nama_paket,"deskripsi"=>$deskripsi,"harga"=>$harga);
    }
    echo json_encode($output);
}
$stmt->close();
?>