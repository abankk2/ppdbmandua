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
                    <a href="<?= base_url('user/edit_tinggal'); ?>" class="nav-link active">
                        <i class="fa-solid fa-house"></i> <span>Tempat Tinggal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_ortu'); ?>" class="nav-link">
                        <i class="fa-solid fa-users-gear"></i> <span>Orang Tua</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_wali'); ?>" class="nav-link">
                        <i class="fa-solid fa-user-tie"></i> <span>Wali Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_skolah'); ?>" class="nav-link">
                        <i class="fa-solid fa-school"></i> <span>Sekolah Asal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_dok'); ?>" class="nav-link">
                        <i class="fa-solid fa-file-pdf"></i> <span>Dokumen</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
    <div class="col-xl-9 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tempat Tinggal</h5>
            </div>
            <div class="card-body">

                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Status Tinggal</label>
                                <select class="form-select" name="status_tinggal_siswa" required>
                                    <option value="<?= $siswa['status_tinggal_siswa']; ?>" selected disabled><?= $siswa['status_tinggal_siswa']; ?></option>
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
                                <label class="form-label">Provinsi</label>
                                <input type="number" name="nik" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kab./Kota</label>
                                <input type="number" name="nik" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kecamatan</label>
                                <input type="number" name="nik" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kel./Desa</label>
                                <input type="number" name="nik" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kode POS</label>
                                <input type="number" name="kodepos_siswa" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Detail Alamat</label>
                                <textarea class="form-control" value="Hallo" name="alamat_siswa" rows="2" required><?= $siswa['alamat_siswa']; ?></textarea>
                                <div id="emailHelp" class="form-text">Contoh : Jl. Salam Raya II Gg. Salam 10 No. 87 Rt.06 Rw. 03</div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label class="form-label">Kordinat</label>
                                <input type="text" name="kordinat" value="<?= $siswa['kordinat']; ?>" class="form-control">
                                <div id="emailHelp" class="form-text">Titik Lokasi Rumah di Google Maps Contoh : -6.747611, 108.521944</div>
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