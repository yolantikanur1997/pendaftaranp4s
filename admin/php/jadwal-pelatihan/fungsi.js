
    var Isnew = true;
    lihat();
    var id_jadwal  = null;


    function tambahDetail()
    {
        var jadwal = {
            mata_latihan : $("#mata_latihan").val(),
            jam_mulai : $("#jam_mulai").val(),
            jam_selesai : $("#jam_selesai").val(),
            jp : $("#jp").val(),
            fasilitator : $("#fasilitator").val(),
        };

        //simpan kedalam tabel row
        jadwalList(jadwal);
        $("#frmJadwal")[0].reset();


    }
    function jadwalList(jadwal,e){
        if ($('#id_pengajuan_peserta').val().length == 0) {
            $.alert({

                title: 'Gagal',
                content : "Masukan Pengajuan Peserta",
                type : 'red',
                theme: 'dark',
                autoClose : 'ok|2000'
            });

        }else if ($('#hari').val().length == 0) {
            $.alert({

                title: 'Gagal',
                content: "Masukkan Hari",
                type: 'red',
                theme: 'dark',
                autoClose: 'ok|2000'
            });
         }else if ($('#tanggal').val().length == 0) {
            $.alert({

                title: 'Gagal',
                content: "Masukkan Tanggal",
                type: 'red',
                theme: 'dark',
                autoClose: 'ok|2000'
            });
        
        }else{

            var $tableB = $("#jadwalList tbody");
            var $row = $(
                "<tr>" +
                "<td> <button type='button' name='record' class='btn btn-default btn-xs' onclick='deleterow(this)'><i class='fa fa-times'></i> </button></<td>" +
                "<td>" + jadwal.mata_latihan + "</td>" +
                "<td>" + jadwal.jam_mulai + "</td>" +
                "<td>" + jadwal.jam_selesai + "</td>" +
                "<td>" + jadwal.jp + "</td>" +
                "<td>" + jadwal.fasilitator + "</td>" +
                "</tr>"
            );


            $row.data("mata_latihan",jadwal.mata_latihan);
            $row.data("jam_mulai",jadwal.jam_mulai);
            $row.data("jam_selesai",jadwal.jam_selesai);
            $row.data("jp",jadwal.jp);
            $row.data("fasilitator",jadwal.fasilitator);

            $tableB.append($row);


        }

    }
    function deleterow(e){

        $(e).parent().parent().remove();

    }

    function tambah(e)
    {

        var table_data = [];

        $('#jadwalList tbody tr').each(function(row,tr)
        {

            var sub = {
                'mata_latihan' : $(tr).find('td:eq(1)').text(),
                'jam_mulai' : $(tr).find('td:eq(2)').text(),
                'jam_selesai' : $(tr).find('td:eq(3)').text(),
                 'jp' : $(tr).find('td:eq(4)').text(),
                'fasilitator' : $(tr).find('td:eq(5)').text(),

            };
            table_data.push(sub);
        });

        $.ajax({
            type : "POST",
            url : "php/jadwal-pelatihan/create.php",
            dataType : "JSON",
            data : {id_pengajuan_peserta: $('#id_pengajuan_peserta').val(),hari: $('#hari').val(),
            tanggal: $('#tanggal').val(), data: table_data},

                success:function(data){

                    $.alert({

                        title: 'Success',
                        content : "Jadwal Pelatihan Sukses Tersimpan",
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
        $('#tblJadwal').dataTable().fnDestroy();
        $.ajax({
            url : "php/jadwal-pelatihan/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblJadwal").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"No",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Nomor Pengajuan","mData": "no_pengajuan"},
                        {"sTitle": "Hari","mData": "hari"},
                        {"sTitle": "Tanggal","mData": "tanggal"},
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
            url : 'php/jadwal-pelatihan/get.php',
            dataType : 'JSON',
            data : {id_jadwal:id},
            // data: $("#modal-jadwal-detail").modal('show') + "& id_jadwal="+id_jadwal,

            success:function(data){
                // $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_jadwal = data.id_jadwal
                $('#hari2').val(data.hari).trigger('change');
                $('#tanggal2').val(data.tanggal);
 
                $('#modal-jadwal-pelatihan').modal('show');
                
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
            url : 'php/jadwal-pelatihan/get.php',
            dataType : 'JSON',
            data : {id_jadwal:id},
            // data: $("#modal-jadwal-detail").modal('show') + "& id_jadwal="+id_jadwal,

            success:function(data){
                // $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_jadwal = data.id_jadwal
                window.location= "form/jadwal-pelatihan-detail.php?id_jadwal=" + id_jadwal;
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

    }
    function update(){

        _url = 'php/jadwal-pelatihan/update.php';
        _data = $("#frmJadwalUpdate").serialize() + "& id_jadwal="+id_jadwal;
        _method = 'POST';

             $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmJadwalUpdate")[0].reset();

                   $.alert('Data Jadwal Pelatihan di Edit');
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
                        url : 'php/jadwal-pelatihan/delete.php',
                        dataType : 'JSON',
                        data : {id_jadwal:id},

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