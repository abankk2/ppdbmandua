<style>
    .form-control {
        border: 0;
    }
</style>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow p-3">
            <form method="post" action="<?= base_url('admin/Bkunci'); ?>">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1">Nama Lengkap</p>
                        <h5><?= $siswa['nama_siswa']; ?></h5>
                        <p class="mb-1">No. Registrasi</p>
                        <h5><?= $siswa['no_daftar']; ?></h5>
                        <p class="mb-1">Tgl. Registrasi</p>
                        <h5><?= date('d F Y', $siswa['date_created']); ?></h5>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1">NISN</p>
                        <h5><?= $siswa['nisn']; ?></h5>
                        <p class="mb-1">NIK</p>
                        <h5><?= $siswa['nik']; ?></h5>
                        <p class="mb-1">STATUS</p>
                        <select class="form-select" name="kunci" required>
                            <?php if ($siswa['kunci'] == 0) { ?>
                                <option selected value="<?= $siswa['kunci']; ?>">Terbuka</option>
                            <?php } else if ($siswa['kunci'] == 1) { ?>
                                <option selected value="<?= $siswa['kunci']; ?>">Terkunci</option>
                            <?php } ?>
                            <option disabled>===</option>
                            <option value="0">Buka</option>
                            <option value="1">Kunci</option>
                        </select>
                        <input name="nisn" value="<?= $siswa['nisn']; ?>" class="d-none">
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>