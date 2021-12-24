    var Isnew = true;
    // lihat();

    var id_instansi = null;


    function tambah()
    {
        // alert("hi");
        if ($("#frmInstansi2").valid()) {
            var _url = '';
            var _data = '';
            var _method;

          
         
                _url = 'instansi/create.php';
                _data = $("#frmInstansi2").serialize();
                _method = 'POST';

          
       
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    // lihat();
                    $("#frmInstansi2")[0].reset();

                    var msg;

                 
                  
                        msg = "Data Instansi Tersimpan";


                  
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
