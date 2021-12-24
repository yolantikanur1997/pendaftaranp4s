    var Isnew = true;
    lihat();

    var id_list_harga = null;

   
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
                        {
                            "sTitle":"Harga","mData": "harga",  render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp ' )
                        },
         
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
       