<div class="wrapper">
    <div class="successlogin" data-successlogin="<?= $this->session->flashdata('successlogin'); ?>"></div>
    <div class="sukses" data-sukses="<?= $this->session->flashdata('sukses'); ?>"></div>
    <div class="done" data-done="<?= $this->session->flashdata('done'); ?>"></div>
    <div class="cart" data-cart="<?= $this->session->flashdata('cart'); ?>"></div>
    <div class="keranjang" data-keranjang="<?= $this->session->flashdata('keranjang'); ?>"></div>
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
                        <h1 class="m-0 text-dark">Checkout Pesanan</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="<?= base_url(); ?>/asset/img/<?= $product->foto; ?>" alt="..." class="img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <form action="<?= base_url(); ?>User/buatpesanan" method="POST">
                                            <input type="hidden" name="idpembeli" value="<?= $user['id'] ?>">
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="">Nama</label>
                                                    <input type="text" class="form-control" value="<?= $user['name'] ?>" readonly name="nama">
                                                </div>
                                                <?php foreach ($jurusan as $jrs) : ?>
                                                    <div class="col">
                                                        <label for="">Kelas</label>
                                                        <input type="text" class="form-control" value="<?= $jrs['kelas']; ?>" readonly name="kelas">
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <h3 class="mt-3 mb-3">Pesanan</h3>
                                            <?php foreach ($this->cart->contents() as $items => $value) : ?>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="">Menu</label>
                                                        <input type="text" class="form-control" value="<?= $value['name'] ?>" name="menu">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">Harga</label>
                                                        <input type="text" class="form-control" value="Rp.<?= number_format($value['price'], 0, ',', '.'); ?>" name="harga">
                                                    </div>
                                                </div>
                                                <div class="form-row mt-1">
                                                    <div class="col">
                                                        <label for="">Jumlah</label>
                                                        <input type="text" class="form-control" value="<?= $value['qty'] ?>" name="jumlah">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">Total</label>
                                                        <input type="text" class="form-control" value="Rp.<?= number_format($this->cart->total(), 0, ',', '.'); ?>" name="total">
                                                    </div>
                                                </div>
                                                <input type="hidden" value="<?= $value['options']['kantin'] ?>" name="kantin">
                                                <input type="hidden" value="<?= $value['options']['foto'] ?>" name="foto">
                                                <input type="hidden" value="<?= $value['id'] ?>" name="idproduct">
                                                <input type="hidden" value="<?= $rowid ?>" name="rowid">
                                            <?php endforeach; ?>
                                            <div class="form-group mt-1">
                                                <label for="exampleFormControlTextarea1">Tambahan</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tambahan"></textarea>
                                                <small class="text-danger">*Mohon Diketik "Tidak Ada" jika tidak ada tambahan</small>
                                            </div>
                                            <button class="btn btn-success" name="pesan" type="submit">Buat Pesanan</button>
                                        </form>
                                    </div>
                                </div>
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
    <footer class=" py-5 col-lg-12 mt-5" style="background-color: #CE3232;">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
    </footer>

    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
</div>