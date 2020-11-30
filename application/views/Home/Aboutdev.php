<nav class="navbar navbar-expand-lg navbar-dark fixed-top mb-5" style="background-color: #CE3232;">
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
                <?php $role = $this->session->userdata('role_id');  ?>
                <?php if ($role > 1) : ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url() ?>User/index"><?= $user['name']; ?>
                                <img src="<?= base_url(); ?>/asset/img/<?= $user['image']; ?>" alt="" width="30" height="30" class="rounded-circle ml-1 img-fluid "><span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                <?php else : ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url() ?>Admin/index"><?= $user['nama']; ?><span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</nav>


<div class="jumbotron jumbotron-fluid">
    <h1 class="display-4">About Developer</h1>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-3 mt-5 shadow-lg">
                <div class=" row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>asset/img/Dev1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">Anugrah Muhammad Syarif</h4>
                            <h5 class="card-title">UI/UX Design</h5>
                            <ul>
                                <li>Cras justo odio</li>
                                <li>Dapibus ac fa cilisis in</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-3 mt-5 shadow-lg">
                <div class=" row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>asset/img/Dev2.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">Dwi Kurniawan Rizky</h4>
                            <h5 class="card-title">Front End Developer</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>