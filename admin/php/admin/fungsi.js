    var Isnew = true;
    lihat();

    var id_admin = null;

    function tambah()
    {
        // alert("hi");
        if ($("#frmAdmin").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/admin/create.php';
                _data = $("#frmAdmin").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/admin/update.php';
                _data = $("#frmAdmin").serialize() + "& id_admin="+id_admin;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmAdmin")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Admin Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Admin di Edit";

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
        $('#tblAdmin').dataTable().fnDestroy();
        $.ajax({
            url : "php/admin/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblAdmin").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"#",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Nama","mData": "nama"},
                        {"sTitle": "Email","mData": "email"},
                        {"sTitle": "Username","mData": "username"},
                        {
                            "sTitle":"Opsi",
                            "mData": "id",
                            "render": function(mData, type, row, meta){
                                return'<button class="btn btn-xs btn-default" title="Pilih" onclick="get('+ mData +')"><i class="fa fa-pen-alt"></i></button>  <button class="btn btn-xs btn-default" title="Hapus" onclick="hapus('+mData+')"><i class="fa fa-trash"></i></button>';
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
            url : 'php/admin/get.php',
            dataType : 'JSON',
            data : {id_admin:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_admin = data.id_admin
                $('#nama').val(data.nama);   
                $('#username').val(data.username);
                $('#email').val(data.email);
                $("#password").prop('disabled', true);
                // window.location= "beranda.php?id_admin=" + id_admin;
                
                $('#modal-admin').modal('show');
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
                        url : 'php/admin/delete.php',
                        dataType : 'JSON',
                        data : {id_admin:id},

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