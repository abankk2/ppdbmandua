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
                    <a href="<?= base_url() ?>admin/edit_tinggal/<?= $siswa['nisn']; ?>" class="nav-link">
                        <i class="fa-solid fa-house"></i> <span>Tempat Tinggal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin/edit_ortu/<?= $siswa['nisn']; ?>" class="nav-link active">
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
                <h5 class="card-title">Identitas Ayah</h5>
            </div>
            <div class="card-body">

                <form method="post" action="<?= base_url('admin/uportu'); ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Kartu Keluarga</label>
                                <input type="number" name="no_kk" value="<?= $siswa['no_kk']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kepala Keluarga</label>
                                <input type="text" name="kepala_keluarga" value="<?= $siswa['kepala_keluarga']; ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Status Ayah</label>
                                <select class="form-select" id="status_ayah" name="status_ayah" onchange="toggleNamaAyah()" required>
                                    <option value="<?= $siswa['status_ayah']; ?>" selected><?= $siswa['status_ayah']; ?></option>
                                    <option value="Masih_Hidup">Masih Hidup</option>
                                    <option value="Sudah_Meninggal">Sudah Meninggal</option>
                                    <option value="Tidak_Diketahui">Tidak Diketahui</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Ayah</label>
                                <input type="text" name="nama_ayah" id="nama_ayah" value="<?= $siswa['nama_ayah']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">NIK Ayah</label>
                                <input type="text" id="nik_ayah" name="nik_ayah" value="<?= $siswa['nik_ayah']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kewarganegaraan</label>
                                <select class="form-select" id="warga_ayah" name="warga_ayah">
                                    <option value="<?= $siswa['warga_ayah']; ?>" selected><?= $siswa['warga_ayah']; ?></option>
                                    <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                    <option value="Warga Negara Asing">Warga Negara Asing</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir_ayah" name="tempat_lahir_ayah" value="<?= $siswa['tempat_lahir_ayah']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tgl. Lahir</label>
                                <input type="date" id="tgl_lahir_ayah" name="tgl_lahir_ayah" value="<?= $siswa['tgl_lahir_ayah']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Pendidikan Ayah</label>
                                <select class="form-select" id="pendidikan_ayah" name="pendidikan_ayah">
                                    <option value="<?= $siswa['pendidikan_ayah']; ?>" selected><?= $siswa['pendidikan_ayah']; ?></option>
                                    <option value="SMP/Sederajat">SD/Sederajat</option>
                                    <option value="SMP/Sederajat">SMP/Sederajat</option>
                                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="Tidak Bersekolah">Tidak Bersekolah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Pekerjaan Ayah</label>
                                <select class="form-select" id="pekerjaan_ayah" name="pekerjaan_ayah">
                                    <option value="<?= $siswa['pekerjaan_ayah']; ?>" selected><?= $siswa['pekerjaan_ayah']; ?></option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="PNS">PNS</option>
                                    <option value="TNI/Polisi">TNI/Polisi</option>
                                    <option value="Guru/Dosen">Guru/Dosen</option>
                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Pengacara/Jaksa/Hakim/Notaris">Pengacara/Jaksa/Hakim/Notaris</option>
                                    <option value="Seniman/Pelukis/Artis/Sejenis">Seniman/Pelukis/Artis/Sejenis</option>
                                    <option value="Dokter/Bidan/Perawat">Dokter/Bidan/Perawat</option>
                                    <option value="Pilot/Pramugara">Pilot/Pramugara</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Petani/Peternak">Petani/Peternak</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Buruh (Tani/Pabrik/Bangunan)">Buruh (Tani/Pabrik/Bangunan)</option>
                                    <option value="Sopir/Masinis/Kondektur">Sopir/Masinis/Kondektur</option>
                                    <option value="Politikus">Politikus</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Penghasilan Ayah</label>
                                <select class="form-select" id="penghasilan_ayah" name="penghasilan_ayah">
                                    <option value="<?= $siswa['penghasilan_ayah']; ?>" selected><?= $siswa['penghasilan_ayah']; ?></option>
                                    <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                                    <option value="500.000 - 1.000.000">500.000 - 1.000.000</option>
                                    <option value="1.000.001 - 2.000.000">1.000.001 - 2.000.000</option>
                                    <option value="2.000.001 - 3.000.000">2.000.001 - 3.000.000</option>
                                    <option value="3.000.001 - 5.000.000">3.000.001 - 5.000.000</option>
                                    <option value="Lebih dari 5.000.000">Lebih dari 5.000.000</option>
                                    <option value="Tidak ada">Tidak ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Status Kepemilikan Rumah</label>
                                <select class="form-select" id="status_tmp_tinggal_ayah" name="status_tmp_tinggal_ayah">
                                    <option value="<?= $siswa['status_tmp_tinggal_ayah']; ?>" selected><?= $siswa['status_tmp_tinggal_ayah']; ?></option>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                    <option value="Rumah Orang Tua">Rumah Orang Tua</option>
                                    <option value="Rumah Saudara/kerabat">Rumah Saudara/kerabat</option>
                                    <option value="Rumah Dinas">Rumah Dinas</option>
                                    <option value="Sewa/kontrak">Sewa/kontrak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <h5>Alamat</h5>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Provinsi</label>
                                <select name="provinsi" class="form-select form-select" id="provinsi">
                                    <option><?= $siswa['prov_ayah']; ?></option>
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
                                    <option><?= $siswa['kab_ayah']; ?></option>
                                    <option value=''>Pilih Kabupaten</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kecamatan</label>
                                <select name="kecamatan" class="form-select form-select" id="kecamatan">
                                    <option><?= $siswa['kec_ayah']; ?></option>
                                    <option>Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kel./Desa</label>
                                <select name="des" class="form-select form-select" id="desa">
                                    <option><?= $siswa['desa_ayah']; ?></option>
                                    <option>Pilih Desa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kode POS</label>
                                <input type="number" id="kodepos_ayah" name="kodepos_ayah" value="<?= $siswa['kodepos_ayah']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Whatsapp</label>
                                <input type="number" name="no_hp_ayah" id="no_hp_ayah" value="<?= $siswa['no_hp_ayah']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Detail Alamat</label>
                                <textarea class="form-control" name="alamat_ayah" id="alamat_ayah" rows="2"><?= $siswa['alamat_ayah']; ?></textarea>
                                <div id="emailHelp" class="form-text">Contoh : Jl. Salam Raya II Gg. Salam 10 No. 87 Rt.06 Rw. 03</div>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="prov" value="<?= $siswa['prov_ayah']; ?>" class="form-control d-none">
                    <input type="text" name="kab" value="<?= $siswa['kab_ayah']; ?>" class=" form-control d-none">
                    <input type=" text" name="kec" value="<?= $siswa['kec_ayah']; ?>" class=" form-control d-none">
                    <input type=" text" name="desa" value="<?= $siswa['desa_ayah']; ?>" class=" form-control d-none">
                    <input type="text" name="nisn" value="<?= $siswa['nisn']; ?>" class="form-control d-none">
                    <div class=" d-grid gap-2">
                        <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>



<!-- Get Alamat -->
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

<script src="<?= base_url('assets/js/'); ?>orangtua.js"></script>