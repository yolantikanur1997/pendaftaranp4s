<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT konfirmasi_pembayaran.id,konfirmasi_pembayaran.no_rekening,konfirmasi_pembayaran.atas_nama,konfirmasi_pembayaran.bank,konfirmasi_pembayaran.tanggal_bayar,konfirmasi_pembayaran.tanggal_konfirmasi,konfirmasi_pembayaran.status,konfirmasi_pembayaran.catatan,pengajuan_peserta.no_pengajuan,list_harga.harga,konfirmasi_pembayaran.id_pengajuan_peserta 
        FROM konfirmasi_pembayaran 
        INNER JOIN pengajuan_peserta ON konfirmasi_pembayaran.id_pengajuan_peserta = pengajuan_peserta.id 
        INNER JOIN list_harga ON list_harga.id = pengajuan_peserta.id_list_harga
        INNER JOIN registrasi_akun_instansi ON pengajuan_peserta.id_registrasi_akun_instansi = registrasi_akun_instansi.id ORDER BY konfirmasi_pembayaran.id=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_konfirmasi = $_POST['id_konfirmasi'];
    $stmt->bind_param("i", $id_konfirmasi);


   $stmt->bind_result($id,$no_rekening,$atas_nama,$bank,$tanggal_bayar,$tanggal_konfirmasi,$status,$catatan,$no_pengajuan,$harga,$id_pengajuan_peserta);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_konfirmasi"=>$id_konfirmasi,"no_rekening"=>$no_rekening,"atas_nama"=>$atas_nama,"bank"=>$bank,"tanggal_bayar"=>$tanggal_bayar,"tanggal_konfirmasi"=>$tanggal_konfirmasi,"status"=>$status,"catatan"=>$catatan,"no_pengajuan"=>$no_pengajuan,"harga"=>$harga,"id_pengajuan_peserta"=>$id_pengajuan_peserta);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>