<?php 
session_start();
if(!$_SESSION['nama']){
  header('Location: ../index.php?session=expired');
}
include('header.php');?>
<?php include('../conf/config.php');?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="../logo.png">
<style>      
.logoff { 
  animation: example 4s infinite linear;
  }

@keyframes example {
  0% {color: red;}
  50% {color: yellow;}
  100% {color: red;}
}
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 <?php include('preloader.php');?>

  <!-- Navbar -->
  <?php include('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php include('logo.php');?>

    <!-- Sidebar -->
    <?php include('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('content_header.php');?>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
    if (isset($_GET['page'])){
      if ($_GET['page']=='dashboard'){
        include('dashboard.php');
      }
      else if($_GET['page']=='data-dosen'){
        include('data_dosen.php');
      }
      else if($_GET['page']=='edit-dosen'){
        include('edit/edit-dosen.php');
      }
      else if($_GET['page']=='data-mk'){
        include('data_mk.php');
      }
      else if($_GET['page']=='jurnal-mk'){
        include('data_jurnal_mk.php');
      }      
      else if($_GET['page']=='data-mk'){
        include('edit/edit_mk.php');
      }
      else if($_GET['page']=='data-nilai'){
        include('data_nilai.php');
      }
      else if($_GET['page']=='khd-dosen'){
        include('data_khd_dosen.php');
      }
      else if($_GET['page']=='khd-dosen-admin'){
        include('data_khd_dosen_admin.php');
      }
      /* View Data */
      else if($_GET['page']=='view-data-dosen'){
        include('views/view-data_dosen.php');
      }
      else if($_GET['page']=='view-data-mk'){
        include('views/view-data_mk.php');
      }
      else if($_GET['page']=='view-data-nilai'){
        include('views/view-data_nilai.php');
      }
      else if($_GET['page']=='view-khd-dosen'){
        include('views/view-data_khd_dosen.php');
      }
      // else if($_GET['page']=='data-PembayaranMhs'){
      //   include('data_PembayaranMhs.php');
      // }
      // else if($_GET['page']=='data-Tagihan'){
      //   include('data_Tagihan.php');
      // }
      else if($_GET['page']=='profile'){
        include('profile.php');
      }       
      else{
        include('not_found.php');
      }
    }
    else{
      include('dashboard.php');
    }?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
