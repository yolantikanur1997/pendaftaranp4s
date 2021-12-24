    var Isnew = true;
    lihat();

    var id_instansi = null;

    function tambah()
    {
        // alert("hi");
        if ($("#frmInstansi").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/instansi/create.php';
                _data = $("#frmInstansi").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/instansi/update.php';
                _data = $("#frmInstansi").serialize() + "& id_instansi="+id_instansi;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmInstansi")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Instansi Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Instansi di Edit";

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
        $('#tblInstansi').dataTable().fnDestroy();
        $.ajax({
            url : "php/instansi/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblInstansi").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"#",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Nama Instansi","mData": "nama_instansi"},
                        {"sTitle": "Kategori","mData": "kategori"},
                        {"sTitle": "Telepon","mData": "telepon"},
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
            url : 'php/instansi/get.php',
            dataType : 'JSON',
            data : {id_instansi:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_instansi = data.id_instansi
                $('#nama_instansi').val(data.nama_instansi);   
                $('#kategori').val(data.kategori).trigger('change');
                $('#telepon').val(data.telepon);
                $('#alamat').val(data.alamat);
                $('#username').val(data.username);
                $("#password").prop('disabled', true);
                // window.location= "beranda.php?id_instansi=" + id_instansi;
                
                $('#modal-instansi').modal('show');
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
            url : 'php/instansi/get.php',
            dataType : 'JSON',
            data : {id_instansi:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_instansi = data.id_instansi
                $('#nama_instansi2').html(data.nama_instansi);   
                $('#kategori2').html(data.kategori);
                $('#telepon2').html(data.telepon);
                $('#alamat2').html(data.alamat);
                $('#tanggal_registrasi2').html(data.tanggal_registrasi);
                $('#username2').html(data.username);
                // window.location= "beranda.php?id_instansi=" + id_instansi;
                
                $('#modal-instansi-detail').modal('show');
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
                        url : 'php/instansi/delete.php',
                        dataType : 'JSON',
                        data : {id_instansi:id},

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