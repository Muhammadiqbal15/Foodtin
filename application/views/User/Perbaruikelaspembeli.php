<div class="wrapper">
    <div class="successlogin" data-successlogin="<?= $this->session->flashdata('successlogin'); ?>"></div>
    <div class="sukses" data-sukses="<?= $this->session->flashdata('sukses'); ?>"></div>
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

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-3 mt-3">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Perbarui Kelas Mu</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <form action="<?= base_url(); ?>User/updatekelaspembeli" method="POST">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="name" value="<?= $user['name']; ?>" readonly>
                            </div>
                            <?php foreach ($jurusan as $jrs) : ?>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" class="form-control" id="text" name="jurusan" value="<?= $jrs['jurusan']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Status Kelas Sebelum nya</label>
                                    <input type="text" class="form-control" id="text" name="kelas" value="<?= $jrs['kelas']; ?>" readonly>
                                </div>
                            <?php endforeach; ?>
                            <div class="form-group">
                                <label for="tipe">Tipe</label>
                                <input type="text" class="form-control" id="tipe" name="tipe" value="<?= $user['tipeakun']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Kelas">Naik Ke Kelas-</label>
                                <input type="kls" class="form-control" id="Kelas" name="kls" placeholder="Kelas">
                            </div>
                            <small class="text-danger">
                                <?= form_error('kls'); ?>
                            </small>
                            <a href="<?= base_url(); ?>User/Userpembeli" class="btn btn-success">Kembali</a>
                            <button type="submit" name="ubahpass" class="btn btn-primary">Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>