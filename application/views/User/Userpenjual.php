<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <?= $user['name']; ?>
          <img src="<?= base_url(); ?>asset/img/<?= $user['image']; ?>" class=" img-circle elevation-2 img-fluid" alt="Foto Profile" width="30" height="30">
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #CE3232;">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Selamat Datang <?= $user['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url(); ?>Home/index" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>User/userpembeli" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>Auth/logout" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Logout
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
        <div class="row mb-3 mt-3">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard User Penjual</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row mt-4">
          <div class="col-md-6">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" style="background-color: #CE3232;">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="<?= base_url(); ?>/asset/img/<?= $user['image']; ?>" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?= $user['name']; ?></h3>
                <h5 class="widget-user-desc"><?= $user['tipeakun']; ?></h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <h5 class="nav-link">

                      <?= $user['username']; ?>
                      <span class="float-right badge bg-dark"><i class="nav-icon fas fa-user"></i></span>
                    </h5>
                  </li>
                  <li class="nav-item">
                    <h5 class="nav-link">

                      <?= $user['name']; ?>
                      <span class="float-right badge bg-dark"><i class="nav-icon fas fa-user"></i></span>
                    </h5>
                  </li>
                  <li class="nav-item">
                    <h5 class="nav-link">

                      <?= $user['email']; ?>
                      <span class="float-right badge bg-dark"><i class="nav-icon fas fa-envelope"></i></span>
                    </h5>
                  </li>
                  <li class="nav-item">
                    <h5 class="nav-link">

                      <?= $user['nohp']; ?>
                      <span class="float-right badge bg-dark"><i class="nav-icon fas fa-phone "></i></span>
                    </h5>
                  </li>
                  <?php foreach ($jurusan as $jrs) : ?>
                    <li class="nav-item">
                      <h5 class="nav-link">

                        <?= $jrs['jurusan']; ?>
                        <span class="float-right badge bg-dark"><i class="nav-icon fas fa-phone "></i></span>
                      </h5>
                    </li>
                    <li class="nav-item">
                      <h5 class="nav-link">

                        <?= $jrs['kelas']; ?>
                        <span class="float-right badge bg-dark"><i class="nav-icon fas fa-phone "></i></span>
                      </h5>
                    </li>
                  <?php endforeach; ?>
                  <li class="nav-item">
                    <h5 class="nav-link">

                      <?= $user['tipeakun']; ?>
                      <span class="float-right badge bg-dark"><i class="nav-icon fas fa-phone "></i></span>
                    </h5>
                  </li>
                  <li class="nav-item">
                    <h4 class="nav-link">
                      <a href="<?= base_url(); ?>User/Editprorilpembeli" class="btn btn-primary">Edit Profil</a>
                    </h4>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <div class="card-body">
                <img src="<?= base_url(); ?>/asset/img/<?= $user['image']; ?>" alt="" class="img-fluid img-rounded">
                <br>
                <a href="" class="btn btn-primary">Edit Foto</a>
                <a href="" class="btn btn-success">Ubah Password</a>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="py-5 col-lg-12 mt-5" style="background-color: #CE3232;">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>