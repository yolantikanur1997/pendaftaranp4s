<div class="card">
  <div class="card-header">
    <div class="" style="float: left;">
       Data Instansi</div>
    <div class="" style="float: right;">
 <button class="btn btn-primary" title="Refresh" data-toggle="modal" data-target="#modal-instansi"><i class="fas fa-plus"></i></button>
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
<!-- 
<form id="frmAkun">
  <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12">
       <div class="form-group">
              <label>Kode Akun</label>
              <input type="text" class="form-control" id="kode_akun" name="kode_akun" placeholder="Kode Akun" required="required"> 
            </div>
            <div class="form-group">
              <label>Nama Akun</label>
              <input type="text" class="form-control" id="nama_akun" name="nama_akun" placeholder="Nama Akun" required="required"> 
            </div>
            <div class="form-group">
              <label>Jenis</label>
              <select id="jenis" name="jenis" class="theSelect form-control" required="required">
                <option value="">Pilih Jenis</option>
                <option value="Harta">Harta</option>
                <option value="Utang">Utang</option>
                <option value="Modal">Modal</option>
                <option value="Prive">Prive</option>
                <option value="Pendapatan">Pendapatan</option>
                <option value="Beban">Beban</option>
              </select>
          </div>

          </div>
 <div class="col-lg-12 col-md-12 col-sm-12" align="right">
  <button type="button" class="btn btn-primary" id="save" onclick="tambahAkun()">Simpan</button>
  <button type="reset" class="btn btn-danger">Batal</button>
</div>
</div>
</div>
  </form>
 -->



<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../dist/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/datatables.min.js"></script>
<script src="php/instansi/fungsi.js"></script>
