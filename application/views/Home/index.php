<div class="successlogin" data-successlogin="<?= $this->session->flashdata('successlogin'); ?>"></div>
<div class="successlogout" data-successlogout="<?= $this->session->flashdata('successlogout'); ?>"></div>
<div class="cart" data-cart="<?= $this->session->flashdata('cart'); ?>"></div>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #CE3232;">
    <a class="navbar-brand" href="<?= base_url(); ?>LandingPage/index">Food.Tin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>Home/index">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>Home/aboutdev">AboutDev</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Product
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url(); ?>Home/Minuman">Minuman</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>Home/Makber">MakananBerat</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>Home/Makring">MakananRingan</a>
                    </div>
                </li>
            </ul>

            <?php if (!$this->session->userdata('username')) : ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url() ?>Auth/index">Login<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url() ?>Auth/regis">Registrasi<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            <?php else : ?>
                <?php
                $role = $this->session->userdata('role_id');
                $tipe = $this->session->userdata('tipe');
                ?>
                <?php if ($role > 1) : ?>
                    <?php if ($tipe != "Penjual") : ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url(); ?>User/keranjangpembeli" aria-expanded="true">
                                    Keranjang
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="badge badge-primary navbar-badge"><?= $this->cart->total_items(); ?></span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $user['name']; ?>
                                    <img src="<?= base_url(); ?>/asset/img/<?= $user['image']; ?>" alt="" width="30" height="30" class="rounded-circle ml-1 img-fluid "><span class="sr-only">(current)</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= base_url() ?>User/Userpembeli"><i class="fas fa-user"></i> <?= $user['name']; ?></a>
                                    <a class="dropdown-item" href="<?= base_url(); ?>Auth/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    <?php else : ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $user['name']; ?>
                                    <img src="<?= base_url(); ?>/asset/img/<?= $user['image']; ?>" alt="" width="30" height="30" class="rounded-circle ml-1 img-fluid "><span class="sr-only">(current)</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= base_url() ?>User/Userpenjual"><i class="fas fa-user"></i> <?= $user['name']; ?></a>
                                    <a class="dropdown-item" href="<?= base_url(); ?>Auth/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    <?php endif; ?>
                <?php else : ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url() ?>Admin/index"><?= $user['name']; ?><span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</nav>


<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url(); ?>asset/img/slider-image1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url(); ?>asset/img/testimonial-bg.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url(); ?>asset/img/slider-image3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
</div>

<form class="form-inline mt-5 justify-content-center" method="POST">
    <div class="input-group input-group-lg col-lg-8 mt-5">
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" type="search" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off">
        <button class="btn btn-outline-danger btn-sm my-2 my-sm-0 mt-1 col-lg-2" type=" submit"><i class="fas fa-search"></i></button>
    </div>
</form>

<?php if (empty($product)) : ?>
    <div class="alert alert-danger" role="alert">
        Menu tidak ada atau tidak ditemukan
    </div>
<?php endif; ?>

<div class="container-fluid mt-5">
    <div class="row">
        <?php foreach ($product as $pr) : ?>
            <div class="col-lg-6 mt-3">
                <div class="card shadow">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url(); ?>asset/img/<?= $pr['foto']; ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $pr['nama']; ?></h5>
                                <p class="card-text">Rp.<?= number_format($pr['harga'], 0, ',', '.'); ?></p>
                                <?php if (!$this->session->userdata('username')) : ?>
                                    <a href="<?= base_url(); ?>Home/addcart/<?= $pr['id_product'] ?>" class="btn btn-danger"><i class="fas fa-cart-plus"></i> Cart</a>
                                    <a href="<?= base_url(); ?>Home/detail/<?= $pr['id_product'] ?>" class="btn btn-success"><i class="fas fa-eye"></i> Detail</a>
                                    <a href="<?= base_url(); ?>Home/kantin/<?= $pr['user'] ?>" class="btn btn-info"><i class="fas fa-store"></i> Kantin</a>
                                <?php else : ?>
                                    <?php
                                    $role = $this->session->userdata('role_id');
                                    $tipe = $this->session->userdata('tipe');
                                    ?>
                                    <?php if ($role > 1) : ?>
                                        <?php if ($tipe != "Penjual") : ?>
                                            <a href="<?= base_url(); ?>Home/addcart/<?= $pr['id_product'] ?>" class="btn btn-danger"><i class="fas fa-cart-plus"></i> Cart</a>
                                            <a href="<?= base_url(); ?>Home/detail/<?= $pr['id_product'] ?>" class="btn btn-success"><i class="fas fa-eye"></i> Detail</a>
                                            <a href="<?= base_url(); ?>Home/kantin/<?= $pr['user'] ?>" class="btn btn-info"><i class="fas fa-store"></i> Kantin</a>
                                        <?php else : ?>
                                            <a href="<?= base_url(); ?>Home/detail/<?= $pr['id_product'] ?>" class="btn btn-success"><i class="fas fa-eye"></i> Detail</a>
                                            <a href="<?= base_url(); ?>Home/kantin/<?= $pr['user'] ?>" class="btn btn-info"><i class="fas fa-store"></i> Kantin</a>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <a href="<?= base_url(); ?>Home/detail/<?= $pr['id_product'] ?>" class="btn btn-success"><i class="fas fa-eye"></i> Detail</a>
                                        <a href="<?= base_url(); ?>Home/kantin/<?= $pr['user'] ?>" class="btn btn-info"><i class="fas fa-store"></i> Kantin</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php echo $this->pagination->create_links(); ?>

<footer class="py-5 col-lg-12 mt-5" style="background-color: #CE3232;">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
</footer>

<script type="text/javascript">
    $('.carousel').carousel({
        interval: 1000
    });
</script>