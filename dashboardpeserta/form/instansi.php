<div class="card">
  <div class="card-header">
    <div class="" style="float: left;">
       Data Instansi</div>
    <div class="" style="float: right;">
    <a href="index.php?page=Instansi"><button class="btn btn-info" title="Refresh"><i class="fas fa-sync"></i></button></a>
  </div>
  </div>
  <div class="card-body">
    <table id="tblInstansi" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
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


   <div class="modal fade" id="modal-instansi">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Instansi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form id="frmInstansi">
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
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" name="password" required="required"> 
            </div>
    
            
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


   <div class="modal fade" id="modal-instansi-detail">
        <div class="modal-dialog">

             
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Instansi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             
            <div class="modal-body">

               <table class="table">
      <tbody>
        <tr>
          <th>Nama Instansi</th>
          <td id="nama_instansi2"></td>
        </tr>
        <tr>
          <th>Kategori</th>
          <td id="kategori2"></td>
        </tr>
         <tr>
          <th>Telepon</th>
          <td id="telepon2"></td>
        </tr>
         <tr>
          <th>Alamat</th>
          <td id="alamat2"></td>
        </tr>
         <tr>
          <th>Tanggal Registrasi</th>
          <td id="tanggal_registrasi2"></td>
        </tr>
         <tr>
          <th>Username</th>
          <td id="username2"></td>
        </tr>
       
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
<script src="../dist/js/datatables.min.js"></script>
<script src="php/instansi/fungsi.js"></script>
