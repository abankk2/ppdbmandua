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
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Imunisasi</h5>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>Hepatitis</td>
                                <td>:</td>
                                <td><?php if ($siswa['hepatitis'] == 0) { ?>
                                        Tidak
                                    <?php } else if ($siswa['hepatitis'] == 1) { ?>
                                        Iya
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Polio</td>
                                <td>:</td>
                                <td><?php if ($siswa['polio'] == 0) { ?>
                                        Tidak
                                    <?php } else if ($siswa['polio'] == 1) { ?>
                                        Iya
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>BCG</td>
                                <td>:</td>
                                <td><?php if ($siswa['bcg'] == 0) { ?>
                                        Tidak
                                    <?php } else if ($siswa['bcg'] == 1) { ?>
                                        Iya
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>DPT</td>
                                <td>:</td>
                                <td><?php if ($siswa['dpt'] == 0) { ?>
                                        Tidak
                                    <?php } else if ($siswa['dpt'] == 1) { ?>
                                        Iya
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Covid</td>
                                <td>:</td>
                                <td><?php if ($siswa['covid'] == 0) { ?>
                                        Tidak
                                    <?php } else if ($siswa['covid'] == 1) { ?>
                                        Iya
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Bantuan Sosial</h5>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>No. KIP</td>
                                <td>:</td>
                                <td><?= $siswa['no_kip']; ?></td>
                            </tr>
                            <tr>
                                <td>No. KKS</td>
                                <td>:</td>
                                <td><?= $siswa['no_kks']; ?></td>
                            </tr>
                            <tr>
                                <td>No. PKH</td>
                                <td>:</td>
                                <td><?= $siswa['no_pkh']; ?></td>
                            </tr>
                            <tr>
                                <td>No. PKH</td>
                                <td>:</td>
                                <td><?= $siswa['no_kk']; ?></td>
                            </tr>
                            <tr>
                                <td>Kep. Keluarga</td>
                                <td>:</td>
                                <td><?= $siswa['kepala_keluarga']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Orangtua Ayah-->
            <h4>Data Keluarga</h4>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Data Ayah</h5>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $siswa['nama_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?= $siswa['status_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td><?= $siswa['nik_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td><?= $siswa['tempat_lahir_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Tgl. Lahir</td>
                                <td>:</td>
                                <td><?= date('d F Y', strtotime($siswa['tgl_lahir_ayah'])); ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan</td>
                                <td>:</td>
                                <td><?= $siswa['pendidikan_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td><?= $siswa['pekerjaan_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Penghasilan</td>
                                <td>:</td>
                                <td><?= $siswa['penghasilan_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>No. Hp</td>
                                <td>:</td>
                                <td><?= $siswa['no_hp_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td><?= $siswa['prov_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Kab./Kota</td>
                                <td>:</td>
                                <td><?= $siswa['kab_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td><?= $siswa['kec_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Kel./Desa</td>
                                <td>:</td>
                                <td><?= $siswa['desa_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $siswa['alamat_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Kode POS</td>
                                <td>:</td>
                                <td><?= $siswa['kodepos_ayah']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Ibu -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Data Ibu</h5>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $siswa['nama_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?= $siswa['status_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td><?= $siswa['nik_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td><?= $siswa['tempat_lahir_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Tgl. Lahir</td>
                                <td>:</td>
                                <td><?= date('d F Y', strtotime($siswa['tgl_lahir_ibu'])); ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan</td>
                                <td>:</td>
                                <td><?= $siswa['pendidikan_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td><?= $siswa['pekerjaan_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Penghasilan</td>
                                <td>:</td>
                                <td><?= $siswa['penghasilan_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>No. Hp</td>
                                <td>:</td>
                                <td><?= $siswa['no_hp_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td><?= $siswa['prov_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Kab./Kota</td>
                                <td>:</td>
                                <td><?= $siswa['kab_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td><?= $siswa['kec_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Kel./Desa</td>
                                <td>:</td>
                                <td><?= $siswa['desa_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $siswa['alamat_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td>Kode POS</td>
                                <td>:</td>
                                <td><?= $siswa['kodepos_ibu']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Wali -->
            <div class="col-md-6">
                <h4>Data Wali</h4>
                <div class="card">
                    <div class="card-body">
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $siswa['nama_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?= $siswa['status_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td><?= $siswa['nik_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td><?= $siswa['tempat_lahir_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Tgl. Lahir</td>
                                <td>:</td>
                                <td><?= date('d F Y', strtotime($siswa['tgl_lahir_wali'])); ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan</td>
                                <td>:</td>
                                <td><?= $siswa['pendidikan_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td><?= $siswa['pekerjaan_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Penghasilan</td>
                                <td>:</td>
                                <td><?= $siswa['penghasilan_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>No. Hp</td>
                                <td>:</td>
                                <td><?= $siswa['no_hp_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td><?= $siswa['prov_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Kab./Kota</td>
                                <td>:</td>
                                <td><?= $siswa['kab_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td><?= $siswa['kec_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Kel./Desa</td>
                                <td>:</td>
                                <td><?= $siswa['desa_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $siswa['alamat_wali']; ?></td>
                            </tr>
                            <tr>
                                <td>Kode POS</td>
                                <td>:</td>
                                <td><?= $siswa['kodepos_wali']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sekolah Asal -->
            <div class="col-md-6">
                <h4>Data Sekolah Asal</h4>
                <div class="card">
                    <div class="card-body">
                        <table width="100%" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $siswa['asal_sekolah']; ?></td>
                            </tr>
                            <tr>
                                <td>NPSN/NSM</td>
                                <td>:</td>
                                <td><?= $siswa['npsn_sekolah']; ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Lulus</td>
                                <td>:</td>
                                <td><?= $siswa['tahun_lulus']; ?></td>
                            </tr>
                            <tr>
                                <td>No. Ijazah</td>
                                <td>:</td>
                                <td><?= $siswa['seri_ijazah']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4>Pra Sekolah</h4>
                <div class="card">
                    <div class="card-body">
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

        </div>
    </div>
</div>