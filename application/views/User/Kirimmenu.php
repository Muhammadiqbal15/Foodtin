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
                        <a href="<?= base_url(); ?>User/userpenjual" class="nav-link">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>User/produkpenjual" class="nav-link">
                            <i class="nav-icon fas fa-hamburger"></i>
                            <p>
                                Menu
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>User/pesananpenjual" class="nav-link">
                            <span class="badge badge-primary navbar-badge"><?= $notifdibuat; ?></span>
                            <i class="nav-icon fas fa-utensils"></i>
                            <p>
                                Pesanan Pembeli
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>User/pesanandiantar" class="nav-link">
                            <span class="badge badge-primary navbar-badge"><?= $notifdiantar; ?></span>
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>
                                Pesanan Diantar
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
                        <h1 class="m-0 text-dark">Antar Menu</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <?php foreach ($menu as $mn) : ?>
                                <div class="card-body ">
                                    <form action="<?= base_url(); ?>User/kirimmenu" method="POST">
                                        <input type="hidden" name="id" value="<?= $mn['id_transaksi'] ?>">
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $mn['nm_pembeli']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="kelas">Kelas</label>
                                                    <input type="text" class="form-control" id="kelas" name="kls" value="<?= $mn['kelas_pembeli']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="menu">Menu</label>
                                                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $mn['menu']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="harga">Harga</label>
                                                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $mn['harga']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="jml">Jumlah</label>
                                                    <input type="text" class="form-control" id="jml" name="jml" value="<?= $mn['jumlah']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="tothrg">Total Harga</label>
                                                    <input type="text" class="form-control" id="tothrg" name="tothrg" value="<?= $mn['tot_harga']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Cat.Tambahan</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tambahan" readonly><?= $mn['tambahan']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                                <option value="<?= $mn['status'] ?>"><?= $mn['status'] ?></option>
                                                <option value="Diantar">Di Antar</option>
                                            </select>
                                        </div>
                                        <a href="<?= base_url(); ?>User/pesananpenjual" class="btn btn-success mt-2">Kembali</a>
                                        <button class="btn btn-primary mt-2">Antar</button>
                                    </form>
                                </div>
                            <?php endforeach; ?>

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