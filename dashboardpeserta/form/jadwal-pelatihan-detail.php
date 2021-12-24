<?php
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id_jadwal = $_GET['id_jadwal'];
    $sql = "SELECT jadwal_pelatihan.id,jadwal_pelatihan.hari,jadwal_pelatihan.tanggal,jadwal_pelatihan_detail.mata_latihan,jadwal_pelatihan_detail.jp,jadwal_pelatihan_detail.fasilitator,pengajuan_peserta.no_pengajuan,registrasi_akun_instansi.nama_instansi,jadwal_pelatihan_detail.jam_mulai,jadwal_pelatihan_detail.jam_selesai
    FROM jadwal_pelatihan
    INNER JOIN jadwal_pelatihan_detail ON jadwal_pelatihan_detail.id_jadwal_pelatihan = jadwal_pelatihan.id 
    INNER JOIN pengajuan_peserta ON jadwal_pelatihan.id_pengajuan_peserta = pengajuan_peserta.id    
    INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id WHERE jadwal_pelatihan.id = $id_jadwal";
    // $id_jadwal = $_GET['id_jadwal'];
//     $sql = "SELECT pengajuan_peserta.id,pengajuan_peserta.no_pengajuan,pengajuan_peserta.tanggal_pengajuan,pengajuan_peserta.tanggal_mulai,pengajuan_peserta.sampai_tanggal,pengajuan_peserta.keterangan,pengajuan_peserta.status,pengajuan_peserta.catatan,list_harga.no_paket,list_harga.nama_paket,list_harga.deskripsi,list_harga.harga,registrasi_akun_instansi.nama_instansi,pengajuan_peserta_detail.nama_perwakilan
// FROM pengajuan_peserta 
// INNER JOIN pengajuan_peserta_detail ON pengajuan_peserta.id = pengajuan_peserta_detail.id_jadwal_peserta
// INNER JOIN list_harga ON pengajuan_peserta.id_list_harga = list_harga.id
// INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id";

// include 'get.php';
    $orderResult = $koneksi->query($sql);
    $orderdata = $orderResult->fetch_array();


    $id_jadwal = $orderdata[0];
    $hari = $orderdata[1];
    $tanggal = $orderdata[2];
    $mata_latihan = $orderdata[3];
    $jp = $orderdata[4];
    $fasilitator = $orderdata[5];
    $no_pengajuan = $orderdata[6];
    $nama_instansi = $orderdata[7];
    $jam_mulai = $orderdata[8];
    $jam_selesai = $orderdata[9];

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
    Data Jadwal Pelatihan
  </div>
<div class="card">
  <div class="card-body">
    <table class="table">
      <tbody>
         <tr>
          <th>Nomor Pengajuan</th>
          <th>:</th>
          <td><?=$no_pengajuan?></td>
          <th>Instansi</th>
           <th>:</th>
          <td><?=$nama_instansi?></td>
        </tr>
        <tr>
           <th>Hari</th>
            <th>:</th>
          <td><?=$hari?></td>
          <th>Tanggal</th>
           <th>:</th>
          <td><?=$tanggal?></td>
        </tr>
    

    
       
       
      </tbody>
    
    </table>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th>Mata Latihan</th>
      <th>Jam</th>
      <th>JP</th>
      <th>Fasilitator</th>
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
                <td><?=$row[3]?></td>
                <td><?=$row[8]?> - <?=$row[9]?></td>
                <td><?=$row[4]?></td>
                <td><?=$row[5]?></td>

            </tr>
       <?php $no++; } ?>
  

  </tbody>
</table>
 <a href="../index.php?page=Jadwal-Pelatihan"><button type="button" class="btn btn-danger"><i class="fas fa-long-arrow-alt-left"></i> Kembali</button></a>

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