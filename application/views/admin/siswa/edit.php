    <div class="row">
        <div class="col-xl-3 col-md-4">
            <div class="widget settings-menu">
                <ul>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>admin/Esiswa/<?= $siswa['nisn']; ?>" class="nav-link active">
                            <i class="far fa-user"></i> <span>Biodata</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>admin/edit_tinggal/<?= $siswa['nisn']; ?>" class="nav-link">
                            <i class="fa-solid fa-house"></i> <span>Tempat Tinggal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>admin/edit_ortu/<?= $siswa['nisn']; ?>" class="nav-link">
                            <i class="fa-solid fa-address-book"></i> <span>Identitas Ayah</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>admin/edit_ortu2/<?= $siswa['nisn']; ?>" class="nav-link">
                            <i class="fa-regular fa-address-book"></i> <span>Identitas Ibu</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>admin/edit_wali/<?= $siswa['nisn']; ?>" class="nav-link">
                            <i class="fa-solid fa-user-tie"></i> <span>Wali Siswa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>admin/edit_sekolah/<?= $siswa['nisn']; ?>" class="nav-link">
                            <i class="fa-solid fa-school"></i> <span>Sekolah Asal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>admin/edit_dok/<?= $siswa['nisn']; ?>" class="nav-link">
                            <i class="fa-solid fa-circle-info"></i> <span>Informasi Lainnya</span>
                        </a>
                    </li>

                    <?php if ($siswa['jalur'] == 1) { ?>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/upload/<?= $siswa['nisn']; ?>" class="nav-link">
                                <i class="fa-solid fa-file-pdf"></i> <span>Dokumen upload</span>
                            </a>
                        </li>
                    <?php } else if ($siswa['jalur'] == 2) { ?>

                    <?php } ?>

                </ul>
            </div>

        </div>
        <div class="col-xl-9 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Biodata Diri</h5>
                </div>
                <div class="card-body">

                    <form method="post" action="<?= base_url('admin/upbiodata'); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NISN / Username</label>
                                    <input type="text" name="nisn" readonly value="<?= $siswa['nisn']; ?>" class="form-control">
                                    <small class="text-danger">NISN Tidak bisa diubah jika ada kesalahan silahkan di tuliskan di dokumen fisik siswa</small>

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
                                            <option value="<?= $siswa['jk']; ?>">Laki - Laki</option>
                                        <?php } else if ($siswa['jk'] == 2) { ?>
                                            <option value="<?= $siswa['jk']; ?>">Perempuan</option>
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
                                        <option value="<?= $siswa['golongandarah']; ?>" selected><?= $siswa['golongandarah']; ?></option>
                                        <option value="A">A</option>
                                        <option value="B">AB</option>
                                        <option value="AB">B</option>
                                        <option value="O">O</option>
                                        <option value="Belum di Cek">Belum di Cek</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="number" name="nik" value="<?= $siswa['nik']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <input type="text" name="agama" value="Islam" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Anak ke</label>
                                    <input type="number" name="anak_ke" value="<?= $siswa['anak_ke']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Jml. Saudara</label>
                                    <input type="number" name="saudara" value="<?= $siswa['saudara']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Cita - Cita</label>
                                    <select class="form-select" name="cita" required>
                                        <option value="<?= $siswa['cita']; ?>" selected><?= $siswa['cita']; ?></option>
                                        <option value="PNS">PNS</option>
                                        <option value="TNI/Porli">TNI/Porli</option>
                                        <option value="Guru/Dosen">Guru/Dosen</option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Politikus">Politikus</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Seniman/Artis">Seniman/Artis</option>
                                        <option value="Ilmuan">Ilmuan</option>
                                        <option value="Agamawan">Agamawan</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Hobi</label>
                                    <select class="form-select" name="hobi" required>
                                        <option value="<?= $siswa['hobi']; ?>" selected><?= $siswa['hobi']; ?></option>
                                        <option value="Kesenian">Kesenian</option>
                                        <option value="Olahraga">Olahraga</option>
                                        <option value="Membaca">Membaca</option>
                                        <option value="Menulis">Menulis</option>
                                        <option value="Jalan - Jalan">Jalan - Jalan</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">No. Whatsapp</label>
                                    <input type="number" name="no_hp" value="<?= $siswa['no_hp']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Biaya Sekolah</label>
                                    <select class="form-select" name="biaya_sekolah" required>
                                        <option value="<?= $siswa['biaya_sekolah']; ?>" selected><?= $siswa['biaya_sekolah']; ?></option>
                                        <option value="Ayah">Ayah</option>
                                        <option value="Ibu">Ibu</option>
                                        <option value="Wali">Wali</option>
                                        <option value="Kerabat Keluarga">Kerabat Keluarga</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="emails" value="<?= $siswa['emails']; ?> " class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>