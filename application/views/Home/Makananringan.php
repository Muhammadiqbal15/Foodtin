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
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>Home/Makring">MakananRingan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>Home/Makber">MakananBerat</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>Home/Minuman">Minuman</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>Auth/index">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>Auth/regis">Registrasi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<form class="form-inline mt-5 justify-content-center" method="POST">
    <div class="input-group input-group-lg col-lg-8 mt-5">
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" type="search" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off">
        <button class="btn btn-outline-danger btn-sm my-2 my-sm-0 mt-1 col-lg-2" type=" submit"><i class="fas fa-search"></i></button>
    </div>
</form>

<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-lg-6 mt-3">
            <div class="card shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>asset/img/14.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Chitato</h5>
                            <p class="card-text">Rp2.000</p>
                            <button class="btn btn-danger"><i class="fas fa-cart-plus"></i> Cart</button>
                            <button class="btn btn-success"><i class="fas fa-eye"></i> Detail</button>
                            <button class="btn btn-dark"><i class="fas fa-store"></i> Kantin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-3">
            <div class="card shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>asset/img/15.png" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Tango Wafer</h5>
                            <p class="card-text">Rp2.000</p>
                            <button class="btn btn-danger"><i class="fas fa-cart-plus"></i> Cart</button>
                            <button class="btn btn-success"><i class="fas fa-eye"></i> Detail</button>
                            <button class="btn btn-dark"><i class="fas fa-store"></i> Kantin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mt-3">
            <div class="card shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>asset/img/16.jpg" class="card-img " alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nabati Wafer</h5>
                            <p class="card-text">Rp2.000</p>
                            <button class="btn btn-danger"><i class="fas fa-cart-plus"></i> Cart</button>
                            <button class="btn btn-success"><i class="fas fa-eye"></i> Detail</button>
                            <button class="btn btn-dark"><i class="fas fa-store"></i> Kantin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-3">
            <div class="card shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>asset/img/17.jpg" class="card-img " alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Chocolatos Wafer Roll</h5>
                            <p class="card-text">Rp1.000</p>
                            <button class="btn btn-danger"><i class="fas fa-cart-plus"></i> Cart</button>
                            <button class="btn btn-success"><i class="fas fa-eye"></i> Detail</button>
                            <button class="btn btn-dark"><i class="fas fa-store"></i> Kantin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mt-3">
            <div class="card shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>asset/img/18.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Aneka Gorengan</h5>
                            <p class="card-text">Rp1.000</p>
                            <button class="btn btn-danger"><i class="fas fa-cart-plus"></i> Cart</button>
                            <button class="btn btn-success"><i class="fas fa-eye"></i> Detail</button>
                            <button class="btn btn-dark"><i class="fas fa-store"></i> Kantin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-3">
            <div class="card shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>asset/img/19.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Lays</h5>
                            <p class="card-text">Rp2.000</p>
                            <button class="btn btn-danger"><i class="fas fa-cart-plus"></i> Cart</button>
                            <button class="btn btn-success"><i class="fas fa-eye"></i> Detail</button>
                            <button class="btn btn-dark"><i class="fas fa-store"></i> Kantin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<nav aria-label="..." class="mt-5 ml-5">
    <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>

<footer class="py-5 col-lg-12 mt-5" style="background-color: #CE3232;">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
</footer>