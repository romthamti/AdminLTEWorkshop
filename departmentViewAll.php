  <?php
    //
    session_start();

    if (!isset($_SESSION['pID'])) {
      header("location:index.php");
    }

    if (($_SESSION['positionID'])!=1) {
      header("location:index.php");
    }

    //การนำคำสั่ง session มาเก็บตัวแปรและเอาออกมาแสดงให้เห็น
    $ssImgPer=$_SESSION['imagesPer'];
    $ssName=$_SESSION['perName'];
    $ssLastname=$_SESSION['perLastname'];
    $ssPosition=$_SESSION['positionID'];
    $ssID=$_SESSION['pID'];
    //เตรียมภาพ Profile สำหรับการแสดง
    if ($ssImgPer=="") {
      $pathImagePer = "asset/imageUser/RomthamUser 160x160.png";
    }else{
      $pathImagePer = "asset/imageUser/".$ssImgPer;

      if (file_exists($pathImagePer)==1) {
        $pathImagePer = "asset/imageUser/".$ssImgPer;
      }else{
        $pathImagePer = "asset/imageUser/user8-128x128.jpg";
      }
    }
    
    // 3 เชื่อฐานข้อมูล
    require('config.php');
    require('connectMySQLi.php');

    // สำหรับแสดงผลของข้อมูล
    // 4  สร้างคำสั่ง SQL โดยใช่ "SELECT"
    //เพื่อตรวจสอบหรือล็อคข้อมูลไว้ DEP = departmemt
    $sqlLDep = "SELECT * FROM departmemt ";
    // echo $sqlLDep ;

    // 5 การสั่ง SQL ทำงานล็อคข้อมูลมาจริงๆ
    // connDB มาจาก connectMySQL
    $resultDep = $connDB->query($sqlLDep);

  ?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
  <div class="wrapper">
    <?php
        //รับค่า msg มาจากการ GET
        if (isset($_GET['msg'])){
          //รับค่าข้อมูล
          $gMsg = $_GET['msg'];

          switch ($gMsg) {
                case '1':
                    $message="ยินดีด้วย";
                    $txtColor="text-success";
                    break;
                case '2':
                    $message="บัญชียี้มีผู้ใช่แล้วโปรด ลองใหม่อีกครั้ง";
                    $txtColor="text-danger";
                    break;
                  case '3':
                    $message="มี Email ในระบบแล้ว";
                    $txtColor="text-danger";
                    break;
                  case '4':
                    $message="Password ไม่ตรงกัน";
                    $txtColor="text-danger";
                    break;

                default:
                    $message="Sign in to start your system";
                    $txtColor="";
                    break;
          }

        }else{
          $message="Sign in to start your system";
          $txtColor="";
        }
      ?>

      <div

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item menu-open">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item menu-open">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BCKSU</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo $pathImagePer; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $ssName." ".$ssLastname; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="dashbordMain.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  แดชบอร์ด
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="personalViewAll.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  ข้อมูลพนักงาน
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-table "></i>
                <p>
                  ข้อมูลพื้นฐาน
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>แผนก</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="positionViewAll.php" class="nav-link">
                    <i class="far fa-circle nav-icon text-warning"></i>
                    <p>ตำแหน่งงาน</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">Systems</li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fas fa-arrow-circle-right nav-icon"></i>
              <p>
                ออกจากระบบ
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
              <h1 class="m-0">departmemt</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">departmemt v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">ข้อมูลแผนก</h3>
                <div class="card_tools">
                  <button type="button" class="btn btn-warning float-right btn-sm">
                    <i class="fas fa-plus"></i> เพิ่มข้อมูล
                </button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabledepartmemt" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>ชื่อแผนก (ภาษาไทย)</th>
                    <th>ชื่อแผนก (ภาษาอังกฤษ)</th>
                    <th>วันที่สร้าง</th>
                    <th>...</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  if ($resultDep->num_rows > 0) {
                    while ($rowsItem = $resultDep->fetch_assoc()) {
                     $depID =  $rowsItem["departmemt_id"];
                    
                   ?>

                  <tr>
                    <td><?php echo $rowsItem["departmemt_id"]; ?></td>
                    <td><?php echo $rowsItem["department_nametha"]; ?></td>
                    <td><?php echo $rowsItem["department_nameeng"]; ?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($rowsItem["create_at"])); ?></td><td>
                    <td><button type="button" class="btn btn-outline-success btn-block btn-sm"><i class="fa fa-edit" ></i> แก้ไข</button></td>
                    <td><button type="button" onclick="departmentDelete(<?php echo $depID; ?>)" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash" ></i> ลบข้อมูล</button></td>
                  </tr>

                  <?php 
                  }
                  }
                   ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>ชื่อแผนก (ภาษาไทย)</th>
                    <th>ชื่อแผนก (ภาษาอังกฤษ)</th>
                    <th>วันที่สร้าง</th>
                    <th>...</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
      <!-- Main content -->
      <section class="content">
        <!-- Modal Delete -->
        <form id="frmDel" name="frmDel" action="departmentDelete.php" method="POST">

          <div class="modal fade" id="modal-Delete">
            <div class="modal-dialog">
              <div class="modal-content bg-danger">
                
                <div class="modal-header">
                  <h4 class="modal-title">ยืนยันการลบ</h4>
                  <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <input type="text" id="inputDepIDDel" name="inputDepIDDel">
                  <p>คุณแน่ใจหรือไม่ ที่จะลบข้อมูลแผนกที่เลือก…</p>
                </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">ยกเลิก</button>
                  <button type="submit" name="btnDeleteDep" class="btn btn-outline-light">ยืนยัน</button>
                </div>

              </div>
            </div>
          </div>

        </form>
            <!-- <div class="modal fade" id="modal-Delete"> -->
          <footer class="main-footer">
          <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">BC.KSU</a>.</strong>
          All rights reserved.
          <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 69.69.0
          </div>
        </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- Page specific script -->
<script>
  $(function () {
    $("#tabledepartmemt").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf"]
    }).buttons().container().appendTo('#tabledepartmemt_wrapper .col-md-6:eq(0)');
    
  });

  function departmentDelete(id) {

    // alert('คลิกได้');
    if (id > 0) {
      $("#inputDepIDDel").val(id);
    }

    $("#modal-Delete") .modal("show");
  }
</script>
  </body>
  </html>
