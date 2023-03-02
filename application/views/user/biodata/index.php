<div class="row">
    <div class="col-xl-3 col-md-4">
        <div class="widget settings-menu">
            <ul>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit'); ?>" class="nav-link active">
                        <i class="far fa-user"></i> <span>Biodata</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit'); ?>" class="nav-link">
                        <i class="far fa-user"></i> <span>Biodata</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
    <div class="col-xl-9 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Biodata Diri</h5>
            </div>
            <div class="card-body">

                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">NISN / Username</label>
                                <input type="text" name="nisn" value="<?= $siswa['nisn']; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" value="<?= $siswa['tempat_lahir']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Tgl. Lahir</label>
                                <input type="date" name="tgl_lahir" value="<?= $siswa['tgl_lahir']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jk" required>
                                    <?php if ($siswa['jk'] == 1) { ?>
                                        <option value="<?= $siswa['jk']; ?>" disabled>Laki - Laki</option>
                                    <?php } else if ($siswa['jk'] == 2) { ?>
                                        <option value="<?= $siswa['jk']; ?>" disabled>Perempuan</option>
                                    <?php } else if ($siswa['jk'] == 0) { ?>
                                        <option></option>
                                    <?php } ?>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Gol Darah</label>
                                <select class="form-select" name="golongandarah" required>
                                    <option selected disabled></option>
                                    <option value="1">A</option>
                                    <option value="2">AB</option>
                                    <option value="3">B</option>
                                    <option value="4">O</option>
                                    <option value="5">Belum di Cek</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Agama</label>
                                <input type="text" name="agama" value="Islam" class="form-control" readonly required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input type="number" name="nik" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class=" text-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>