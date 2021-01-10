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
            <p class="login-box-msg">Ubah Password Mu Untuk</p>
            <p><?= $this->session->userdata('reset_email'); ?></p>
            <?= $this->session->flashdata('eroremail'); ?>
            <form action="<?= base_url('Auth/changePassword'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="New Password" name="pass1">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">
                    <?= form_error('pass1'); ?>
                </small>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Confirm New Password" name="pass2">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">
                    <?= form_error('pass2'); ?>
                </small>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger btn-block">Ubah Password</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>