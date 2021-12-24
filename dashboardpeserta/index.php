<?php
include '../config/format.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
header("location: ../peserta/index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>P4S Alam Cemerlang Sejahteras</title>

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
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../peserta/logout.php" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/logo.png" alt="P4S Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">P4S</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['nama']?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
  <!--     <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
 -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php?page=Instansi" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Registrasi Akun Instansi
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="index.php?page=List-Harga" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                List Harga
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="index.php?page=Pengajuan-Peserta" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Pengajuan Peserta
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="index.php?page=Biodata" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Biodata Peserta
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="index.php?page=Konfirmasi" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Konfirmasi Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=Jadwal-Pelatihan" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Jadwal Pelatihan
              </p>
            </a>
          </li>  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?=$title?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
               
              <?php 
                 if(isset($_GET['page'])){
                    $page = $_GET['page']; 
                    switch ($page) {
                          case 'Admin':
                          include "form/admin.php";
                          break;
                          case 'Instansi':
                          include "form/instansi.php";
                          break;  
                          case 'List-Harga':
                          include "form/list-harga.php";
                          break;  
                          case 'Pengajuan-Peserta':
                          include "form/pengajuan-peserta.php";
                          break;    
                          case 'Biodata':
                          include "form/biodata.php";
                          break;  
                          case 'Konfirmasi':
                          include "form/konfirmasi.php";
                          break;      
                           case 'Jadwal-Pelatihan':
                          include "form/jadwal-pelatihan.php";
                          break;                       
                    }
                 }else{
                   include 'selamatdatang.php';
                 }
               
                  ?>

              </div>
            </div>
            <!-- /.card -->

    </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?=date('Y')?> <?=$title?> </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../dist/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/datatables.min.js"></script>
 <script src="../dist/js/jquery-confirm.js"></script>
<script src="../dist/js/jquery.validate.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<!-- Bootstrap 4 -->
<!-- <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../vendors/select2/js/select2.min.js"></script>

  <script>
        $(".theSelect").select2();

    </script>
</body>
</html>
