<?php
include("../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

   $no_pengajuan = $_POST["no_pengajuan"];

    $result = mysqli_query($koneksi, "SELECT no_pengajuan FROM pengajuan_peserta WHERE no_pengajuan = '$no_pengajuan'");

            if(mysqli_num_rows($result) > 0){
                echo "<span class='text-danger'>Nomor Pengajuan Sudah Tersedia Silahkan Refresh Halaman</span>";
            }else{
                echo "<span class='text-success'>Nomor Pengajuan Tersedia</span>";
            }

}
?>