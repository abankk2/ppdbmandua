<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container ">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <div class="text-center mb-3">
                            <img src="<?= base_url('assets/img'); ?>/icon.png" class="img-fluid" alt="logo MAN 2" style="max-width: 30%;">
                        </div>
                        <h1>L O G I N</h1>
                        <p class="account-subtitle">PPDB MAN 2 Kota Cirebon</p>
                        <?= $this->session->flashdata('message'); ?>
                        <form method="post" action="<?= base_url('auth'); ?>">
                            <div class="form-group">
                                <label class="form-control-label">NISN</label>
                                <input type="text" name="email" class="form-control">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="form-control pass-input">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <button class="btn btn-sm mt-3 btn-block btn-success w-100" type="submit">Login</button>


                            <div class="text-center mt-3">Belum Punya Akun? Daftar <a href="<?= base_url('auth/registration'); ?>">disini</a></div>
                            <div class="text-center mt-1"><a href="<?= base_url('/'); ?>">Kembali Ke Halaman Utama</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>