<div class="login-box">
    <div class="login-logo">
        <h4 style="color: white;">Food.Tin</h4>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Masuk</p>

            <form action="../../index3.html" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger btn-block">Masuk</button>
                    </div>
                    <!-- /.col -->
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