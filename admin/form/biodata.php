<div class="card">
  <div class="card-header">
    <div class="" style="float: left;">
       Data Biodata</div>
    <div class="" style="float: right;">
 <button class="btn btn-primary" title="Refresh" data-toggle="modal" data-target="#modal-biodata"><i class="fas fa-plus"></i></button>
    <a href="index.php?page=Biodata"><button class="btn btn-info" title="Refresh"><i class="fas fa-sync"></i></button></a>
  </div>
  </div>
  <div class="card-body">
    <table id="tblBiodata" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
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


   <div class="modal fade bd-example-modal-lg" id="modal-biodata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content"  style="width: auto;">
            <div class="modal-header">
              <h4 class="modal-title">Data Biodata</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form id="frmBiodata">
            <div class="modal-body">
              <div class="row">
          <div class="col-sm-6">
              <div class="form-group">
              <label>Nomor Pengajuan</label><br>
              <select id="id_pengajuan_peserta" name="id_pengajuan_peserta"  class="theSelect form-control" required="required" style="width: 100%;">
                <option value="">Pilih</option>
              </select>
         </div>
          </div>
                <div class="col-sm-6">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required="required"> 
            </div>
          </div>

              <div class="col-sm-6">
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required="required"> 
              </div>
                </div>
                <div class="col-sm-6">
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required="required"> 
              </div>
                </div>
                 <div class="col-sm-6">
                <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" required="required" style="resize: none;"></textarea>
                    </div>
                  </div>
             <div class="col-sm-6">
              <div class="form-group">
              <label>Jenis Kelamin</label><br>
              <select id="jenis_kelamin" name="jenis_kelamin"  class="theSelect form-control" required="required" style="width: 100%;">
                <option value="">Pilih</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
         </div>
          </div>
              <div class="col-sm-6">
              <div class="form-group">
              <label>Agama</label><br>
              <select id="agama" name="agama"  class="theSelect form-control" required="required" style="width: 100%;">
                <option value="">Pilih</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
         </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Nomor Telepon</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" required="required" number="number"> 
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <label>Nomor Whatsapp</label>
              <input type="text" class="form-control" id="no_wa" name="no_wa" required="required" number="number"> 
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <label>Facebook</label>
              <input type="text" class="form-control" id="fb" name="fb" required="required"> 
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" id="email" name="email" required="required"> 
            </div>
          </div>
            <div class="col-sm-6">
                <div class="form-group">
                      <label>Hobby</label>
                      <textarea class="form-control" id="hobby" name="hobby" required="required" style="resize: none;"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                <div class="form-group">
                      <label>Cita - Cita</label>
                      <textarea class="form-control" id="cita_cita" name="cita_cita" required="required" style="resize: none;"></textarea>
                    </div>
                  </div>
                   <div class="col-sm-6">
                <div class="form-group">
                      <label>Pelatihan Yang Pernah Diikuti</label>
                      <textarea class="form-control" id="pelatihan" name="pelatihan" required="required" style="resize: none;" placeholder="Jika tidak ada beri tanda - "></textarea>
                    </div>
                  </div>
                   <div class="col-sm-6">
                <div class="form-group">
                      <label>Harapan Setelah Mengikuti Pelatihan</label>
                      <textarea class="form-control" id="harapan" name="harapan" required="required" style="resize: none;"></textarea>
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


   <div class="modal fade" id="modal-biodata-detail">
        <div class="modal-dialog modal-lg">

             
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Biodata</h4>
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
          <th>Tanggal Pengajuan</th>
          <th>:</th>
          <td id="tanggal_pengajuan2"></td>
        </tr>
        <tr>
          <th>Nama Lengkap</th>
          <th>:</th>
          <td id="nama_lengkap2"></td>
          <th>Jenis Kelamin</th>
          <th>:</th>
          <td id="jenis_kelamin2"></td>
        </tr>
           <tr>
          <th>Tempat Lahir</th>
          <th>:</th>
          <td id="tempat_lahir2"></td>
          <th>Tanggal Lahir</th>
          <th>:</th>
          <td id="tanggal_lahir2"></td>
        </tr>
         <tr>          
          <th>Agama</th>
          <th>:</th>
          <td id="agama2"></td>
          <th>Nomor Handphone</th>
          <th>:</th>
          <td id="no_hp2"></td>
        </tr>
         <tr>
          <th>Nomor Whatsapp</th>
          <th>:</th>
          <td id="no_wa2"></td>
          <th>Facebook</th>
          <th>:</th>
          <td id="fb2"></td>
        </tr>
         <tr>
          <th>Email</th>
          <th>:</th>
          <td id="email2"></td>
          <th>Hobby</th>
          <th>:</th>
          <td  id="hobby2"></td>
        </tr>

         <tr>
          <th>Alamat Lengkap</th>
          <th>:</th>
          <td colspan="4" id="alamat_lengkap2"></td>
        </tr>
        <tr>
          <th>Cita - Cita</th>
          <th>:</th>
          <td colspan="4" id="cita_cita2"></td>
        </tr>
        <tr>
          <th>Pelatihan Yang Pernah Diikuti</th>
          <th>:</th>
          <td colspan="4" id="pelatihan2"></td>
        </tr>
          <tr>
          <th>Harapan Setelah Mengikuti Pelatihan</th>
          <th>:</th>
          <td colspan="4" id="harapan2"></td>
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
<script src="../config/custom.js"></script>
<script src="../dist/js/datatables.min.js"></script>
<script src="php/biodata/fungsi.js"></script>
