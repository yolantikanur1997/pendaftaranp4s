    var Isnew = true;
    lihat();

    var id_list_harga = null;

    function tambah()
    {
        // alert("hi");
        if ($("#frmHarga").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/list-harga/create.php';
                _data = $("#frmHarga").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/list-harga/update.php';
                _data = $("#frmHarga").serialize() + "& id_list_harga="+id_list_harga;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmHarga")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data List Harga Tersimpan";

                    }
                    else 
                    {
                        msg = "Data List Harga di Edit";

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
        $('#tblHarga').dataTable().fnDestroy();
        $.ajax({
            url : "php/list-harga/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblHarga").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"#",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Nomor Paket","mData": "no_paket"},
                        {"sTitle": "Nama Paket","mData": "nama_paket"},
                        {"sTitle": "Deskripsi","mData": "deskripsi"},
                        // {"sTitle": "Harga","mData": "harga"},

                         
                          {
                             "sTitle":"Harga","mData": "harga",  render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp ' )
                            
                          },

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
            url : 'php/list-harga/get.php',
            dataType : 'JSON',
            data : {id_list_harga:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_list_harga = data.id_list_harga
                $('#no_paket').val(data.no_paket);   
                $('#nama_paket').val(data.nama_paket);
                $('#alamat').val(data.alamat);
                $('#deskripsi').val(data.deskripsi);
                $('#harga').val(data.harga);
                // window.location= "beranda.php?id_list_harga=" + id_list_harga;
                
                $('#modal-list-harga').modal('show');
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
                        url : 'php/list-harga/delete.php',
                        dataType : 'JSON',
                        data : {id_list_harga:id},

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