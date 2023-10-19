<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="?page=dashboard" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>     
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="?page=jurnal-mk" class="nav-link   <?php
      if(isset($_GET['page']) && ($_GET['page']=='jurnal-mk' || $_GET['page']=='edit-jurnal')){ echo 'active';} else{}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Kuliah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=khd-dosen" class="nav-link   <?php
      if(isset($_GET['page']) && ($_GET['page']=='khd-dosen' || $_GET['page']=='edit-khd-dosen')){ echo 'active';} else{}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kehadiran Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=data-nilai" class="nav-link   <?php
      if(isset($_GET['page']) && ($_GET['page']=='data-nilai' || $_GET['page']=='edit-data-nilai')){ echo 'active';} else{}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penilaian MHS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=profile" class="nav-link   <?php
      if(isset($_GET['page']) && ($_GET['page']=='profile' || $_GET['page']=='profile')){ echo 'active';} else{}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a id='logout' href="logout.php" class="nav-link logoff">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                
              </p>
            </a>
          </li>    
          
        </ul>
      </nav>
      