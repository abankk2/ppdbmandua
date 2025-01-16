<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery-ui.css">

<div class="container">
    <div class="row justify-content-center py-3">
        <div class="col-md-8 text-center">
            <h1 class="text-gray-900">SELAMAT DATANG</h1>
            <h4>Di Web PPDB MAN 2 Kota Cirebon</h4>
            <h5>Tahun Pelajaran 2025/2026</h5>
            <small class="text-danger">Jika tidak mengetahui NPSN Sekolah Asal Anda Klik <a href="https://referensi.data.kemdikbud.go.id/pendidikan/dikdas/020000/1" target="_blank" class="badge rounded-pill bg-primary">disini</a></small>

            <?= $this->session->flashdata('message'); ?>
            <div class="card mt-3">
                <div class="card-body">
                    <form method="post" action="<?= base_url('admin/regis_siswa'); ?>">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">NPSN SEKOLAH ASAL</label>
                                    <input type="text" id="title" name="title" class="form-control" required placeholder="NPSN">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">STATUS</label>
                                    <input type="text" name="status" class="form-control" required readonly>
                                    <input type="text" name="nsm" class="form-control d-none" required readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NAMA SEKOLAH</label>
                                    <input type="text" name="description" class="form-control" readonly>
                                    <div id="passwordHelpBlock" class="form-text">
                                        Pastikan Nama Sekolah terisi <b class="text-danger">Otomatis</b> Jika Tidak terisi Daftarkan Sekolah <a href="<?= base_url('daftar/daftar_sekolah'); ?>" class="badge bg-primary">Disini</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="NISN" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <select class="form-select" name="jk" required>
                                    <option selected disabled>Jenis Kelamin</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <select class="form-select" name="jalur" required>
                                    <option selected disabled>Jalur Pendaftaran</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <input type="number" class="form-control form-control-user" id="whatsapp" name="no_hp" placeholder="No. Whatsapp" value="<?= set_value('whatsapp'); ?>" required>
                            </div>
                            <div class="col-md-6 mb-3 ">
                                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                            </div>
                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-success btn-user" type="submit">Buat Akun Pendaftaran</button>
                            </div>
                            <hr>

                            <div class="text-center">
                                Sudah Mempunyai Akun? Login<a class="small" href="<?= base_url('auth'); ?>"> disini</a>
                            </div>
                            <div class="text-center mt-1"><a href="<?= base_url('/'); ?>">Kembali Ke Halaman Utama</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="<?= base_url('assets/'); ?>js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-ui.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#title').autocomplete({
            source: "<?= site_url('daftar/get_autocomplete'); ?>",

            select: function(event, ui) {
                $('[name="title"]').val(ui.item.label);
                $('[name="description"]').val(ui.item.description);
                $('[name="status"]').val(ui.item.status);
                $('[name="nsm"]').val(ui.item.nsm);
            }
        });

    });
</script>