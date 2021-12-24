<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>P4S Alam Cemerlang Sejahtera | Login Admin</title>

 
  <!-- Google Font: Source Sans Pro -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
   <link rel="stylesheet" href="../vendors/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../dist/css/style.css">
  <link href="../dist/css/jquery-confirm.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../dist/css/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="../vendors/select2/css/select2.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Register</b> Peserta Pelatihan P4S Alam Cemerlang Sejahtera</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form id="frmInstansi2">
            <div class="modal-body">
            <div class="form-group">
              <label>Nama Instansi</label>
              <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" required="required"> 
            </div>
            <div class="form-group">
              <label>Kategori</label><br>
              <select id="kategori" name="kategori"  class="theSelect form-control" required="required" style="width: 100%;">
                <option value="">Pilih</option>
                <option value="Instansi">Instansi</option>
                <option value="Sekolah">Sekolah</option>
                <option value="Universitas">Universitas</option>
                <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                <option value="Perusahaan Swasta">Perusahaan Swasta</option>
              </select>
         
          </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="text" class="form-control" id="telepon" name="telepon" required="required" number="number"> 
            </div>
             <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" required="required" style="resize: none;"></textarea>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="username" name="username" required="required"> 
              <div class="output"></div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" name="password" required="required"> 
            </div> 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" id="save" onclick="tambah()">Register</button>
              <a href="index.php"><button type="button" class="btn btn-info">Login</button></a>
            </div>

          <!-- /.modal-content -->
            </form>
       
       </div>

            
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../dist/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/datatables.min.js"></script>
 <script src="../dist/js/jquery-confirm.js"></script>
<script src="../dist/js/jquery.validate.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="instansi/fungsi.js"></script>
</body>
</html>


<!-- //cek username -->

<script type="text/javascript">
    $(document).ready(function(){
        var app = {
            check: function(){
                var username = $("#username").val();
                $.ajax({
                    url: "instansi/cekusername.php",
                    method: "POST",
                    data: {username: username},
                    success: function(response){
                        $(".output").html(response).fadeIn("slow")
                        
                    }
                })
            }
        }

    $("#username").keyup(app.check)
    })
</script>