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
                    <a href="<?= base_url('user/edit_dok'); ?>" class="nav-link active">
                        <i class="fa-solid fa-circle-info"></i> <span>Informasi Lainnya</span>
                    </a>
                </li>

                <?php if ($siswa['jalur'] == 1) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('user/upload'); ?>" class="nav-link">
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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Informasi Lainnya</h5>
            </div>
            <div class="card-body">

                <form method="post" action="<?= base_url('user/uplainnya'); ?>">
                    <input type="text" name="nisn" value="<?= $siswa['nisn']; ?>" class="d-none" required>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">TK</label>
                                <select class="form-select" name="tk" required>
                                    <option value="<?= $siswa['tk']; ?>" selected><?= $siswa['tk']; ?></option>
                                    <option value="YA">YA</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">PAUD</label>
                                <select class="form-select" name="paud" required>
                                    <option value="<?= $siswa['paud']; ?>" selected><?= $siswa['paud']; ?></option>
                                    <option value="YA">YA</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="mb-3">Bantuan Sosial</h6>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. KIP</label>
                                <input type="text" name="no_kip" value="<?= $siswa['no_kip']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. KKS</label>
                                <input type="text" name="no_kks" value="<?= $siswa['no_kks']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. PKH</label>
                                <input type="text" name="no_pkh" value="<?= $siswa['no_pkh']; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="mb-3">Berkebutuhan Khusus</h6>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <?php if ($siswa['keb_khusus'] == 0) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="keb_khusus" id="keb_khusus">
                                    <?php } else if ($siswa['keb_khusus'] == 1) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="keb_khusus" id="keb_khusus" checked>
                                    <?php } ?>
                                    <label class="form-check-label" for="keb_khusus">
                                        Berkebutuhan Khusus
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <?php if ($siswa['keb_disabilitas'] == 0) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="keb_disabilitas" id="keb_disabilitas">
                                    <?php } else if ($siswa['keb_disabilitas'] == 1) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="keb_disabilitas" id="keb_disabilitas" checked>
                                    <?php } ?>
                                    <label class="form-check-label" for="keb_disabilitas">
                                        Disabilitas
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="mb-3">Vaksinasi</h6>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <?php if ($siswa['hepatitis'] == 0) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="hepatitis" id="hepatitis">
                                    <?php } else if ($siswa['hepatitis'] == 1) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="hepatitis" id="hepatitis" checked>
                                    <?php } ?>
                                    <label class="form-check-label" for="hepatitis">
                                        Hepatitis
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <?php if ($siswa['polio'] == 0) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="polio" id="polio">
                                    <?php } else if ($siswa['polio'] == 1) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="polio" id="polio" checked>
                                    <?php } ?>
                                    <label class="form-check-label" for="polio">
                                        Polio
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <?php if ($siswa['bcg'] == 0) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="bcg" id="bcg">
                                    <?php } else if ($siswa['bcg'] == 1) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="bcg" id="bcg" checked>
                                    <?php } ?>
                                    <label class="form-check-label" for="bcg">
                                        BCG
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <?php if ($siswa['campak'] == 0) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="campak" id="campak">
                                    <?php } else if ($siswa['campak'] == 1) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="campak" id="campak" checked>
                                    <?php } ?>
                                    <label class="form-check-label" for="campak">
                                        Campak
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <?php if ($siswa['dpt'] == 0) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="dpt" id="dpt">
                                    <?php } else if ($siswa['dpt'] == 1) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="dpt" id="dpt" checked>
                                    <?php } ?>
                                    <label class="form-check-label" for="dpt">
                                        DPT
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <?php if ($siswa['covid'] == 0) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="covid" id="covid">
                                    <?php } else if ($siswa['covid'] == 1) { ?>
                                        <input class="form-check-input" type="checkbox" value="1" name="covid" id="covid" checked>
                                    <?php } ?>
                                    <label class="form-check-label" for="covid">
                                        Covid
                                    </label>
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