<?php
include '../config/autonumber.php';
?>
<div class="card">
  <div class="card-header">
    <div class="" style="float: left;">
       Data List Harga</div>
    <div class="" style="float: right;">
 <button class="btn btn-primary" title="Refresh" data-toggle="modal" data-target="#modal-list-harga"><i class="fas fa-plus"></i></button>
    <a href="index.php?page=List-Harga"><button class="btn btn-info" title="Refresh"><i class="fas fa-sync"></i></button></a>
  </div>
  </div>
  <div class="card-body">
    <table id="tblHarga" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
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


   <div class="modal fade" id="modal-list-harga">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data List Harga</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form id="frmHarga">
            <div class="modal-body">
            <div class="form-group">
              <label>Nomor Paket</label>
              <input type="text" class="form-control" id="no_paket" name="no_paket" value="<?=autonumber("list_harga", "no_paket", "7", "PKT")?>" readonly> 
            </div>
            <div class="form-group">
              <label>Nama Paket</label>
              <input type="text" class="form-control" id="nama_paket" name="nama_paket" required="required"> 
            </div>
             <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" required="required" style="resize: none;"></textarea>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" class="form-control" id="harga" name="harga" required="required"> 
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
<script src="../config/custom.js"></script>
<script src="php/list-harga/fungsi.js"></script>
