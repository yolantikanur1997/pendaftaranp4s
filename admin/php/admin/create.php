<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $nama = $_POST['nama'];
    $email = $_POST["email"];
    $username = strtolower(stripcslashes($_POST["username"]));
    $password = mysqli_escape_string ($koneksi, $_POST['password']);


    
    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $koneksi->prepare("INSERT INTO admin (nama,email,username,password) VALUES (?,?,?,?)");

    $stmt->bind_param("ssss",$nama,$email,$username,$password);
    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>