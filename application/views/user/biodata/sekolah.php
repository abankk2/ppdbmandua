<div class="row">
    <div class="col-xl-3 col-md-4">
        <div class="widget settings-menu">
            <ul>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit'); ?>" class="nav-link ">
                        <i class="far fa-user"></i> <span>Biodata</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_tinggal'); ?>" class="nav-link">
                        <i class="fa-solid fa-house"></i> <span>Tempat Tinggal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_ortu'); ?>" class="nav-link">
                        <i class="fa-solid fa-address-book"></i> <span>Identitas Ayah</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_ortu2'); ?>" class="nav-link">
                        <i class="fa-regular fa-address-book"></i> <span>Identitas Ibu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_wali'); ?>" class="nav-link ">
                        <i class="fa-solid fa-user-tie"></i> <span>Wali Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_skolah'); ?>" class="nav-link active">
                        <i class="fa-solid fa-school"></i> <span>Sekolah Asal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_dok'); ?>" class="nav-link">
                        <i class="fa-solid fa-file-pdf"></i> <span>Informasi Lainnya</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
    <div class="col-xl-9 col-md-8">
        <?= $this->session->flashdata('message'); ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Sekolah Asal</h5>
            </div>
            <div class="card-body">

                <form method="post" action="<?= base_url('user/upskolah'); ?>">
                    <div class="row">
                        <h5>Informasi Sekolah</h5>
                        <input type="text" name="nisn" value="<?= $siswa['nisn']; ?>" class="d-none" required>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Nama Sekolah</label>
                                    <input type="text" name="asal_sekolah" value="<?= $siswa['asal_sekolah']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">NPSN/NSM</label>
                                    <input type="text" name="npsn_sekolah" value="<?= $siswa['npsn_sekolah']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tahun Lulus</label>
                                    <select class="form-select" name="tahun_lulus" required>
                                        <option value="<?= $siswa['tahun_lulus']; ?>" selected><?= $siswa['tahun_lulus']; ?></option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">No. SKHUN</label>
                                    <input type="text" name="no_skhun" value="<?= $siswa['no_skhun']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">No. Seri Ijazah</label>
                                    <input type="text" name="seri_ijazah" value="<?= $siswa['seri_ijazah']; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <h5>Siswa Mutasi/Pindahan</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Nama Sekolah</label>
                                    <input type="text" name="asal_sekolah" value="<?= $siswa['asal_sekolah']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">NPSN/NSM</label>
                                    <input type="text" name="npsn_sekolah" value="<?= $siswa['npsn_sekolah']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Status Aktif Siswa</label>
                                    <select class="form-select" name="aktif">
                                        <option value="<?= $siswa['aktif']; ?>" selected><?= $siswa['aktif']; ?></option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                    <div id="emailHelp" class="form-text">Status keaktifan siswa di EMIS atau Dapodik</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">No. Surat Pindah</label>
                                    <input type="text" name="no_surat" value="<?= $siswa['no_surat']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tgl. Surat Pindah</label>
                                    <input type="date" name="tgl_surat" value="<?= $siswa['tgl_surat']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tgl. Mutasi</label>
                                    <input type="date" name="tgl_mutasi" value="<?= $siswa['tgl_mutasi']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Alasan Mutasi</label>
                                    <select class="form-select" name="alasan_mutasi">
                                        <option value="<?= $siswa['alasan_mutasi']; ?>" selected><?= $siswa['alasan_mutasi']; ?></option>
                                        <option value="Kendala Ekonomi">Kendala Ekonomi</option>
                                        <option value="Kendala akademik">Kendala akademik</option>
                                        <option value="Ikut pindah orang tua">Ikut pindah orang tua</option>
                                        <option value="Pelanggaran disiplin">Pelanggaran disiplin</option>
                                        <option value="Pengaruh teman / lingkungan">Pengaruh teman / lingkungan</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
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