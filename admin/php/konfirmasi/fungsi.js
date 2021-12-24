    var Isnew = true;
    lihat();

    var id_konfirmasi = null;

    function tambah()
    {
        // alert("hi");
        if ($("#frmKonfirmasi").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/konfirmasi/create.php';
                _data = $("#frmKonfirmasi").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/konfirmasi/update.php';
                _data = $("#frmKonfirmasi").serialize() + "& id_konfirmasi="+id_konfirmasi;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmKonfirmasi")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Konfirmasi Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Konfirmasi di Edit";

                    }
                    $.alert({
                        title: 'Sukses',
                        content: msg,
                        type: 'GREEN',
                        boxWidth: '400px',
                        theme: 'light',
                        useBootstrap: false,
                        autoClose: 'ok|2000'


                    });
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
    }
    function lihat()
    {
        $('#tblKonfirmasi').dataTable().fnDestroy();
        $.ajax({
            url : "php/konfirmasi/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblKonfirmasi").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"#",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Tanggal Konfirmasi","mData": "tanggal_konfirmasi"},
                        {"sTitle": "Nomor Pengajuan","mData": "no_pengajuan"},
                        {"sTitle": "Instansi","mData": "nama_instansi"},
                        {"sTitle": "Status","mData": "status"},
                        {
                            "sTitle":"Opsi",
                            "mData": "id",
                            "render": function(mData, type, row, meta){
                                return'<button class="btn btn-xs btn-default" title="Pilih" onclick="getDetail('+ mData +')"><i class="fa fa-eye"></i></button> <button class="btn btn-xs btn-default" title="Pilih" onclick="get('+ mData +')"><i class="fa fa-pen-alt"></i></button>  <button class="btn btn-xs btn-default" title="Hapus" onclick="hapus('+mData+')"><i class="fa fa-trash"></i></button>';
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
            url : 'php/konfirmasi/get.php',
            dataType : 'JSON',
            data : {id_konfirmasi:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_konfirmasi = data.id_konfirmasi
                $('#id_pengajuan_peserta').val(data.id_pengajuan_peserta).trigger('change');   
                $('#no_rekening').val(data.no_rekening);   
                $('#atas_nama').val(data.atas_nama);
                $('#bank').val(data.bank);
                $('#tanggal_bayar').val(data.tanggal_bayar);
                $('#status').val(data.status).trigger('change');
                $('#catatan').val(data.catatan);
                // window.location= "beranda.php?id_konfirmasi=" + id_konfirmasi;
                
                $('#modal-konfirmasi').modal('show');
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

    }
     function getDetail(id)
    {
        $.ajax({
            type : 'POST',
            url : 'php/konfirmasi/get.php',
            dataType : 'JSON',
            data : {id_konfirmasi:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_konfirmasi = data.id_konfirmasi
                $('#no_rekening2').html(data.no_rekening);   
                $('#atas_nama2').html(data.atas_nama);
                $('#bank2').html(data.bank);
                $('#tanggal_bayar2').html(data.tanggal_bayar);
                $('#tanggal_konfirmasi2').html(data.tanggal_konfirmasi);
                $('#status2').html(data.status);
                $('#catatan2').html(data.catatan);
                $('#no_pengajuan2').html(data.no_pengajuan);
                $('#harga').html(data.harga);
                $('#nama_instansi').html(data.nama_instansi);
                // window.location= "beranda.php?id_konfirmasi=" + id_konfirmasi;
                
                $('#modal-konfirmasi-detail').modal('show');
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
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
                        url : 'php/konfirmasi/delete.php',
                        dataType : 'JSON',
                        data : {id_konfirmasi:id},

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