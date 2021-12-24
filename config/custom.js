$(document).ready(function () {
    relasiListHarga();
    relasiInstansi();
    relasiPengajuan();
    // rupiah();
    // ambilKode();
    // relasiKonsumen();
    // relasiUangMuka();
    // ambilKodeUangMuka();
    // relasiBuktiTransfer();
    // relasiAkun();


});

function relasiListHarga()
    {
        $.ajax({
            type : 'GET',
            url : 'php/list-harga/lihat.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#id_list_harga').append($("<option>" , {
                        value: data[i].id,
                        text:[data[i].no_paket,data[i].nama_paket],
                    }));
                }

            }
        });


    }

    function relasiInstansi()
    {
        $.ajax({
            type : 'GET',
            url : 'php/instansi/lihat.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#id_registrasi_akun_instansi').append($("<option>" , {
                        value: data[i].id,
                        text:data[i].nama_instansi
                    }));
                }

            }
        });


    }
        function relasiPengajuan()
    {
        $.ajax({
            type : 'GET',
            url : 'php/pengajuan-peserta/lihat.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#id_pengajuan_peserta').append($("<option>" , {
                        value: data[i].id,
                        text: [data[i].no_pengajuan,data[i].tanggal_pengajuan]
                    }));
                }

            }
        });


    }

 function ambilKode()
  {
    $("#id_rumah").change(function(t){

      $.ajax({
        type : "POST",
        url : 'php/pemesanan_rumah/ambil.php',
        dataType : "JSON",
        data : {id_rumah:$("#id_rumah").val()},

        success:function(data)
        {
          console.log(data);
          $("#jml_uang_pemesanan_rumah").val(data[0].biaya_pemesanan_rumah);

        },
        error:function()
        {

        }
      });

    });
  }

// function rupiah(){
        
//         var rupiahhh = document.getElementById('harga');
//         rupiahhh.addEventListener('keyup', function(e){
//             // tambahkan 'Rp.' pada saat form di ketik
//             // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
//             rupiahhh.value = formatRupiah(this.value);
//         });
 
//         /* Fungsi formatRupiah */
//         function formatRupiah(angka, prefix){
//             var number_string = angka.replace(/[^,\d]/g, '').toString(),
//             split           = number_string.split(','),
//             sisa            = split[0].length % 3,
//             rupiahhh            = split[0].substr(0, sisa),
//             ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
//             // tambahkan titik jika yang di input sudah menjadi angka ribuan
//             if(ribuan){
//                 separator = sisa ? '.' : '';
//                 rupiahhh += separator + ribuan.join('.');
//             }
 
//             rupiahhh = split[1] != undefined ? rupiahhh + ',' + split[1] : rupiahhh;
//             return prefix == undefined ? rupiahhh : (rupiahhh ? + rupiahhh : '');
//         }
   
// }