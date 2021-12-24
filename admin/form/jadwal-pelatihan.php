<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="formpengajuan-tab" data-toggle="tab" href="#formpengajuan" role="tab" aria-controls="formpengajuan" aria-selected="true">Form Jadwal Pelatihan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="datapengajuan-tab" data-toggle="tab" href="#datapengajuan" role="tab" aria-controls="datapengajuan" aria-selected="false">Data Jadwal Pelatihan</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="formpengajuan" role="tabpanel" aria-labelledby="formpengajuan-tab">
<div class="card mt-2">
  <div class="card-header">
    <div class="" style="float: left;">
       Form Pengajuan Peserta</div>
    <div class="" style="float: right;">
    <a href="index.php?page=Jadwal-Pelatihan"><button class="btn btn-info" title="Refresh"><i class="fas fa-sync"></i></button></a>
  </div>
  </div>
  <div class="card-body">
   <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
     <div class="form-group">
        <label>Nomor Pengajuan</label>
          <select name="id_pengajuan_peserta" id="id_pengajuan_peserta" class=" theSelect form-control" required="required">
          <option value="">Pilih</option>
           </select>
       </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-4">
     <div class="form-group">
        <label>Hari</label>
         <select name="hari" id="hari" class=" theSelect form-control">
          <option value="">Pilih</option>
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Kamis">Kamis</option>
          <option value="Jumat">Jumat</option>
          <option value="Sabtu">Sabtu</option>
          <option value="Minggu">Minggu</option>
           </select>
       </div>
  </div>
   <div class="col-lg-4 col-md-4 col-sm-4">
     <div class="form-group">
        <label>Tanggal</label>
         <input type="date" name="tanggal" id="tanggal" class="form-control" required="required" style="resize: none;">
       </div>
  </div>
</div>
<!-- table detail input -->
 <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
          <form id="frmJadwal">
            <table class="table table-responsive-sm">
            <thead>
            <tr>
            <th style="width: 450px">Mata Pelatihan</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>JB</th>
            <th>Fasilitator</th>
            <th>Tambah</th>
            </tr>
            </thead>
            <tbody>
              <td style="width: 450px"><input type="text" name="mata_latihan" id="mata_latihan" class="form-control"></td>
              <td><input type="time" name="jam_mulai" id="jam_mulai" class="form-control"></td>
              <td><input type="time" name="jam_selesai" id="jam_selesai" class="form-control"></td>
              <td><input type="number" name="jp" id="jp" class="form-control"></td>
              <td><input type="text" name="fasilitator" id="fasilitator" class="form-control"></td>
              <td>  <button type="button" class="btn btn-primary" onclick="tambahDetail()" title="Tambah"><i class="fa fa-plus"></i></button></td>
            </tbody>
           </table>
          </form>
        </div>
      </div>

<!-- table detail list -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="table table-bordered table-responsive-sm" id="jadwalList" >
                        <thead>
                        <tr>
                          <th>Hapus</th>
                          <th>Mata Latihan</th>
                          <th>Jam Mulai</th>
                          <th>Jam Selesai</th>
                          <th>JB</th>
                          <th>Fasilitator</th>
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
       Data Jadwal Pelatihan</div>
    <div class="" style="float: right;">
    <a href="index.php?page=Jadwal-Pelatihan"><button class="btn btn-info" title="Refresh"><i class="fas fa-sync"></i></button></a>
  </div>
  </div>
    <div class="card-body">

    <table id="tblJadwal" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
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
</div>
</div>

   <div class="modal fade" id="modal-jadwal-pelatihan">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Jadwal Pelatihan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form id="frmJadwalUpdate">
            <div class="modal-body">
             <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
              <label>Status</label>
              <select name="hari" id="hari2" class=" theSelect form-control" style="width: 100%">
              <option value="">Pilih</option>
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
              <option value="Sabtu">Sabtu</option>
              <option value="Minggu">Minggu</option>
           </select>
           </select>
            </div>
          </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
             <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" id="tanggal2" name="tanggal" required="required">
            </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary" id="save" onclick="update()">Simpan</button>
            </div>
          </div>
          </div>
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
<script src="../config/custom.js"></script>
<script src="php/jadwal-pelatihan/fungsi.js"></script>
