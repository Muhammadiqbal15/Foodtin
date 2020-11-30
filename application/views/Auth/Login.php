<div class="login-box">
    <div class="login-logo">
        <h4 style="color: white;">Food.Tin</h4>
    </div>
    <!-- /.login-logo -->
    <div class="regist" data-regist="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="invalidlogin" data-invalid="<?= $this->session->flashdata('invalid'); ?>"></div>
    <div class="noactive" data-noactive="<?= $this->session->flashdata('notactive'); ?>"></div>
    <div class="falsepass" data-falsepass="<?= $this->session->flashdata('falsepass'); ?>"></div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Masuk</p>

            <form action="<?= base_url('Auth/index'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">
                    <?= form_error('username'); ?>
                </small>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="pass">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">
                    <?= form_error('pass'); ?>
                </small>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger btn-block">Masuk</button>
                    </div>
                </div>
            </form>

            <div class="mt-3">
                <p class="mb-1">
                    <a href="forgot-password.html">Lupa Password?</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('Auth/regis'); ?>" class="text-center">Buat Akun?</a>
                </p>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>