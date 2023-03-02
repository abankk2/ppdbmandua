<style>
    .form-control {
        border: 0;
    }
</style>

<div class="row justify-content-lg-center">
    <div class="col-lg-12">

        <div class="profile-cover">
            <div class="profile-cover-wrap">
                <img class="profile-cover-img" src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" alt=" Profile Cover">

                <div class="cover-content">

                </div>

            </div>
        </div>
        <div class="text-center mb-5">
            <label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
                <img class="avatar-img" src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" alt="Profile Image">
            </label>
            <h2><?= $user['name']; ?></h2>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <i class="fa-solid fa-user-graduate"></i> <?= $user['email']; ?>
                </li>
                <li class="list-inline-item">
                    <i class="fa-regular fa-address-book"></i> <span><?= $siswa['no_daftar']; ?></span>
                </li>
                <li class="list-inline-item">
                    <i class="far fa-calendar-alt"></i> <span>Daftar <?= date('d F Y', $user['date_created']); ?></span>
                </li>
            </ul>
        </div>
        <div class="row justify-content-center">
            <!-- Biodata -->
            <h4>Biodata</h4>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-1">Nama Lengkap</p>
                        <h5><?= $user['name']; ?></h5>
                        <p class="mb-1">NISN</p>
                        <h5><?= $user['email']; ?></h5>
                        <p class="mb-1">NIK</p>
                        <h5><?= $siswa['nik']; ?></h5>
                        <p class="mb-1">No. Registrasi</p>
                        <h5><?= $siswa['no_daftar']; ?></h5>
                        <p class="mb-1">No. Whatsapp</p>
                        <h5><?= $siswa['no_hp']; ?></h5>
                        <p class="mb-1">Tgl. Registrasi</p>
                        <h5><?= date('d F Y', $user['date_created']); ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Tempat Lahir</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['tempat_lahir']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Tgl. Lahir</label>
                            <div class="col-9">
                                <div class="form-control">: <?= date('d F Y', strtotime($siswa['tgl_lahir'])); ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-9">
                                <?php if ($siswa['jk'] == 1) { ?>
                                    <div class="form-control">: Laki - Laki</div>
                                <?php } else if ($siswa['jk'] == 2) { ?>
                                    <div class="form-control">: Perempuan</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Anak ke</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['anak_ke']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Saudara</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['saudara']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Agama</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['agama']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Cita - Cita</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['cita']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['emails']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Status Tempat Tinggal -->
            <h4>Status Tinggal <?= $siswa['status_tinggal_siswa']; ?></h4>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Provinsi</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['prov']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Kab/Kota</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['kab']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Kecamatan</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['kec']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Kel/Desa</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['desa']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-3 col-form-label">Alamat</label>
                            <div class="col-9">
                                <div class="form-control">: <?= $siswa['alamat_siswa']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kode POS</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kodepos_siswa']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kordinat</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kordinat']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Jarak</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['jarak']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Waktu</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['waktu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Biaya Sekolah</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['biaya_sekolah']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Lainnya -->
            <h4>Informasi Lainnya</h4>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Kebutuhan Disabilitas</h5>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Keb. Khusus</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['keb_khusus']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Disabelitas</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['keb_disabilitas']; ?></div>
                            </div>
                        </div>
                        <h5>Pra Sekolah</h5>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">TK</label>
                            <div class="col-7">
                                <?php if ($siswa['tk'] == 0) { ?>
                                    <div class="form-control">: Tidak</div>
                                <?php } else if ($siswa['tk'] == 1) { ?>
                                    <div class="form-control">: Iya</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-5 col-form-label">Paud</label>
                            <div class="col-7">
                                <?php if ($siswa['paud'] == 0) { ?>
                                    <div class="form-control">: Tidak</div>
                                <?php } else if ($siswa['paud'] == 1) { ?>
                                    <div class="form-control">: Iya</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Imunisasi</h5>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Hepatitis</label>
                            <div class="col-7">
                                <?php if ($siswa['hepatitis'] == 0) { ?>
                                    <div class="form-control">: Tidak</div>
                                <?php } else if ($siswa['hepatitis'] == 1) { ?>
                                    <div class="form-control">: Iya</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Polio</label>
                            <div class="col-7">
                                <?php if ($siswa['polio'] == 0) { ?>
                                    <div class="form-control">: Tidak</div>
                                <?php } else if ($siswa['polio'] == 1) { ?>
                                    <div class="form-control">: Iya</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">BCG</label>
                            <div class="col-7">
                                <?php if ($siswa['bcg'] == 0) { ?>
                                    <div class="form-control">: Tidak</div>
                                <?php } else if ($siswa['bcg'] == 1) { ?>
                                    <div class="form-control">: Iya</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">DPT</label>
                            <div class="col-7">
                                <?php if ($siswa['dpt'] == 0) { ?>
                                    <div class="form-control">: Tidak</div>
                                <?php } else if ($siswa['dpt'] == 1) { ?>
                                    <div class="form-control">: Iya</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Covid</label>
                            <div class="col-7">
                                <?php if ($siswa['covid'] == 0) { ?>
                                    <div class="form-control">: Tidak</div>
                                <?php } else if ($siswa['covid'] == 1) { ?>
                                    <div class="form-control">: Iya</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Bantuan Sosial</h5>
                        <div class="form-group row mb-0">
                            <label class="col-4 col-form-label">No. KIP</label>
                            <div class="col-8">
                                <div class="form-control">: <?= $siswa['no_kip']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-4 col-form-label">No. KKS</label>
                            <div class="col-8">
                                <div class="form-control">: <?= $siswa['no_kks']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-4 col-form-label">No. PKH</label>
                            <div class="col-8">
                                <div class="form-control">: <?= $siswa['no_pkh']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>