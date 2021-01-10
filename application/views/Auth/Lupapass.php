<div class="login-box">
    <div class="login-logo">
        <h4 style="color: white;">Food.Tin</h4>
    </div>
    <!-- /.login-logo -->
    <div class="regist" data-regist="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="invalidlogin" data-invalid="<?= $this->session->flashdata('invalid'); ?>"></div>
    <div class="noactive" data-noactive="<?= $this->session->flashdata('notactive'); ?>"></div>
    <div class="falsepass" data-falsepass="<?= $this->session->flashdata('falsepass'); ?>"></div>
    <div class="activate" data-activate="<?= $this->session->flashdata('activate'); ?>"></div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Lupa Password</p>
            <?= $this->session->flashdata('eroremail'); ?>
            <form action="<?= base_url('Auth/forgotPassword'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">
                    <?= form_error('email'); ?>
                </small>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger btn-block">Reset Password</button>
                    </div>
                </div>
            </form>

            <div class="mt-3">
                <p class="mb-0">
                    <a href="<?= base_url('Auth/index'); ?>" class="text-center">Kembali Ke Login</a>
                </p>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>