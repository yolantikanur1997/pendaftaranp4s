<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT id,nama,email,username FROM admin ORDER BY id DESC");

$stmt->bind_result($id,$nama,$email,$username);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id"=>$id,"nama"=>$nama,"email"=>$email,"username"=>$username);
    }
    echo json_encode($output);
}
$stmt->close();
?>