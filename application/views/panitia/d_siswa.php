<style>
    .form-control {
        border: 0;
    }
</style>

<div class="row justify-content-lg-center">
    <div class="col-lg-12">

        <div class="profile-cover">
            <div class="profile-cover-wrap">
                <!-- <img class="profile-cover-img" src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" alt=" Profile Cover"> -->
                <div class="cover-content">

                </div>

            </div>
        </div>
        <div class="text-center mb-5">
            <label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
                <img class="avatar-img" src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" alt="Profile Image">
            </label>
            <h2><?= $siswa['nama_siswa']; ?></h2>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <i class="fa-solid fa-user-graduate"></i> <?= $siswa['nisn']; ?>
                </li>
                <li class="list-inline-item">
                    <i class="fa-regular fa-address-book"></i> <span><?= $siswa['no_daftar']; ?></span>
                </li>
                <li class="list-inline-item">
                    <i class="far fa-calendar-alt"></i> <span>Daftar <?= date('d F Y', $siswa['date_created']); ?></span>
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
                        <h5><?= $siswa['nama_siswa']; ?></h5>
                        <p class="mb-1">NISN</p>
                        <h5><?= $siswa['nisn']; ?></h5>
                        <p class="mb-1">NIK</p>
                        <h5><?= $siswa['nik']; ?></h5>
                        <p class="mb-1">No. Registrasi</p>
                        <h5><?= $siswa['no_daftar']; ?></h5>
                        <p class="mb-1">Tgl. Registrasi</p>
                        <h5><?= date('d F Y', $siswa['date_created']); ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td><?= $siswa['tempat_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td>Tgl. Lahir</td>
                                <td>:</td>
                                <td><?= date('d F Y', strtotime($siswa['tgl_lahir'])); ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?php if ($siswa['jk'] == 1) { ?>
                                        Laki - Laki
                                    <?php } else if ($siswa['jk'] == 2) { ?>
                                        Perempuan
                                    <?php } else if ($siswa['jk'] == NULL) { ?>

                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Anak Ke</td>
                                <td>:</td>
                                <td><?= $siswa['anak_ke']; ?></td>
                            </tr>
                            <tr>
                                <td>Saudara</td>
                                <td>:</td>
                                <td><?= $siswa['saudara']; ?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td><?= $siswa['agama']; ?></td>
                            </tr>
                            <tr>
                                <td>Cita - Cita</td>
                                <td>:</td>
                                <td><?= $siswa['cita']; ?></td>
                            </tr>
                            <tr>
                                <td>Hobi</td>
                                <td>:</td>
                                <td><?= $siswa['hobi']; ?></td>
                            </tr>
                            <tr>
                                <td>Whatsapp</td>
                                <td>:</td>
                                <td><?= $siswa['no_hp']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $siswa['emails']; ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <!-- Status Tempat Tinggal -->
            <h4>Status Tinggal <?= $siswa['status_tinggal_siswa']; ?></h4>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td><?= $siswa['prov']; ?></td>
                            </tr>
                            <tr>
                                <td>Kab./Kota</td>
                                <td>:</td>
                                <td><?= $siswa['kab']; ?></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td><?= $siswa['kec']; ?></td>
                            </tr>
                            <tr>
                                <td>Kel./Desa</td>
                                <td>:</td>
                                <td><?= $siswa['desa']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat </td>
                                <td>:</td>
                                <td><?= $siswa['alamat_siswa']; ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>Kode POS</td>
                                <td>:</td>
                                <td><?= $siswa['kodepos_siswa']; ?></td>
                            </tr>
                            <tr>
                                <td>Kordinat</td>
                                <td>:</td>
                                <td><?= $siswa['kordinat']; ?></td>
                            </tr>
                            <tr>
                                <td>Jarak</td>
                                <td>:</td>
                                <td><?= $siswa['jarak']; ?> KM</td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td>:</td>
                                <td><?= $siswa['waktu']; ?> Menit</td>
                            </tr>
                            <tr>
                                <td>Biaya Sekolah</td>
                                <td>:</td>
                                <td><?= $siswa['biaya_sekolah']; ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

            <!-- Informasi Lainnya -->
            <h4>Informasi Lainnya</h4>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Kebutuhan Disabilitas</h5>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>Keb. Khusus</td>
                                <td>:</td>
                                <td><?php if ($siswa['keb_khusus'] == 1) { ?>
                                        Ya
                                    <?php } else if ($siswa['keb_khusus'] == 0) { ?>
                                        Tidak
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Keb. Disabilitas</td>
                                <td>:</td>
                                <td><?php if ($siswa['keb_disabilitas'] == 1) { ?>
                                        Ya
                                    <?php } else if ($siswa['keb_disabilitas'] == 0) { ?>
                                        Tidak
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                        <h5>Pra Sekolah</h5>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>TK</td>
                                <td>:</td>
                                <td><?= $siswa['tk']; ?></td>
                            </tr>
                            <tr>
                                <td>PAUD</td>
                                <td>:</td>
                                <td><?= $siswa['paud']; ?></td>
                            </tr>
                        </table>
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
                        <div class="form-group row mb-0">
                            <label class="col-4 col-form-label">No. KK</label>
                            <div class="col-8">
                                <div class="form-control">: <?= $siswa['no_kk']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-4 col-form-label">Kep. Keluarga</label>
                            <div class="col-8">
                                <div class="form-control">: <?= $siswa['kepala_keluarga']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orangtua Ayah-->
            <h4>Data Keluarga</h4>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Data Ayah</h5>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Nama</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['nama_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Status</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['status_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">NIK Ayah</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['nik_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Tempat Lahir</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['tempat_lahir_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Tgl. Lahir</label>
                            <div class="col-7">
                                <div class="form-control">: <?= date('d F Y', strtotime($siswa['tgl_lahir_ayah'])); ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Pendidikan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['pendidikan_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Pekerjaan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['pekerjaan_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Penghasilan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['penghasilan_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">No. Hp</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['no_hp_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Provinsi</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['prov_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kab./Kota</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kab_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kecamatan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kec_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kel./Desa</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['desa_ayah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Alamat</label>
                            <div class="col-7">
                                <textarea class="form-control" rows="2">: <?= $siswa['alamat_ayah']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kode POS</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kodepos_ayah']; ?></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Ibu -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Data Ibu</h5>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Nama</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['nama_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Status</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['status_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">NIK Ayah</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['nik_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Tempat Lahir</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['tempat_lahir_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Tgl. Lahir</label>
                            <div class="col-7">
                                <div class="form-control">: <?= date('d F Y', strtotime($siswa['tgl_lahir_ibu'])); ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Pendidikan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['pendidikan_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Pekerjaan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['pekerjaan_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Penghasilan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['penghasilan_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">No. Hp</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['no_hp_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Provinsi</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['prov_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kab./Kota</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kab_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kecamatan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kec_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kel./Desa</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['desa_ibu']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Alamat</label>
                            <div class="col-7">
                                <textarea class="form-control" rows="2">: <?= $siswa['alamat_ibu']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kode POS</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kodepos_ibu']; ?></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Wali -->
            <div class="col-md-6">
                <h4>Data Wali</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Nama</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['nama_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Status</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['status_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">NIK Ayah</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['nik_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Tempat Lahir</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['tempat_lahir_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Tgl. Lahir</label>
                            <div class="col-7">
                                <div class="form-control">: <?= date('d F Y', strtotime($siswa['tgl_lahir_wali'])); ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Pendidikan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['pendidikan_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Pekerjaan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['pekerjaan_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Penghasilan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['penghasilan_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">No. Hp</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['no_hp_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Status Tempat Tinggal</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['status_tmp_tinggal_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Provinsi</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['prov_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kab./Kota</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kab_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kecamatan</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kec_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kel./Desa</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['desa_wali']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Alamat</label>
                            <div class="col-7">
                                : <?= $siswa['alamat_wali']; ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-5 col-form-label">Kode POS</label>
                            <div class="col-7">
                                <div class="form-control">: <?= $siswa['kodepos_wali']; ?></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Sekolah Asal -->
            <!-- Wali -->
            <div class="col-md-6">
                <h4>Data Sekolah Asal</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <label class="col-4 col-form-label">Nama</label>
                            <div class="col-8">
                                : <?= $siswa['asal_sekolah']; ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-4 col-form-label">NPSN/NSM</label>
                            <div class="col-8">
                                <div class="form-control">: <?= $siswa['npsn_sekolah']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-4 col-form-label">Tahun Lulus</label>
                            <div class="col-8">
                                <div class="form-control">: <?= $siswa['tahun_lulus']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-4 col-form-label">No. SKHUN</label>
                            <div class="col-8">
                                <div class="form-control">: <?= $siswa['no_skhun']; ?></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-4 col-form-label">No. Ijazah</label>
                            <div class="col-8">
                                <div class="form-control">: <?= $siswa['seri_ijazah']; ?></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>