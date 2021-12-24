<?php
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id_pengajuan = $_GET['id_pengajuan'];
    $sql = "SELECT pengajuan_peserta.id,pengajuan_peserta.no_pengajuan,pengajuan_peserta.tanggal_pengajuan,pengajuan_peserta.tanggal_mulai,pengajuan_peserta.sampai_tanggal,pengajuan_peserta.keterangan,pengajuan_peserta.status,pengajuan_peserta.catatan,list_harga.no_paket,list_harga.nama_paket,list_harga.deskripsi,list_harga.harga,registrasi_akun_instansi.nama_instansi,pengajuan_peserta_detail.nama_perwakilan
FROM pengajuan_peserta 
INNER JOIN pengajuan_peserta_detail ON pengajuan_peserta.id = pengajuan_peserta_detail.id_pengajuan_peserta
INNER JOIN list_harga ON pengajuan_peserta.id_list_harga = list_harga.id
INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id WHERE pengajuan_peserta.id = $id_pengajuan";
    // $id_pengajuan = $_GET['id_pengajuan'];
//     $sql = "SELECT pengajuan_peserta.id,pengajuan_peserta.no_pengajuan,pengajuan_peserta.tanggal_pengajuan,pengajuan_peserta.tanggal_mulai,pengajuan_peserta.sampai_tanggal,pengajuan_peserta.keterangan,pengajuan_peserta.status,pengajuan_peserta.catatan,list_harga.no_paket,list_harga.nama_paket,list_harga.deskripsi,list_harga.harga,registrasi_akun_instansi.nama_instansi,pengajuan_peserta_detail.nama_perwakilan
// FROM pengajuan_peserta 
// INNER JOIN pengajuan_peserta_detail ON pengajuan_peserta.id = pengajuan_peserta_detail.id_pengajuan_peserta
// INNER JOIN list_harga ON pengajuan_peserta.id_list_harga = list_harga.id
// INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id";

// include 'get.php';
    $orderResult = $koneksi->query($sql);
    $orderdata = $orderResult->fetch_array();


    $id_pengajuan = $orderdata[0];
    $no_pengajuan = $orderdata[1];
    $tanggal_pengajuan = $orderdata[2];
    $tanggal_mulai = $orderdata[3];
    $sampai_tanggal = $orderdata[4];
    $keterangan = $orderdata[5];
    $status = $orderdata[6];
    $catatan = $orderdata[7];
    $no_paket = $orderdata[8];
    $nama_paket = $orderdata[9];
    $deskripsi = $orderdata[10];
    $harga = $orderdata[11];
    $nama_instansi = $orderdata[12];
    $nama_perwakilan = $orderdata[13];



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



<!-- pengajuan peserta detail modal -->
<div class="container">
  <div class="card-header mt-5">
    Data Pengajuan Peserta Pelatihan
  </div>
<div class="card">
  <div class="card-body">
    <table class="table">
      <tbody>
         <tr>
          <th>Nomor Pengajuan</th>
          <th>:</th>
          <td><?=$no_pengajuan?></td>
          <th>Tanggal Pengajuan</th>
           <th>:</th>
          <td><?=$tanggal_pengajuan?></td>
        </tr>
        <tr>
           <th>Tanggal Mulai</th>
            <th>:</th>
          <td><?=$tanggal_mulai?></td>
          <th>Sampai Tanggal</th>
           <th>:</th>
          <td><?=$sampai_tanggal?></td>
        </tr>
         <tr>
          <th>Status</th>
           <th>:</th>
          <td><?=$status?></td>
          <th>Nomor Paket</th>
           <th>:</th>
          <td><?=$no_paket?></td>
           
          </tr>
          <th>Catatan</th>
            <th>:</th>
          <td><?=$catatan?></td>
          <th>Keterangan</th>
           <th>:</th>
          <td colspan="4"><?=$keterangan?></td>
        </tr>
        <tr>
    

    
       
       
      </tbody>
    
    </table>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="5">Nama Perwakilan</th>
    </tr>
  </thead>
  <tbody>
         <?php
                        $no = 1;
                        $orderResult = $koneksi->query($sql);
                        while ($row = $orderResult->fetch_array()) {
                            
                    
                        ?>
            <tr>
                <td><?=$no?></td>
                <td colspan="5"><?=$row[13]?></td>

            </tr>
       <?php $no++; } ?>
  

  </tbody>
</table>
 <a href="../index.php?page=Pengajuan-Peserta"><button type="button" class="btn btn-danger"><i class="fas fa-long-arrow-alt-left"></i> Kembali</button></a>

  </div>
</div>
               
    </div>       
       


    <!-- cetak -->
<!-- 
    <script type="text/javascript">
    myFunction();

    function myFunction(){
        window.print();
    }
    window.onafterprint = function(e){
        closePrintView();
    }
    function closePrintView(){
        window.location.href = '../index2.php';
    }
    </script> -->
</body>


<script src="../../vendors/jquery/dist/jquery.min.js"></script>
</html>