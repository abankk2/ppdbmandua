<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var url = "<?php echo site_url('admin/add_ajax_kab'); ?>/" + $(this).val();
            $('#kabupaten').load(url);
            return false;
        })

        $("#kabupaten").change(function() {
            var url = "<?php echo site_url('admin/add_ajax_kec'); ?>/" + $(this).val();
            $('#kecamatan').load(url);
            return false;
        })

        $("#kecamatan").change(function() {
            var url = "<?php echo site_url('admin/add_ajax_des'); ?>/" + $(this).val();
            $('#desa').load(url);
            return false;
        })

    });
</script>

<div class="row">
    <div class="col-xl-3 col-md-4">
        <div class="widget settings-menu">
            <ul>
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin/Esiswa/<?= $siswa['nisn']; ?>" class="nav-link">
                        <i class="far fa-user"></i> <span>Biodata</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin/edit_tinggal/<?= $siswa['nisn']; ?>" class="nav-link active">
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
        <?= $this->session->flashdata('message'); ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tempat Tinggal</h5>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('admin/uptinggal'); ?>">
                    <input type="text" name="nisn" value="<?= $siswa['nisn']; ?>" class="form-control d-none" readonly>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Status Tinggal</label>
                                <select class="form-select" name="status_tinggal_siswa" required>
                                    <option value="<?= $siswa['status_tinggal_siswa']; ?>" selected><?= $siswa['status_tinggal_siswa']; ?></option>
                                    <option value="Dengan Ayah Kandung">Dengan Ayah Kandung</option>
                                    <option value="Dengan Ibu Kandung">Dengan Ibu Kandung</option>
                                    <option value="Dengan Wali">Dengan Wali</option>
                                    <option value="Ikut Saudara/Kerabat">Ikut Saudara/Kerabat</option>
                                    <option value="Asrama Madrasah">Asrama Madrasah</option>
                                    <option value="Kontrak/Kost">Kontrak/Kost</option>
                                    <option value="Di Asrama Pesantren">Di Asrama Pesantren</option>
                                    <option value="Panti Asuhan">Panti Asuhan</option>
                                    <option value="Rumah SInggah">Rumah SInggah</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Provinsi</label>
                                <select name="provinsi" class="form-select form-select" id="provinsi">
                                    <option><?= $siswa['prov']; ?></option>
                                    <option>- Pilih Provinsi -</option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                        echo '<option value="' . $prov->id . '">' . $prov->provinsi . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kab./Kota</label>
                                <select name="kabupaten" class="form-select form-select" id="kabupaten">
                                    <option><?= $siswa['kab']; ?></option>
                                    <option value=''>Pilih Kabupaten</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kecamatan</label>
                                <select name="kecamatan" class="form-select form-select" id="kecamatan">
                                    <option><?= $siswa['kec']; ?></option>
                                    <option>Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kel./Desa</label>
                                <select name="des" class="form-select form-select" id="desa">
                                    <option><?= $siswa['desa']; ?></option>
                                    <option>Pilih Desa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kode POS</label>
                                <input type="number" name="kodepos_siswa" value="<?= $siswa['kodepos_siswa']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Detail Alamat</label>
                                <textarea class="form-control" name="alamat_siswa" rows="2" required><?= $siswa['alamat_siswa']; ?></textarea>
                                <div id="emailHelp" class="form-text">Contoh : Jl. Salam Raya II Gg. Salam 10 No. 87 Rt.06 Rw. 03</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Jarak ke Sekolah</label>
                                <div class="input-group">
                                    <input type="number" name="jarak" value="<?= $siswa['jarak']; ?>" class="form-control" aria-describedby="basic-addon2" required>
                                    <span class="input-group-text" id="basic-addon2">Km</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Waktu Tempuh</label>
                                <div class="input-group">
                                    <input type="number" name="waktu" value="<?= $siswa['waktu']; ?>" class="form-control" aria-describedby="basic-addon2" required>
                                    <span class="input-group-text" id="basic-addon2">Menit</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Kordinat</label>
                                <input type="text" name="kordinat" value="<?= $siswa['kordinat']; ?>" class="form-control">
                                <div id="emailHelp" class="form-text">Titik Lokasi Rumah di Google Maps Contoh : -6.747611, 108.521944</div>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="prov" value="<?= $siswa['prov']; ?>" class="form-control d-none" required>
                    <input type="text" name="kab" value="<?= $siswa['kab']; ?>" class="form-control d-none" required>
                    <input type="text" name="kec" value="<?= $siswa['kec']; ?>" class="form-control d-none" required>
                    <input type="text" name="desa" value="<?= $siswa['desa']; ?>" class="form-control d-none" required>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>




<!-- Get Pangkalan -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#provinsi').on('input', function() {

            var provinsi = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/get_prov'); ?>",
                dataType: "JSON",
                data: {
                    provinsi: provinsi
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(provinsi, provinsi) {
                        $('[name="prov"]').val(data.provinsi);
                    });

                }
            });
            return false;
        });

        $('#kabupaten').on('input', function() {

            var kabupaten = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/get_kab'); ?>",
                dataType: "JSON",
                data: {
                    kabupaten: kabupaten
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(kabupaten, kabupaten) {
                        $('[name="kab"]').val(data.kabupaten);
                    });

                }
            });
            return false;
        });

        $('#kecamatan').on('input', function() {

            var kecamatan = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/get_kec'); ?>",
                dataType: "JSON",
                data: {
                    kecamatan: kecamatan
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(kecamatan, kecamatan) {
                        $('[name="kec"]').val(data.kecamatan);
                    });

                }
            });
            return false;
        });

        $('#desa').on('input', function() {

            var desa = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/get_des'); ?>",
                dataType: "JSON",
                data: {
                    desa: desa
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(desa, desa) {
                        $('[name="desa"]').val(data.desa);
                    });

                }
            });
            return false;
        });

    });
</script>