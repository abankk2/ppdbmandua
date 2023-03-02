<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <div class="text-center mb-4">
                            <img src="<?= base_url('assets/img'); ?>/icon.png" class="img-fluid" alt="logo MAN 2" style="max-width: 40%;">
                            <h1 class="h4 text-gray-900">Membuat Akun Pendaftaran</h1>
                            <p>PPDB MAN 2 Kota Cirebon</p>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="NISN" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary btn-user" type="submit">Buat Akun Pendaftaran</button>
                            </div>

                        </form>
                        <hr>
                        <!-- <div class="text-center">
                            <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                        </div> -->
                        <div class="text-center">
                            Sudah Mempunyai Akun? Login<a class="small" href="<?= base_url('auth'); ?>"> disini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>