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
                    <a href="#" class="d-block">Selamat Datang <br> <?= $user['username']; ?></a>
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
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-hamburger"></i>
                            <p>
                                <span class="badge badge-primary navbar-badge"><?= $pesanan; ?></span>
                                Pesanan Saya
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>User/pesananpembelidibuat" class="nav-link">
                                    <span class="badge badge-primary navbar-badge"><?= $dibuat; ?></span>
                                    <i class="nav-icon fas fa-hamburger"></i>
                                    <p>Sedang Dibuat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>User/pesananpembelidiantar" class="nav-link">
                                    <span class="badge badge-primary navbar-badge"><?= $diantar; ?></span>
                                    <i class="nav-icon fas fa-hamburger"></i>
                                    <p>Sedang Diantar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>User/pesananselesai" class="nav-link">
                                    <span class="badge badge-primary navbar-badge"><?= $diterima; ?></span>
                                    <i class="nav-icon fas fa-hamburger"></i>
                                    <p>Selesai</p>
                                </a>
                            </li>
                        </ul>
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
                        <h1 class="m-0 text-dark">Pesanan Saya</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row mt-4">
                    <div class="col-sm-12">
                        <?php foreach ($pesanansaya as $ps) : ?>
                            <div class="card mb-3 mt-3">
                                <?php if ($ps['status'] == 'Sedang Dibuat') : ?>
                                    <div class="card-header bg-danger">Pesanan Mu <?= $ps['status']; ?></div>
                                <?php else : ?>
                                    <div class="card-header bg-success">Pesanan Mu <?= $ps['status']; ?></div>
                                <?php endif; ?>
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="<?= base_url(); ?>asset/img/<?= $ps['foto']; ?>" alt="..." class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h5 class="card-text mt-5">Menu : <?= $ps['menu']; ?></h5>
                                                    <h5 class="card-text mt-2">Harga : <?= $ps['harga']; ?></h5>
                                                    <h5 class="card-text mt-2">Jumlah : <?= $ps['jumlah']; ?></h5>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h5 class="card-text mt-5">Total Harga : <?= $ps['tot_harga']; ?></h5>
                                                    <h5 class="card-text mt-2">Tambahan : <?= $ps['tambahan']; ?></h5>
                                                    <h5 class="card-text mt-2">Status : <?= $ps['status']; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?= base_url(); ?>User/pesananditerima/<?= $ps['id_transaksi']; ?>" class="btn btn-danger ml-3 mt-5 mb-5 diterima">Pesanan Diterima</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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