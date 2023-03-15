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
                    <a href="<?= base_url('user/edit_skolah'); ?>" class="nav-link ">
                        <i class="fa-solid fa-school"></i> <span>Sekolah Asal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/edit_dok'); ?>" class="nav-link">
                        <i class="fa-solid fa-circle-info"></i> <span>Informasi Lainnya</span>
                    </a>
                </li>

                <?php if ($siswa['jalur'] == 1) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('user/upload'); ?>" class="nav-link active">
                            <i class="fa-solid fa-file-pdf"></i> <span>Dokumen upload</span>
                        </a>
                    </li>
                <?php } else if ($siswa['jalur'] == 2) { ?>

                <?php } ?>

            </ul>
        </div>

    </div>
    <div class="col-xl-9 col-md-8">
        <?= $this->session->flashdata('message'); ?>
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title">Khusus Jalur Prestasi</h5>
            </div>
            <div class="card-body">
                <!-- <?= form_open_multipart('user/aksi_upload'); ?>
                <div class="row">
                    <h5 class="mb-0">Upload Dokumen</h5>
                    <small class="mb-3">Dokumen Upload file Sertifikat atau Surat Keterangan Prestasi dari Sekolah asl berbentuk PDF Max Size 1 Mb <br> Rname file Contoh : <b>NAMA_LENGKAP SERTIFIKAT_JUARA_1_OLIMPIADE_MATEMATIKA_TINGKAT_NASIONAL</b></small>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Dokumen Prestasi</label>
                            <input class="form-control" name="file" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Dokumen</label>
                            <input type="text" name="nisn" value="<?= $siswa['nisn']; ?>" class="form-control d-none" readonly>
                            <input type="text" value="<?= $siswa['file']; ?>" class="form-control" readonly>
                        </div>
                    </div>

                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary">Upload Dokumen</button>
                </div> -->

                <p>Untuk Dokumen Prestasi menunggu <b>Tanggal Upload yang sudah di tentukan Panitia</b></p>
            </div>
            </form>

        </div>

        <div class="card">
            <div class="card-body">
                <?php if ($siswa['file'] == NULL) { ?>

                <?php } else { ?>
                    <div class="ratio ratio-16x9">
                        <iframe src="<?= base_url('assets/dokumen/') . $siswa['file']; ?>" title="YouTube video" allowfullscreen></iframe>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>