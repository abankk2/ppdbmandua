<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<h6><?= $siswa['no_daftar']; ?></h6>
<h1><?= $siswa['nama_siswa']; ?></h1>
<h4><?= $siswa['nisn']; ?></h4>
</div>

<?= $this->session->flashdata('message'); ?>
<div class="row mt-3">
    <div class="col-md-6">
        <form method="post" action="<?= base_url('panitia/post'); ?>">
            <div class="card p-4">
                <div class="row mb-3">
                    <input type="text" class="form-control d-none" name="nama" value="<?= $siswa['nama_siswa']; ?>" readonly>
                    <input type="text" class="form-control d-none" name="nisn" value="<?= $siswa['nisn']; ?>" readonly>
                    <input type="text" class="form-control d-none" name="oleh" value="<?= $user['name']; ?>" readonly>
                    <input type="text" class="form-control d-none" name="date_created" value="<?= date("Y/m/d"); ?>" readonly>
                    <h5>1. Pemilihan Komponen Mata Pelajaran</h5>
                    <div class="col-md-6">
                        <h6>Pilihan 1</h6>
                        <div class="mb-3">
                            <select class="form-select" name="mapel">
                                <option selected value="<?= $siswa['mapel']; ?>"><?= $siswa['mapel']; ?></option>
                                <option disabled>===</option>
                                <option value="Teknik Sains">Teknik Sains</option>
                                <option value="Keagamaan">Keagamaan</option>
                                <option value="Kesehatan">Kesehatan</option>
                                <option value="Keguruan">Keguruan</option>
                                <option value="Humaniora">Humaniora</option>
                                <option value="Kerja">Kerja</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Pilihan 2</h6>
                        <div class="mb-3">
                            <select class="form-select" name="mapel2">
                                <option selected value="<?= $siswa['mapel2']; ?>"><?= $siswa['mapel2']; ?></option>
                                <option disabled>===</option>
                                <option value="Teknik Sains">Teknik Sains</option>
                                <option value="Keagamaan">Keagamaan</option>
                                <option value="Kesehatan">Kesehatan</option>
                                <option value="Keguruan">Keguruan</option>
                                <option value="Humaniora">Humaniora</option>
                                <option value="Kerja">Kerja</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h5>2. Pemilihan Ekstra Kulikuler</h5>
                    <div class="col-md-6">
                        <h6>UMUM</h6>
                        <div class="mb-3">
                            <select class="form-select" name="ekskul1">
                                <option selected value="<?= $siswa['ekskul1']; ?>"><?= $siswa['ekskul1']; ?></option>
                                <option disabled>===</option>
                                <option value="Pramuka">Pramuka</option>
                                <option value="PMR">PMR</option>
                                <option value="Paskibra">Paskibra</option>
                                <option value="KSM/Olimpiade">KSM/Olimpiade</option>
                                <option value="Robotik">Robotik</option>
                                <option value="Rohis">Rohis</option>
                                <option value="Seni">Seni</option>
                                <option value="Jurnalistik">Jurnalistik</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>OLAHRAGA</h6>
                        <div class="mb-3">
                            <select class="form-select" name="ekskul2">
                                <option selected value="<?= $siswa['ekskul2']; ?>"><?= $siswa['ekskul2']; ?></option>
                                <option disabled>===</option>
                                <option value="Karate">Karate</option>
                                <option value="Voli">Voli</option>
                                <option value="Silat">Silat</option>
                                <option value="Basket">Basket</option>
                                <option value="Futsal">Futsal</option>
                                <option value="Badminton">Badminton</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h5>3. Pemilihan Komponen Keterampilan</h5>
                    <div class="col-md-4">
                        <h6>Pilihan Pertama</h6>
                        <div class="mb-3">
                            <select class="form-select" name="keterampilan1">
                                <option selected value="<?= $siswa['keterampilan1']; ?>"><?= $siswa['keterampilan1']; ?></option>
                                <option disabled>===</option>
                                <option value="TBSM">TBSM</option>
                                <option value="Tata Boga">Tata Boga</option>
                                <option value="Multimedia">Multimedia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h6>Pilihan Kedua</h6>
                        <div class="mb-3">
                            <select class="form-select" name="keterampilan2">
                                <option selected value="<?= $siswa['keterampilan2']; ?>"><?= $siswa['keterampilan2']; ?></option>
                                <option disabled>===</option>
                                <option value="TBSM">TBSM</option>
                                <option value="Tata Boga">Tata Boga</option>
                                <option value="Multimedia">Multimedia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h6>Pilihan Ketiga</h6>
                        <div class="mb-3">
                            <select class="form-select" name="keterampilan3">
                                <option selected value="<?= $siswa['keterampilan3']; ?>"><?= $siswa['keterampilan3']; ?></option>
                                <option disabled>===</option>
                                <option value="TBSM">TBSM</option>
                                <option value="Tata Boga">Tata Boga</option>
                                <option value="Multimedia">Multimedia</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <h5>4. Rencana Setelah Lulus Dari MAN 2 Kota Cirebon</h5>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <select class="form-select" name="rencana">
                                <option selected value="<?= $siswa['rencana']; ?>"><?= $siswa['rencana']; ?></option>
                                <option disabled>===</option>
                                <option value="Kuliah">Kuliah</option>
                                <option value="Kerja">Kerja</option>
                            </select>
                        </div>
                    </div>
                    <p class="text-danger">*Kosongkan jika Memilih Bekerja Lanjut ke Nomor 5</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">a. Perguruan Tinggi PTS/PTN</label>
                                <input type="text" class="form-control" name="ptn1" value="<?= $siswa['ptn1']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">a. Bidang Studi</label>
                                <input type="text" class="form-control" name="jurusan1" value="<?= $siswa['jurusan1']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">b. Perguruan Tinggi PTS/PTN</label>
                                <input type="text" class="form-control" name="ptn2" value="<?= $siswa['ptn2']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">b. Bidang Studi</label>
                                <input type="text" class="form-control" name="jurusan2" value="<?= $siswa['jurusan2']; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <h5>5. Tes BTQ</h5>
                    <div class="col-md-6">
                        <h6>MEMBACA</h6>
                        <div class="mb-3">
                            <select class="form-select" name="baca">
                                <option selected value="<?= $siswa['baca']; ?>"><?= $siswa['baca']; ?></option>
                                <option disabled>===</option>
                                <option value="Lancar">Lancar</option>
                                <option value="Belum Lancar">Belum Lancar</option>
                                <option value="Belum Bisa">Belum Bisa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>MENULIS</h6>
                        <div class="mb-3">
                            <select class="form-select" name="tulis">
                                <option selected value="<?= $siswa['tulis']; ?>"><?= $siswa['tulis']; ?></option>
                                <option disabled></option>
                                <option value="Lancar">Lancar</option>
                                <option value="Belum Lancar">Belum Lancar</option>
                                <option value="Belum Bisa">Belum Bisa</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <h5>6. Email Pengumuman Kelulusan</h5>
                    <div class="col-md-6">
                        <h6>EMAIL</h6>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" value="<?= $siswa['emails']; ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Batas Colom -->
    <div class="col-md-6">
        <h5>Update Keterampilan</h5>
        <div class="table-responsive card p-3">
            <table class="table table-striped">
                <thead class="bg-dark text-white">
                    <tr class="text-center">
                        <th scope="col">KET</th>
                        <th scope="col">TBSM</th>
                        <th scope="col">TATA BOGA</th>
                        <th scope="col">MULTIMEDIA</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>KUOTA</td>
                        <td>70</td>
                        <td>105</td>
                        <td>105</td>
                    </tr>
                    <tr>
                        <td>TERDAFTAR</td>
                        <td id="tbsm"><?= $tbsm; ?></span></td>
                        <td id="tata"><?= $tata; ?></span></td>
                        <td id="multimedia"><?= $multimedia; ?></span></td>
                    </tr>
                    <tr>
                        <td class="text-danger">Sisa</td>
                        <td class="text-danger"><?= 70 - $tbsm; ?></span></td>
                        <td class="text-danger"><?= 105 - $tata; ?></span></td>
                        <td class="text-danger"><?= 105 - $multimedia; ?></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card p-3 mb-3">
            <h5>6. Prestasi Yang Pernah Diraih</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                <td class="text-center">
                                    <a class="badge bg-success" target="_blank" href="https://drive.google.com/file/d/<?= $pres['oleh']; ?>/preview">Lihat</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="<?= site_url('panitia/submit_prestasi'); ?>" enctype="multipart/form-data">
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
































<script>
    $(document).ready(function() {
        // Fungsi untuk memperbarui jumlah siswa
        function updateTBSM() {
            $.ajax({
                url: '<?= base_url('panitia/get_tbsm') ?>', // Ganti dengan URL aksi CodeIgniter Anda untuk mengambil total siswa
                method: 'GET',
                success: function(response) {
                    $('#tbsm').text(response); // Memperbarui elemen dengan respons dari server
                }
            });
        }

        // Memperbarui jumlah siswa setiap 5 detik
        setInterval(updateTBSM, 100); // Ganti dengan interval yang Anda inginkan
    });
</script>

<script>
    $(document).ready(function() {
        // Fungsi untuk memperbarui jumlah siswa
        function updateTATABOGA() {
            $.ajax({
                url: '<?= base_url('panitia/get_tata') ?>', // Ganti dengan URL aksi CodeIgniter Anda untuk mengambil total siswa
                method: 'GET',
                success: function(response) {
                    $('#tata').text(response); // Memperbarui elemen dengan respons dari server
                }
            });
        }

        // Memperbarui jumlah siswa setiap 5 detik
        setInterval(updateTATABOGA, 100); // Ganti dengan interval yang Anda inginkan
    });
</script>

<script>
    $(document).ready(function() {
        // Fungsi untuk memperbarui jumlah siswa
        function updateMulti() {
            $.ajax({
                url: '<?= base_url('panitia/get_multi') ?>', // Ganti dengan URL aksi CodeIgniter Anda untuk mengambil total siswa
                method: 'GET',
                success: function(response) {
                    $('#multimedia').text(response); // Memperbarui elemen dengan respons dari server
                }
            });
        }

        // Memperbarui jumlah siswa setiap 5 detik
        setInterval(updateMulti, 100); // Ganti dengan interval yang Anda inginkan
    });
</script>