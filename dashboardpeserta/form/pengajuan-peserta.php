<?php
include '../config/autonumber.php';
?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="formpengajuan-tab" data-toggle="tab" href="#formpengajuan" role="tab" aria-controls="formpengajuan" aria-selected="true">Form Pengajuan Peserta</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="datapengajuan-tab" data-toggle="tab" href="#datapengajuan" role="tab" aria-controls="datapengajuan" aria-selected="false">Data Pengajuan Peserta</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="formpengajuan" role="tabpanel" aria-labelledby="formpengajuan-tab">
<div class="card mt-2">
  <div class="card-header">
    <div class="" style="float: left;">
       Form Pengajuan Peserta</div>
    <div class="" style="float: right;">
    <a href="index.php?page=Pengajuan-Peserta"><button class="btn btn-info" title="Refresh"><i class="fas fa-sync"></i></button></a>
  </div>
  </div>
  <div class="card-body">
   <div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4">
     <div class="form-group">
        <label>Nomor Pengajuan </label>
         <input type="text" name="no_pengajuan" id="no_pengajuan" class="form-control" value="<?=autonumber("pengajuan_peserta", "no_pengajuan", "7", "PNJ")?>" readonly>
         <div id="output"></div>
       </div>
  </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
     <div class="form-group">
        <label>Tanggal Mulai</label>
         <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required="required">
       </div>
  </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
     <div class="form-group">
        <label>Sampai Tanggal</label>
         <input type="date" name="sampai_tanggal" id="sampai_tanggal" class="form-control" required="required">
       </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6">
     <div class="form-group">
        <label>Paket</label>
         <select name="id_list_harga" id="id_list_harga" class=" theSelect form-control">
           <option value="#">Pilih</option>
           </select>
       </div>
  </div>

   <div class="col-lg-6 col-md-6 col-sm-6">
     <div class="form-group">
        <label>Keterangan</label>
         <textarea name="keterangan" id="keterangan" class="form-control" required="required" style="resize: none;"></textarea>
       </div>
  </div>
</div>
<!-- table detail input -->
 <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
        <form id="frmPengajuan">
    <table class="table table-responsive-sm">
             <thead>
            <tr>
             <th>Nama Perwakilan</th>
             <th>Tambah</th>
           </tr>
             </thead>
             <tbody>
              <td><input type="text" name="nama_perwakilan" id="nama_perwakilan" class="form-control"></td>
              <td>  <button type="button" class="btn btn-primary" onclick="tambahDetail()" title="Tambah"><i class="fa fa-plus"></i></button></td>
            </tbody>
           </table>


          </form>
        </div>
      </div>

<!-- table detail list -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                           <table class="table table-bordered table-responsive-sm" id="pengajuanList" >
                        <thead>
                        <tr>
                            <th>Hapus</th>
                            <th>Nama Perwakilan</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                  </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <button type="button" class="btn btn-primary" id="save" onclick="tambah();">Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button>
           
              </div>
            </div>



 </div>
   </div>

  </div>


  <!-- data pengajuan peserta -->

  <div class="fade" id="datapengajuan" role="tabpanel" aria-labelledby="datapengajuan-tab">
    <div class="card mt-2">
  <div class="card-header">
     <div class="" style="float: left;">
       Data Pengajuan Peserta</div>
    <div class="" style="float: right;">
    <a href="index.php?page=Pengajuan-Peserta"><button class="btn btn-info" title="Refresh"><i class="fas fa-sync"></i></button></a>
  </div>
  </div>
    <div class="card-body">

    <table id="tblPengajuan" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
       <thead>
          <tr>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>

            </tr>
              </thead>
           <tbody>

           </tbody>

       </table>
   </div>
     </div>
</div>
</div>

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../dist/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/datatables.min.js"></script>
<script src="../config/custom.js"></script>
<script src="php/pengajuan-peserta/fungsi.js"></script>

<!-- //cek id -->

<script type="text/javascript">
    $(document).ready(function(){
        var app = {
            check: function(){
                var no_pengajuan = $("#no_pengajuan").val();
                $.ajax({
                    url: "../../pengajuan-peserta/cekno_pengajuan.php",
                    method: "POST",
                    data: {no_pengajuan: no_pengajuan},
                    success: function(response){
                        $(".output").html(response).fadeIn("slow")
                        
                    }
                })
            }
        }

    $("#no_pengajuan").keyup(app.check)
    })
</script>