<div class="row">
    <div class="col-md-6">
        <h4>Biodata Siswa</h4>
        <div class="card">
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" value="<?= $siswa['nama_siswa']; ?>" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">No. Daftar</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?= $siswa['no_daftar']; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">NISN</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?= $siswa['nisn']; ?>" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <?php if ($siswa['jk'] == 1) { ?>
                            <input type="text" value="Laki - Laki" class="form-control" readonly>
                        <?php } else if ($siswa['jk'] == 2) { ?>
                            <input type="text" value="Perempuan" class="form-control" readonly>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>