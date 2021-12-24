<?php
include '../../config/koneksi.php';
session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
header("location: ../../loginadmin/index.php"); // Kita Redirect ke halaman index.php karena belum login
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id_biodata = $_GET['id_biodata'];
    $sql = "SELECT biodata_peserta_pelatihan.id,biodata_peserta_pelatihan.nama_lengkap,biodata_peserta_pelatihan.tempat_lahir,biodata_peserta_pelatihan.tanggal_lahir,biodata_peserta_pelatihan.alamat_lengkap,biodata_peserta_pelatihan.jenis_kelamin,biodata_peserta_pelatihan.agama,biodata_peserta_pelatihan.no_hp,biodata_peserta_pelatihan.no_wa,biodata_peserta_pelatihan.fb,biodata_peserta_pelatihan.email,biodata_peserta_pelatihan.hobby,biodata_peserta_pelatihan.cita_cita,biodata_peserta_pelatihan.pelatihan,biodata_peserta_pelatihan.harapan,pengajuan_peserta.no_pengajuan,pengajuan_peserta.tanggal_pengajuan,pengajuan_peserta.tanggal_mulai,pengajuan_peserta.sampai_tanggal
FROM biodata_peserta_pelatihan 
INNER JOIN pengajuan_peserta ON biodata_peserta_pelatihan.id_pengajuan_peserta = pengajuan_peserta.id 
INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id WHERE biodata_peserta_pelatihan.id = $id_biodata";
    // $id_biodata = $_GET['id_biodata'];
//     $sql = "SELECT pengajuan_peserta.id,pengajuan_peserta.no_pengajuan,pengajuan_peserta.tanggal_pengajuan,pengajuan_peserta.tanggal_mulai,pengajuan_peserta.sampai_tanggal,pengajuan_peserta.keterangan,pengajuan_peserta.status,pengajuan_peserta.catatan,list_harga.no_paket,list_harga.nama_paket,list_harga.deskripsi,list_harga.harga,registrasi_akun_instansi.nama_instansi,pengajuan_peserta_detail.nama_perwakilan
// FROM pengajuan_peserta 
// INNER JOIN pengajuan_peserta_detail ON pengajuan_peserta.id = pengajuan_peserta_detail.id_biodata_peserta
// INNER JOIN list_harga ON pengajuan_peserta.id_list_harga = list_harga.id
// INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id";

// include 'get.php';
    $orderResult = $koneksi->query($sql);
    $orderdata = $orderResult->fetch_array();


    $id_biodata = $orderdata[0];
    $nama_lengkap = $orderdata[1];
    $tempat_lahir = $orderdata[2];
    $tanggal_lahir = $orderdata[3];
    $alamat_lengkap = $orderdata[4];
    $jenis_kelamin = $orderdata[5];
    $agama = $orderdata[6];
    $no_hp = $orderdata[7];
    $no_wa = $orderdata[8];
    $fb = $orderdata[9];
    $email = $orderdata[10];
    $hobby = $orderdata[11];
    $cita_cita = $orderdata[12];
    $pelatihan = $orderdata[13];
    $harapan = $orderdata[14];
    $no_pengajuan = $orderdata[15];
    $tanggal_pengajuan = $orderdata[16];
    $tanggal_mulai = $orderdata[17];
    $sampai_tanggal = $orderdata[18];



    ?>

    <?php } ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
   <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
   <link rel="stylesheet" href="../../vendors/fontawesome-free/css/all.min.css">
</head>
<body>

<!-- pengajuan biodata detail modal -->
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-4">
  <img src="../../dist/img/logo.png" style="width: 50%; display: block; margin: 0px auto 0px auto;">
</div>
   <div class="col-sm-7" style="padding: 3%; text-align: center;">
   <h1>Biodata Peserta</h1>
   <p style="font-weight: bold;">Pelatihan Pertanian Tanaman Pekarangan
Di P4S-Alam Cemerlang Sejahtera, Sui Kunyit<br>
<p style="font-weight: bold;">Tanggal Mulai : <?=$tanggal_mulai?> Sampai Tanggal : <?=$sampai_tanggal?></p>
</p>
 </div>
      <hr style="color: black; width: 100%">
  <div class="row mt-4">
    <div class="col-sm-12">
      <table class="" style="width: 1138px; font-size: 18px; margin: 0px 0% 0px 10%;" cellpadding="5">
            <?php
                        $no = 1;
                        $orderResult = $koneksi->query($sql);
                        while ($row = $orderResult->fetch_array()) {
                            
                    
                        ?>
                        <?php } ?>

  <tbody >
   <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">Nama Lengkap</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$nama_lengkap?></td>
    </tr>
      <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">Tempat / Tanggal Lahir</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$tempat_lahir?> / <?=$tanggal_lahir?></td>
    </tr>
      <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">Alamat Lengkap</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$alamat_lengkap?></td>
    </tr>
    <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">Jenis Kelamin</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$jenis_kelamin?></td>
    </tr>
     <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">Agama</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$agama?></td>
    </tr>
      <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">No.Hp / Wa /Fb</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$no_hp?> / <?=$no_wa?> / <?=$fb?></td>
    </tr>
     <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">Email</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$email?></td>
    </tr>
     <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">Hobby</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$hobby?></td>
    </tr> 
    <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">Cita - Cita</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$cita_cita?></td>
    </tr>
    <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">Pelatihan yang Pernah diikuti</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$pelatihan?></td>
    </tr>
      <tr>
       <td style="width: 40px "><?=$no++?>.</td>
          <td style="width: 250px">Harapan Setelah Mengikuti Pelatihan ini</td>
          <td style="width: 40px ">:</td>
          <td style="width: "><?=$harapan?></td>
    </tr>
  </tbody>
</table>

<div class="right mt-5" style="float: right; margin-right: 20%">
  
  <p>Sungai Kunyit,<br>Peserta Pelatihan
    <br>
    <br>
    <br>
    <br>
    <br>
   <?=$nama_lengkap?>



  </p>
</div>
 </div> <!-- col -->
               
    </div> 

  </div>
      
       


    <!-- cetak -->

    <script type="text/javascript">
    myFunction();

    function myFunction(){
        window.print();
    }
    window.onafterprint = function(e){
        closePrintView();
    }
    function closePrintView(){
        window.location.href = '../index.php?page=Biodata';
    }
    </script>
</body>


<script src="../../vendors/jquery/dist/jquery.min.js"></script>
</html>