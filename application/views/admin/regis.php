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

<script src='https://kit.fontawesome.com/76a945766d.js' crossorigin='anonymous'></script>

<?= $this->session->flashdata('message'); ?>
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Daftar Akun Siswa
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="row justify-content-center">
                    <div class="col-md">
                        <div class="card p-3">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <div class="text-center mb-4">
                                        <img src="<?= base_url('assets/img'); ?>/icon.png" class="mb-3" alt="logo MAN 2" style="max-width: 20%;">
                                        <h1 class="h4 text-gray-900">Membuat Akun Pendaftaran</h1>
                                        <p>PPDB MAN 2 Kota Cirebon</p>
                                    </div>

                                    <form class="user" method="post" action="<?= base_url('admin/registration'); ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Sekolah Asal</p>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
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
                                                            <select name="kabupaten" class="form-select form-select" id="kabupaten" required>
                                                                <option>Pilih Kabupaten</option>
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
                                                            <select name="sekolah" class="form-select form-select" id="desa">
                                                                <option>Nama Sekolah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <small class="text-primary mb-3"><i class="fa-solid fa-triangle-exclamation"></i> Jika Nama Sekolah Anda Tidak Terdaftar Hubungi <a class="text-danger" href="<?= base_url('home/kontak'); ?>">Kami</a></small>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-user" name="id_skolah" placeholder="NPSN/NSM" readonly required>
                                                            <?= form_error('id_skolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <input type="text" class="form-control form-control-user d-none" name="nama_sekolah" placeholder="Sekolah" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <select class="form-select" name="jalur" required>
                                                                <option selected disabled>Jalur Masuk</option>
                                                                <option value="1">Prestasi</option>
                                                                <option value="2">Reguler</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="text" name="prov_sekolah" class="form-control d-none">
                                                <input type="text" name="kab_sekolah" class=" form-control d-none">
                                                <input type=" text" name="kec_sekolah" class=" form-control d-none">

                                            </div>
                                            <div class="col-md-6">
                                                <p>Username</p>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="NISN" value="<?= set_value('email'); ?>">
                                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 ">
                                                        <select class="form-select" name="jk" required>
                                                            <option selected disabled>Jenis Kelamin</option>
                                                            <option value="1">Laki - Laki</option>
                                                            <option value="2">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 mb-3 ">
                                                        <input type="number" class="form-control form-control-user" id="whatsapp" name="no_hp" placeholder="No. Whatsapp" value="<?= set_value('whatsapp'); ?>" required>
                                                    </div>
                                                    <div class="col-sm-6 mb-3 ">
                                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                                    </div>
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-success btn-user" type="submit">Buat Akun Pendaftaran</button>
                                                </div>
                                                <hr>

                                                <div class="text-center">
                                                    Sudah Mempunyai Akun? Login<a class="small" href="<?= base_url('auth'); ?>"> disini</a>
                                                </div>
                                                <div class="text-center mt-1"><a href="<?= base_url('/'); ?>">Kembali Ke Halaman Utama</a></div>

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Daftar Akun Admin
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form class="user" method="post" action="<?= base_url('admin/registration2'); ?>">
                                    <p>Username</p>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="name" required name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" required name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-select" required>
                                            <option selected disabled></option>
                                            <option value="1">Operator</option>
                                            <option value="4">Panitia Waka/BK</option>
                                        </select>
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
                                        <button class="btn btn-success btn-user" type="submit">Buat Akun Panitia</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Registrasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1; ?>
                                            <?php foreach ($admin as $adm) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $adm['name']; ?></td>
                                                    <td><?= $adm['email']; ?></td>
                                                    <td><?= date('d M Y', $adm['date_created']); ?></td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript">
    $(document).ready(function() {
        $('#desa').on('input', function() {

            var desa = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('auth/get_sekolah'); ?>",
                dataType: "JSON",
                data: {
                    desa: desa
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(desa, id_skolah) {
                        $('[name="id_skolah"]').val(data.id_skolah);
                        $('[name="nama_sekolah"]').val(data.nama_sekolah);
                    });

                }
            });
            return false;
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#provinsi').on('input', function() {

            var provinsi = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('auth/get_prov'); ?>",
                dataType: "JSON",
                data: {
                    provinsi: provinsi
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(provinsi, provinsi) {
                        $('[name="prov_sekolah"]').val(data.provinsi);
                    });

                }
            });
            return false;
        });

        $('#kabupaten').on('input', function() {

            var kabupaten = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('auth/get_kab'); ?>",
                dataType: "JSON",
                data: {
                    kabupaten: kabupaten
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(kabupaten, kabupaten) {
                        $('[name="kab_sekolah"]').val(data.kabupaten);
                    });

                }
            });
            return false;
        });

        $('#kecamatan').on('input', function() {

            var kecamatan = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('auth/get_kec'); ?>",
                dataType: "JSON",
                data: {
                    kecamatan: kecamatan
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(kecamatan, kecamatan) {
                        $('[name="kec_sekolah"]').val(data.kecamatan);
                    });

                }
            });
            return false;
        });

    });
</script>