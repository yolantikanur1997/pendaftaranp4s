 
<?php
include '../config/koneksi.php';

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

    <?php }?>