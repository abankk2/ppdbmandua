<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var url = "<?php echo site_url('auth/add_ajax_kab'); ?>/" + $(this).val();
            $('#kabupaten').load(url);
            return false;
        })

        $("#kabupaten").change(function() {
            var url = "<?php echo site_url('auth/add_ajax_kec'); ?>/" + $(this).val();
            $('#kecamatan').load(url);
            return false;
        })

        $("#kecamatan").change(function() {
            var url = "<?php echo site_url('auth/add_ajax_des'); ?>/" + $(this).val();
            $('#desa').load(url);
            return false;
        })

    });
</script>

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
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="provinsi" class="form-select form-select" id="provinsi">
                                        <option>- Pilih Provinsi -</option>
                                        <?php
                                        foreach ($provinsi as $prov) {
                                            echo '<option value="' . $prov->id . '">' . $prov->provinsi . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="kabupaten" class="form-select form-select" id="kabupaten">
                                            <option value=''>Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="kecamatan" class="form-select form-select" id="kecamatan">
                                            <option>Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="des" class="form-select form-select" id="desa">
                                            <option>Nama Sekolah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="sekolah" placeholder="NPSN" value="<?= set_value('name'); ?>">
                            </div>
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
                        <div class="text-center mt-1"><a href="<?= base_url('/'); ?>">Kembali Ke Halaman Utama</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- Get Pangkalan -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#provinsi').on('input', function() {

            var provinsi = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('user/get_prov'); ?>",
                dataType: "JSON",
                data: {
                    provinsi: provinsi
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(provinsi, provinsi) {
                        $('[name="prov"]').val(data.provinsi);
                    });

                }
            });
            return false;
        });

        $('#kabupaten').on('input', function() {

            var kabupaten = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('user/get_kab'); ?>",
                dataType: "JSON",
                data: {
                    kabupaten: kabupaten
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(kabupaten, kabupaten) {
                        $('[name="kab"]').val(data.kabupaten);
                    });

                }
            });
            return false;
        });

        $('#kecamatan').on('input', function() {

            var kecamatan = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('user/get_kec'); ?>",
                dataType: "JSON",
                data: {
                    kecamatan: kecamatan
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(kecamatan, kecamatan) {
                        $('[name="kec"]').val(data.kecamatan);
                    });

                }
            });
            return false;
        });

        $('#desa').on('input', function() {

            var desa = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('user/get_des'); ?>",
                dataType: "JSON",
                data: {
                    desa: desa
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(desa, desa) {
                        $('[name="desa"]').val(data.desa);
                    });

                }
            });
            return false;
        });

    });
</script>