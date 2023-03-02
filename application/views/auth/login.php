<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container ">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
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

                            <button class="btn btn-sm mt-3 btn-block btn-primary w-100" type="submit">Login</button>


                            <div class="text-center dont-have">Don't have an account yet? <a href="<?= base_url('auth/registration'); ?>">Register</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>