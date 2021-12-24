    var Isnew = true;
    lihat();

    var id_biodata = null;

    function tambah()
    {
        // alert("hi");
        if ($("#frmBiodata").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/biodata/create.php';
                _data = $("#frmBiodata").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/biodata/update.php';
                _data = $("#frmBiodata").serialize() + "& id_biodata="+id_biodata;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmBiodata")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Biodata Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Biodata di Edit";

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
        $('#tblBiodata').dataTable().fnDestroy();
        $.ajax({
            url : "php/biodata/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblBiodata").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"#",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Nomor Pengajuan","mData": "no_pengajuan"},
                        {"sTitle": "Nama Lengkap","mData": "nama_lengkap"},
                        {"sTitle": "Tanggal Pengajuan","mData": "tanggal_pengajuan"},
                        {
                            "sTitle":"Opsi",
                            "mData": "id",
                            "render": function(mData, type, row, meta){
                                return'<button class="btn btn-xs btn-default" title="Cetak" onclick="print('+ mData +')"><i class="fa fa-print"></i></button> <button class="btn btn-xs btn-default" title="Pilih" onclick="getDetail('+ mData +')"><i class="fa fa-eye"></i></button> <button class="btn btn-xs btn-default" title="Pilih" onclick="get('+ mData +')"><i class="fa fa-pen-alt"></i></button>  <button class="btn btn-xs btn-default" title="Hapus" onclick="hapus('+mData+')"><i class="fa fa-trash"></i></button>';
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
         function print(id)
    {
        $.ajax({
            type : 'POST',
            url : 'php/biodata/get.php',
            dataType : 'JSON',
            data : {id_biodata:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_biodata = data.id_biodata
                window.location= "form/biodata-cetak.php?id_biodata=" + id_biodata;
                
                $('#modal-biodata').modal('show');
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

    }
        function get(id)
    {
        $.ajax({
            type : 'POST',
            url : 'php/biodata/get.php',
            dataType : 'JSON',
            data : {id_biodata:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_biodata = data.id_biodata
                $('#id_pengajuan_peserta').val(data.id_pengajuan_peserta).trigger('change');   
                $('#nama_lengkap').val(data.nama_lengkap);   
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#alamat_lengkap').val(data.alamat_lengkap);
                $('#jenis_kelamin').val(data.jenis_kelamin).trigger('change');
                $('#agama').val(data.agama).trigger('change');
                $('#no_hp').val(data.no_hp);
                $('#no_wa').val(data.no_wa);
                $('#fb').val(data.fb);
                $('#email').val(data.email);
                $('#hobby').val(data.hobby);
                $('#cita_cita').val(data.cita_cita);
                $('#pelatihan').val(data.pelatihan);
                $('#harapan').val(data.harapan);
                // window.location= "beranda.php?id_biodata=" + id_biodata;
                
                $('#modal-biodata').modal('show');
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
            url : 'php/biodata/get.php',
            dataType : 'JSON',
            data : {id_biodata:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_biodata = data.id_biodata
                $('#nama_lengkap2').html(data.nama_lengkap);   
                $('#tempat_lahir2').html(data.tempat_lahir);
                $('#tanggal_lahir2').html(data.tanggal_lahir);
                $('#alamat_lengkap2').html(data.alamat_lengkap);
                $('#jenis_kelamin2').html(data.jenis_kelamin);
                $('#agama2').html(data.agama);
                $('#no_hp2').html(data.no_hp);
                $('#no_wa2').html(data.no_wa);
                $('#fb2').html(data.fb);
                $('#email2').html(data.email);
                $('#hobby2').html(data.hobby);
                $('#cita_cita2').html(data.cita_cita);
                $('#pelatihan2').html(data.pelatihan);
                $('#harapan2').html(data.harapan);
                $('#no_pengajuan2').html(data.no_pengajuan);
                $('#tanggal_pengajuan2').html(data.tanggal_pengajuan);
                // window.location= "beranda.php?id_biodata=" + id_biodata;
                
                $('#modal-biodata-detail').modal('show');
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
                        url : 'php/biodata/delete.php',
                        dataType : 'JSON',
                        data : {id_biodata:id},

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