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
                    <h6 class="text-white" style="font-size: 25px;"><?= $user['username']; ?></h6>
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

    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-3 mt-3">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Profil Mu</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="card ">
                            <div class="card-header" style="background-color: #CE3232;">
                                <h3 class="card-title text-white">Edit</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?= form_open_multipart('User/editprofilpenjual'); ?>
                            <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tipe">Tipe Akun</label>
                                            <input type="text" class="form-control" id="tipe" name="tipe" value="<?= $user['tipeakun'] ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php foreach ($jurusan as $jrs) : ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="jurusan">Jurusan</label>
                                                <input type="text" class="form-control" id="text" name="jurusan" value="<?= $jrs['jurusan']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $jrs['kelas'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                                </div>
                                <small class="text-danger">
                                    <?= form_error('username'); ?>
                                </small>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="name" value="<?= $user['name']; ?>">
                                </div>
                                <small class="text-danger">
                                    <?= form_error('name'); ?>
                                </small>

                                <div class="form-group">
                                    <label for="nohp">Nomor HP/Whatsapp</label>
                                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $user['nohp']; ?>">
                                </div>
                                <small class="text-danger">
                                    <?= form_error('nohp'); ?>
                                </small>
                                <div class="row">
                                    <div class="col-lg-2">Foto</div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img src="<?= base_url(); ?>asset/img/<?= $user['image']; ?>" alt="" class="img-thumbnail">
                                                <label for="exampleInputFile"><?= $user['image']; ?></label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="input-group mt-5">
                                                        <input type="file" class="form-control-file" id="foto" name="foto">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="<?= base_url(); ?>User/Userpembeli" class="btn btn-success">Kembali</a>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- /.container-fluid -->
</div>