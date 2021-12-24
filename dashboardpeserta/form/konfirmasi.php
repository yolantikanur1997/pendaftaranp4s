<div class="card">
  <div class="card-header">
    <div class="" style="float: left;">
       Data Konfirmasi</div>
    <div class="" style="float: right;">
 <button class="btn btn-primary" title="Refresh" data-toggle="modal" data-target="#modal-konfirmasi"><i class="fas fa-plus"></i></button>
    <a href="index.php?page=Konfirmasi"><button class="btn btn-info" title="Refresh"><i class="fas fa-sync"></i></button></a>
  </div>
  </div>
  <div class="card-body">
    <table id="tblKonfirmasi" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
       <thead>
          <tr>
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
   <div class="modal fade" id="modal-konfirmasi">
        <div class="modal-dialog">
          <div class="modal-content"  style="width: auto;">
            <div class="modal-header">
              <h4 class="modal-title">Data Konfirmasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form id="frmKonfirmasi">
            <div class="modal-body">
              <div class="row">
                               <div class="col-sm-12">
              <div class="form-group">
              <label>Tanggal Bayar</label>
              <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" required="required"> 
              </div>
                </div>
          <div class="col-sm-12">
              <div class="form-group">
              <label>Nomor Pengajuan</label><br>
              <select id="id_pengajuan_peserta" name="id_pengajuan_peserta"  class="theSelect form-control" required="required" style="width: 100%;">
                <option value="">Pilih</option>
              </select>
         </div>
          </div>
                <div class="col-sm-12">
            <div class="form-group">
              <label>Nomor Rekening</label>
              <input type="text" class="form-control" id="no_rekening" name="no_rekening" required="required" number="number"> 
            </div>
          </div>

              <div class="col-sm-12">
            <div class="form-group">
              <label>Atas Nama</label>
              <input type="text" class="form-control" id="atas_nama" name="atas_nama" required="required"> 
              </div>
                </div>
                <div class="col-sm-12">
              <div class="form-group">
              <label>Bank</label>
              <input type="text" class="form-control" id="bank" name="bank" required="required"> 
              </div>
                </div>
 
              </div> <!-- row -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary" id="save" onclick="tambah()">Simpan</button>
            </div>
          </div>

          <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
      </div>


   <div class="modal fade" id="modal-konfirmasi-detail">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Konfirmasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <table class="table">
            <tbody>
              <tr>
                <th>Nomor Pengajuan</th>
                <th>:</th>
                <td id="no_pengajuan2"></td>
              </tr>
              <tr>
                <th>Tanggal Bayar</th>
                <th>:</th>
                <td id="tanggal_bayar2"></td>
              </tr>
                <tr>
                <th>Tempat Konfirmasi</th>
                <th>:</th>
                <td id="tanggal_konfirmasi2"></td>
              </tr>
                <tr>
                <th>Nomor Rekening</th>
                <th>:</th>
                <td id="no_rekening2"></td>
              </tr>
              <tr>
                <th>Atas Nama</th>
                <th>:</th>
                <td id="atas_nama2"></td>
              </tr>
              <tr>
                <th>Bank</th>
                <th>:</th>
                <td id="bank2"></td>
              </tr>
              <tr>
                <th>Nominal</th>
                <th>:</th>
                <td id="harga"></td>
              </tr>
               <tr>          
                <th>Status</th>
                <th>:</th>
                <td id="status2"></td>
              </tr>
               <tr>
                <th>Catatan</th>
                <th>:</th>
                <td id="catatan2"></td>
              </tr>
               <tr>
              
             
            </tbody>
          </table>
           
          </div>
          <!-- /.modal-content -->
        
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>



<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../dist/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../config/custom.js"></script>
<script src="../dist/js/datatables.min.js"></script>
<script src="php/konfirmasi/fungsi.js"></script>
