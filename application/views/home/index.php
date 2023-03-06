<section id="hero">
    <div class="container pt-3">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="1000">
                            <div class="slidd">
                                <h2 class="mb-3">Selamat Datang Di Web PPDB MAN 2 Kota Cirebon</h2>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>Aplikasi Penerimaan Peserta didik baru Tahun Pelajaran 2023/2024
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>Pendaftaran Siswa dan Siswi Baru Tahun 2023/2024 ini telah dibuka. <br> Silahkan Segera Daftar dan lengkapi Formulir
                                    </li>
                                </ul>
                                <a href="#alur" class="btn btn-outline-warning mt-3 px-5" style="border-radius: 2em;"> Lihat Alur Pendaftaran</a>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <div class="slidd">
                                <h2 class="mb-3">Syarat Pendaftaran Peserta Didik Baru</h2>
                                <h5>Tahun Pelajaran 2023/2024 </h5>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>Surat Keterangan Lulus </li>
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span> Ijazah Jenjang Sebelumnya </li>
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span> Kartu Keluarga </li>
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span> Akta Kelahiran </li>
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span> Scan Raport </li>

                                </ul>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="slidd">
                                <h2 class="mb-3">Alur Pendaftaran Peserta Didik Baru</h2>
                                <h5>Tahun Pelajaran 2023/2024</h5>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>Daftar Akun </li>
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span> Lengkapi Biodata </li>
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span> Upload Berkas </li>
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span> Pembayaran </li>
                                    <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span> Download Berkas</li>

                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form method="post" action="<?= base_url('auth'); ?>">
                            <div class="form-group mb-3">
                                <label class="form-control-label">NISN</label>
                                <input type="text" name="email" class="form-control">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label">Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="form-control pass-input">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <button class="btn btn-sm mt-3 btn-block w-100 text-white" type="submit" style="border-radius: 2em; background-color:green">L O G I N</button>


                            <div class="text-center mt-3">Belum Punya Akun? Daftar <a href="<?= base_url('auth/registration'); ?>" class="text-decoration-none">disini</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255, 255,0.7" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255, 255,0.5)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255, 255,0.3)" />
            <use xlink:href="#gentle-wave" x="48" y="7" fill="#FFFFFF" />
        </g>
    </svg>
</section>

<section id="alur">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="shadow card">
                    <h3 class="card-header p-3 text-center">Alur Proses Pendaftaran</h3>
                    <p class="p-3">Silahkan Simak Alur Pendaftaran sebelum Melakukan Pendaftaran di PPDB Online MAN 2 KOTA CIREBON</p>
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa-1x fa-solid fa-cog fa-spin px-1"></i> Membuat Akun PPDB
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p> Calon Siswa mendaftar di web pendaftaran.</p>
                                        <div class="d-grid gap-2">
                                            <a href="<?= base_url('auth/registration'); ?>" class="btn hijau">Daftar Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa-1x fa-solid fa-cog fa-spin px-1"></i> Login
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Jika selesai pendaftaran silahkan login dengan username dan password saat pendaftaran</p>
                                        <div class="text-center">
                                            <a href="<?= base_url('auth'); ?>">
                                                <img src="<?= base_url('assets/'); ?>img/login.png" class="img-fluid" alt="login" style="width: 50%;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa-1x fa-solid fa-cog fa-spin px-1"></i> Lengkapi Biodata
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lengkapi Biodata yang diberikan dengan data yang benar.</p>
                                        <div class="text-center">
                                            <img src="<?= base_url('assets/'); ?>img/biodata.png" class="img-fluid" alt="biodata" style="width: 50%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="shadow card">
                    <h3 class="card-header p-3 text-center">Informasi Pendaftaran</h3>
                    <div class="card-body">
                        <h3><span class="badge text-bg-warning">Gelombang 1</span></h3>
                        <h5>06 Maret - 20 April 2023</h5>
                        <p>Jalur Prestasi "Best Quality Acception"</p>
                        <h3><span class="badge text-bg-warning">Gelombang 2</span></h3>
                        <h5>27 Mei - 23 Juni 2023</h5>
                        <p>Jalur Reguler "Reguler Acception"</p>
                        <h3 class="text-center">Jadwal Kegiatan</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-warning">
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Kegiatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>06 Marte s.d 23 Juni 2023</th>
                                        <td>Pendaftaran Online</td>
                                    </tr>
                                    <tr>
                                        <th>26 Juni 2023</th>
                                        <td>Seleksi Tulis (Skolastik & Literasi)</td>
                                    </tr>
                                    <tr>
                                        <th>27 Juni 2023</th>
                                        <td>Pengumuman Penerimaan</td>
                                    </tr>
                                    <tr>
                                        <th>03 s.d 05 Juli 2023</th>
                                        <td>Lapor Diri & Pembagian Kelas (Melengkapi Administrasi Pendaftaran)</td>
                                    </tr>
                                    <tr>
                                        <th>10 s.d 12 Juli 2023</th>
                                        <td>MATSAMA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#008000" fill-opacity="1" d="M0,96L60,106.7C120,117,240,139,360,138.7C480,139,600,117,720,101.3C840,85,960,75,1080,90.7C1200,107,1320,149,1380,170.7L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
</section>
<section id="data">
    <div class="container pb-5">
        <div class="row">
            <div class="text-center text-white mb-3">
                <h3 class="mb-1">Data Pendaftar</h3>
                <h4>Peserta Didik Baru MAN 2 Kota Cirebon Tahun 2023/2024</h4>
            </div>
            <div class="col-md-4 mb-3">
                <div class="shadow card">
                    <h3 class="card-header2 p-3 text-center">Data Pendaftar</h3>
                    <h6 class="display-6 text-center" style="font-weight: bold;"><?= $daftar; ?></h6>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="shadow card">
                    <h3 class="card-header2 p-3 text-center">Data Diterima</h3>
                    <h6 class="display-6 text-center" style="font-weight: bold;">0</h6>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="shadow card">
                    <h3 class="card-header2 p-3 text-center">Quota Pendaftar</h3>
                    <h6 class="display-6 text-center" style="font-weight: bold;">280</h6>
                </div>
            </div>

            <div class="text-center text-white mb-3 mt-3">
                <h3 class="mb-1">Follow us On :</h3>
            </div>
            <div class="wrapper p-3 ">
                <a href="https://man2kotacirebon.sch.id/" target="_blank" class="icon instagram text-decoration-none text-success">
                    <div class="tooltip">
                        Web
                    </div>
                    <span><i class="fa-solid fa-globe"></i></span>
                </a>
                <a href="https://twitter.com/man2kotacirebon" target="_blank" class="icon twitter text-decoration-none text-success">
                    <div class="tooltip">
                        Twitter
                    </div>
                    <span><i class="fab fa-twitter"></i></span>
                </a>
                <a href="https://www.instagram.com/man2kotacirebon_/" target="_blank" class="icon instagram text-decoration-none text-success">
                    <div class="tooltip">
                        Instagram
                    </div>
                    <span><i class="fab fa-instagram"></i></span>
                </a>
                <a href="https://www.youtube.com/channel/UCMrdFo0CdFNyn1wnazBTzQg" target="_blank" class="icon youtube text-decoration-none text-success">
                    <div class="tooltip">
                        YouTube
                    </div>
                    <span><i class="fab fa-youtube"></i></span>
                </a>
            </div>

        </div>
    </div>
</section>