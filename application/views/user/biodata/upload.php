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
                <small class="mb-3">Dokumen Upload file Sertifikat atau Surat Keterangan Prestasi dari Sekolah asal berbentuk PDF Max Size 3 Mb dan Pastikan File Sudah Benar Karena File yang di Upload Tidak Bisa diganti atau di Upload Ualang<br> Rname file Contoh : <b>NAMA_LENGKAP SERTIFIKAT_JUARA_1_OLIMPIADE_MATEMATIKA_TINGKAT_NASIONAL</b> </small>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Prestasi
                </button>


                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Peringkat</th>
                                <th scope="col">Tingkat</th>
                                <th scope="col">Tahun</th>
                                <th scope="col" class="text-center">Sertifikat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; ?>
                            <?php foreach ($prestasi as $pres) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                    <td><?= $pres['kegiatan']; ?></td>
                                    <td><?= $pres['peringkat']; ?></td>
                                    <td><?= $pres['tingkat']; ?></td>
                                    <td><?= $pres['tahun']; ?></td>
                                    <td class="text-center"><span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#ex<?= $pres['oleh']; ?>">Sertifikat</span></td>
                                    <!-- Modal2 -->
                                    <div class="modal fade" id="ex<?= $pres['oleh']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sertifikat <?= $pres['kegiatan']; ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <iframe src="https://drive.google.com/file/d/<?= $pres['oleh']; ?>/preview" width="100%" height="650" allow="autoplay"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>



            </div>

        </div>

    </div>
</div>













<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="<?= site_url('user/submit_prestasi'); ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" class="form-control d-none" name="siswa_id" value="<?= $siswa['nisn']; ?>">
                    <input type="text" class="form-control d-none" name="siswa" value="<?= $siswa['nama_siswa']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="kegiatan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Peringkat</label>
                        <input type="text" class="form-control" name="peringkat">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tingkat</label>
                        <select class="form-select" name="tingkat">
                            <option selected disabled></option>
                            <option value="Sekolah">Sekolah</option>
                            <option value="Desa">Desa</option>
                            <option value="Kecamatan">Kecamatan</option>
                            <option value="Kab/Kota">Kab/Kota</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Nasional">Nasional</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Perolehan</label>
                        <input type="text" class="form-control" name="tahun">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload File</label>
                        <input class="form-control" name="file" type="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>