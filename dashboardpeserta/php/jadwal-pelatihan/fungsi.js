
    var Isnew = true;
    lihat();
    var id_jadwal  = null;


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
                                return'<button class="btn btn-xs btn-default" title="Pilih" onclick="ambil('+mData+')"><i class="fas fa-eye"></i></button> ';
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
