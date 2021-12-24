
    var Isnew = true;
    lihat();
    var id_pengajuan  = null;


    function tambahDetail()
    {
        var pengajuan = {
            nama_perwakilan : $("#nama_perwakilan").val(),
        };

        //simpan kedalam tabel row
        pengajuanList(pengajuan);
        $("#frmPengajuan")[0].reset();


    }
    function pengajuanList(pengajuan,e){
        if ($('#tanggal_mulai').val().length == 0) {
            $.alert({

                title: 'Gagal',
                content : "Masukkan Tanggal Mulai",
                type : 'red',
                theme: 'dark',
                autoClose : 'ok|2000'
            });

        }else if ($('#sampai_tanggal').val().length == 0) {
            $.alert({

                title: 'Gagal',
                content: "Masukkan Sampa Tanggal",
                type: 'red',
                theme: 'dark',
                autoClose: 'ok|2000'
            });
         }else if ($('#id_list_harga').val().length == 0) {
            $.alert({

                title: 'Gagal',
                content: "Masukkan Paket",
                type: 'red',
                theme: 'dark',
                autoClose: 'ok|2000'
            });
        }else if ($('#id_registrasi_akun_instansi').val().length == 0) {
            $.alert({

                title: 'Gagal',
                content: "Masukkan Instansi",
                type: 'red',
                theme: 'dark',
                autoClose: 'ok|2000'
            });
               }else if ($('#status').val().length == 0) {
            $.alert({

                title: 'Gagal',
                content: "Masukkan Status",
                type: 'red',
                theme: 'dark',
                autoClose: 'ok|2000'
            });
          }else if ($('#keterangan').val().length == 0) {
            $.alert({

                title: 'Gagal',
                content: "Masukkan Keterangan",
                type: 'red',
                theme: 'dark',
                autoClose: 'ok|2000'
            });
              }else if ($('#catatan').val().length == 0) {
            $.alert({

                title: 'Gagal',
                content: "Masukkan Catatan",
                type: 'red',
                theme: 'dark',
                autoClose: 'ok|2000'
            });

        }else{


            var $tableB = $("#pengajuanList tbody");
            var $row = $(
                "<tr>" +
                "<td> <button type='button' name='record' class='btn btn-default btn-xs' onclick='deleterow(this)'><i class='fa fa-times'></i> </button></<td>" +
                "<td>" + pengajuan.nama_perwakilan + "</td>" +
                "</tr>"
            );


            $row.data("nama_perwakilan",pengajuan.nama_perwakilan);

            $tableB.append($row);


        }

    }
    function deleterow(e){
        // total_harga_pembelian = parseInt($(e).parent().parent().find('td:last').text(),10);

        // total -= total_harga_pembelian;

        // $('#total_harga_pembelian').val(total);

        $(e).parent().parent().remove();

    }

    function tambah(e)
    {

        var table_data = [];

        $('#pengajuanList tbody tr').each(function(row,tr)
        {

            var sub = {
                'nama_perwakilan' : $(tr).find('td:eq(1)').text(),

            };
            table_data.push(sub);
        });

        $.ajax({
            type : "POST",
            url : "php/pengajuan-peserta/create.php",
            dataType : "JSON",
            data : {no_pengajuan: $('#no_pengajuan').val(),tanggal_mulai: $('#tanggal_mulai').val(),
            sampai_tanggal: $('#sampai_tanggal').val(),id_list_harga: $('#id_list_harga').val(),
            id_registrasi_akun_instansi: $('#id_registrasi_akun_instansi').val(),
            status: $('#status').val(),
            keterangan: $('#keterangan').val(),
            catatan: $('#catatan').val(),
            data: table_data},

                success:function(data){

                    $.alert({

                        title: 'Success',
                        content : "Pengajuan Peserta Sukses Tersimpan",
                        type : 'GREEN',
                        theme : 'light',
                        autoClose : 'ok|2000'
                    });


                    last_id = data.last_id

                    // window.location= "form/LaporanMemo.php?last_id=" + last_id;

                },

                error: function(xhr,status,error){
                    alert(xhr);
                    console.log(xhr.responseText);
                }
            });



    }
    function lihat()
    {
        $('#tblPengajuan').dataTable().fnDestroy();
        $.ajax({
            url : "php/pengajuan-peserta/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblPengajuan").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"No",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Nomor Transaksi","mData": "no_pengajuan"},
                        {"sTitle": "Instansi","mData": "nama_instansi"},
                        {"sTitle": "Tanggal Pengajuan","mData": "tanggal_pengajuan"},
                        {
                            "sTitle":"Opsi",
                            "mData": "id",
                            "render": function(mData, type, row, meta){
                                return'<button class="btn btn-xs btn-default" title="Pilih" onclick="ambil('+mData+')"><i class="fas fa-eye"></i></button> <button class="btn btn-xs btn-default" title="Pilih" onclick="get('+ mData +')"><i class="fa fa-pen-alt"></i></button> <button class="btn btn-xs btn-default" title="Hapus" onclick="hapus('+mData+')"><i class="fas fa-trash"></i></button>';
                            }
                      
                        }
                    ]
                });

            },
            error: function(xhr)
            {
                console.log('Request Status: ' + xhr.status);
                console.log('Status Text: ' + xhr.statusText);
                console.log(xhr. responsetext);
                var text = $($.parseHTML(xhr.responsetext)).filter('.trace-message').text();

            }


        });

    }
            function get(id)
    {
        $.ajax({
            type : 'POST',
            url : 'php/pengajuan-peserta/get.php',
            dataType : 'JSON',
            data : {id_pengajuan:id},
            // data: $("#modal-pengajuan-detail").modal('show') + "& id_pengajuan="+id_pengajuan,

            success:function(data){
                // $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_pengajuan = data.id_pengajuan
               $('#status2').val(data.status).trigger('change');
                $('#catatan2').val(data.catatan);
                // $('#nama_barang').val(data.nama_barang);
                // $('#jenis_barang').val(data.jenis_barang).trigger('change');
                // // $('#password').prop("disabled",true);
                // window.location= "view/pembelian_barang_detail.php?id_pembelian_barang=" + id_pembelian_barang;

                // window.location= "form/pengajuan-peserta-detail.php?id_pengajuan=" + id_pengajuan;
                $('#modal-pengajuan-peserta').modal('show');
                
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

    }

          function ambil(id)
    {
        $.ajax({
            type : 'POST',
            url : 'php/pengajuan-peserta/get.php',
            dataType : 'JSON',
            data : {id_pengajuan:id},
            // data: $("#modal-pengajuan-detail").modal('show') + "& id_pengajuan="+id_pengajuan,

            success:function(data){
                // $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_pengajuan = data.id_pengajuan
                // $('#tanggal_beli').html(data.tanggal_beli);
                // $('#nama_pemilik').val(data.nama_pemilik);
                // $('#nama_barang').val(data.nama_barang);
                // $('#jenis_barang').val(data.jenis_barang).trigger('change');
                // // $('#password').prop("disabled",true);
                // window.location= "view/pembelian_barang_detail.php?id_pembelian_barang=" + id_pembelian_barang;

                window.location= "form/pengajuan-peserta-detail.php?id_pengajuan=" + id_pengajuan;
                // $('#modal-pengajuan-detail').modal('show');
                // $("#modal-pengajuan-detail").modal('show') + "& id_pengajuan="+id_pengajuan;
                // $('#modal-pengajuan-detail').on('shown', function () {
                //       var id_pengajuan = $(this).attr('id_pengajuan');
                // })
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

    }
    function update(){

        _url = 'php/pengajuan-peserta/update.php';
        _data = $("#frmPengajuanUpdate").serialize() + "& id_pengajuan="+id_pengajuan;
        _method = 'POST';

             $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmPengajuanUpdate")[0].reset();

                   $.alert('Data Pengajuan Peserta di Edit');
                },
                error: function(xhr, status, error){
                    alert(xhr);
                    console.log(xhr.responseText);

                    $.alert({
                        title: 'Gagal',
                        content: 'Ada kesalahan! coba lagi',
                        type: 'red',
                        autoClose: 'ok|2000'
                    });
                    $('#save').prop('disabled',false);
                    $('#save').html('');
                    $('#save').append('Simpan');

                }
            });
    }

        function hapus(id)
    {
        $.confirm({

            theme: 'boostrap',
            content: 'Yakin ingin menghapus Data ini?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'php/pengajuan-peserta/delete.php',
                        dataType : 'JSON',
                        data : {id_pengajuan:id},

                        success:function(data){
                            lihat();
                            $.alert('Data Terhapus');
                        },
                        error:function(xhr, status, error){
                            alert(xhr.responseText);
                        }
                    });
                },
                Tidak: function () {
                   $.alert('Data Batal Terhapus!');
                },

            }
        });
    }