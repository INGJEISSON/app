<aside class="main-sidebar sidebar-dark-primary">
            <!-- Brand Logo -->
            <center><a href="#" class="brand-link navbar-white">
            <img src="../../demo/pages/examples/logo_final.png"  width='64' height='64'>
            <span class="brand-text font-weight-light">SICMATCH</span>
            </a></center>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block"><?PHP echo $_SESSION['usuario'] ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <?PHP include('menu.php') ?>
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
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Inicio</a></li>
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->