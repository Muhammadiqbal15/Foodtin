<div class="mt-3 col-lg-6">
    <div class="register-logo">
        <h4 style="color: white;">Food.Tin</h4>
    </div>

    <div class="card col-12">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Daftar Akun Baru</p>

            <form action="../../index.html" method="post">
                <div class="form-row">
                    <div class="col">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Nama/Nama Kantin">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-2">
                            <input type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="input-group mb-2">
                            <input type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-2">
                            <input type="password" class="form-control" placeholder="Ulangi password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Nomor Handphone/Whatsapp">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <label for="jurusan">Jurusan</label>
                <select class="form-control mb-2" name="jurusan" id="jurusan">
                    <option value="0">--Pilih Jurusan--</option>
                    <?php foreach ($jurusan as $row) : ?>
                        <option value="<?= $row->id_jurusan; ?>">
                            <?= $row->jurusan; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="kelas">Kelas</label>
                <select class="form-control mb-2" name="kelas" id="kelas">
                    <option value="0">--Pilih Kelas--</option>
                </select>
                <label for="exampleFormControlSelect1">Tipe Akun</label>
                <select class="form-control mb-3">
                    <option>Penjual</option>
                    <option>Pembeli</option>
                </select>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger btn-block">Daftar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="<?= base_url('Auth/index') ?>" class="text-center mt-2">Sudah Punya Akun?</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#jurusan').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?= base_url(); ?>/Auth/get_kelas",
                method: "POST",
                dataType: "json",
                data: {
                    id: id
                },
                success: function(array) {
                    var html = '';
                    for (let index = 0; index < array.length; index++) {
                        html += "<option>" + array[index].kelas + "</option>"
                    }
                    $('#kelas').html(html);
                }
            })
        })
    })
</script>