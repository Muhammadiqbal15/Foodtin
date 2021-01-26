<div class="wrapper">
    <div class="successlogin" data-successlogin="<?= $this->session->flashdata('successlogin'); ?>"></div>
    <div class="sukses" data-sukses="<?= $this->session->flashdata('sukses'); ?>"></div>
    <div class="done" data-done="<?= $this->session->flashdata('done'); ?>"></div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- SEARCH FORM -->

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <?= $user['username']; ?>
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
                    <a href="#" class="d-block">Selamat Datang <?= $user['username']; ?></a>
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
                        <a href="<?= base_url(); ?>User/keranjangpembeli" class="nav-link">
                            <span class="badge badge-primary navbar-badge"><?= $this->cart->total_items(); ?></span>
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Keranjang
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
                        <h1 class="m-0 text-dark">Dashboard User Pembeli</h1>
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
                                <h3 class="widget-user-username"><?= $user['username']; ?></h3>
                                <h5 class="widget-user-desc"><?= $user['tipeakun']; ?></h5>
                            </div>
                            <div class="card-footer p-0">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h5 class="nav-link" style="font-size: 20px;">

                                            <?= $user['username']; ?>
                                            <i class="nav-icon fas fa-user float-right fa-lg"></i>
                                        </h5>
                                    </li>
                                    <li class="list-group-item">
                                        <h5 class="nav-link" style="font-size: 20px;">

                                            <?= $user['name']; ?>
                                            <i class="nav-icon far fa-user float-right fa-lg"></i></i>
                                        </h5>
                                    </li>
                                    <li class="list-group-item">
                                        <h5 class="nav-link" style="font-size: 20px;">

                                            <?= $user['email']; ?>
                                            <i class="nav-icon fas fa-envelope float-right fa-lg"></i>
                                        </h5>
                                    </li>
                                    <li class="list-group-item">
                                        <h5 class="nav-link" style="font-size: 20px;">

                                            <?= $user['nohp']; ?>
                                            <i class="nav-icon fas fa-phone float-right fa-lg"></i>
                                        </h5>
                                    </li>
                                    <?php foreach ($jurusan as $jrs) : ?>
                                        <li class="list-group-item">
                                            <h5 class="nav-link" style="font-size: 20px;">

                                                <?= $jrs['jurusan']; ?>
                                                <i class="fas fa-graduation-cap float-right fa-lg"></i>
                                            </h5>
                                        </li>
                                        <li class="list-group-item">
                                            <h5 class="nav-link" style="font-size: 20px;">

                                                <?= $jrs['kelas']; ?>
                                                <i class="nav-icon fas fa-book-reader float-right fa-lg"></i>
                                            </h5>
                                        </li>
                                    <?php endforeach; ?>
                                    <li class="list-group-item">
                                        <h5 class="nav-link" style="font-size: 20px;">

                                            <?= $user['tipeakun']; ?>
                                            <i class="fas fa-users-cog float-right fa-lg"></i>
                                        </h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Widget: user widget style 2 -->
                        <div class="card card-widget widget-user-2">
                            <div class="card-body justify-content-center d-flex">
                                <img src="<?= base_url(); ?>/asset/img/<?= $user['image']; ?>" alt="" class="img-fluid img-circle mt-5">
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url(); ?>User/Editprofilpembeli" class="btn btn-primary"><i class="fas fa-user-edit"></i> Edit Profil</a>
                                <a href="<?= base_url(); ?>User/changePasswordpembeli" class="btn btn-success"><i class="fas fa-key"></i> Ubah Password</a>
                                <br>
                                <a href="<?= base_url(); ?>User/perbaruikelaspembeli" class="btn btn-danger mt-2"><i class="fas fa-arrow-up"></i> Perbarui Kelas</a>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
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