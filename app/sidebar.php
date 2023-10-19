<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
          <?php
          // $path    = './upload/profile-dosen'; //lokasi folder sekarang 
          // $files = scandir($path);
          // $files = array_diff(scandir($path), array('.', '..'));
          // foreach($files as $nama_file)
          // {
          //   echo "<a href='$nama_file'>$nama_file</a><br/>";
          // }
          // if(file_exists("./upload/profile-dosen/twit.png")){
          //   echo "File tersedia";
          // }else{
          //   echo "File yang di cari tidak ada !";
          // }
          $id = $_SESSION['noId'];
          if(file_exists("./upload/profile-dosen/$id.png")){?>
            <img src="upload/profile-dosen/<?php echo $_SESSION['noId'].'.png';?>" class="img-circle elevation-2" alt="User Image">
          <?php } else{?>
            <img src="upload/profile-dosen/user.png" class="img-circle elevation-2" alt="User Image">
          <?php }?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php
      if(isset($_SESSION['role']) && $_SESSION['role']=='superadmin'){
        include('menu/superadmin.php');
      }
      else if(isset($_SESSION['role']) && $_SESSION['role']=='dosen'){
        include('menu/dosen.php');
      }
      else if(isset($_SESSION['role']) && $_SESSION['role']=='keuangan'){
        include('menu/keuangan.php');
      }
      else{
        include('menu/operator.php');
      }
      ?>
      <!-- /.sidebar-menu -->
    </div>