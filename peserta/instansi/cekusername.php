<?php
include("../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

   $username = $_POST["username"];

    $result = mysqli_query($koneksi, "SELECT username FROM registrasi_akun_instansi WHERE username = '$username'");

            if(mysqli_num_rows($result) > 0){
                echo "<span class='text-danger'>Username Sudah Tersedia</span>";
            }else{
                echo "<span class='text-success'>Username Berhasil di Konfirmasi</span>";
            }

}
?>