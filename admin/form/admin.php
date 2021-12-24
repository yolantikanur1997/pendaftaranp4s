<div class="card">
  <div class="card-header">
    <div class="" style="float: left;">
       Data Admin</div>
    <div class="" style="float: right;">
 <button class="btn btn-primary" title="Refresh" data-toggle="modal" data-target="#modal-admin"><i class="fas fa-plus"></i></button>
    <a href="index.php?page=Admin"><button class="btn btn-info" title="Refresh"><i class="fas fa-sync"></i></button></a>
  </div>
  </div>
  <div class="card-body">
    <table id="tblAdmin" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
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


   <div class="modal fade" id="modal-admin">
        <div class="modal-dialog">

             
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Admin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form id="frmAdmin">
            <div class="modal-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required="required"> 
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" id="email" name="email" required="required"> 
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="username" name="username" required="required"> 
            </div>
             <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" id="password" name="password" required="required"> 
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



<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../dist/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/datatables.min.js"></script>
<script src="php/admin/fungsi.js"></script>
