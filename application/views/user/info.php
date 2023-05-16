<div class="row">
    <?= $this->session->flashdata('message'); ?>

    <div class="col-md-4">
        <h4 class="mb-3"><i class="fa-solid fa-volume-high"></i> Informasi</h4>
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($info as $in) : ?>
                    <div class="card">
                        <div class="ribbon-wrapper card">
                            <div class="card-body">
                                <div class="ribbon ribbon-warning text-dark"><i class="fa-solid fa-triangle-exclamation"></i> <?= date('d F Y', $in['date_created']); ?></div>
                                <h5><?= $in['judul']; ?></h5>
                                <p><?= $in['isi']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="ribbon-wrapper card">
                        <div class="card-body">
                            <div class="ribbon ribbon-primary">Informasi Terdahulu</div>
                            <?php foreach ($info2 as $in2) : ?>
                                <h5 class="mb-0"><?= $in2['judul']; ?></h5>
                                <small><?= date('d F Y', $in2['date_created']); ?></small>
                                <p><?= $in2['isi']; ?></p>
                                <hr>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <h4 class="mb-3"><i class="fa-solid fa-calendar-days"></i> Agenda PPDB 2023</h4>
        <div class="card">
            <div class="card-body">
                <div class="cd-horizontal-timeline">
                    <div class="timeline">
                        <div class="events-wrapper">
                            <div class="events">
                                <ol>
                                    <li><a href="#0" data-date="16/01/2014" class="selected">06 Maret 23 Juni</a></li>
                                    <li><a href="#0" data-date="28/02/2014">26 Juni</a></li>
                                    <li><a href="#0" data-date="20/04/2014">27 Juni</a></li>
                                    <li><a href="#0" data-date="20/05/2014">03 - 05 Juli</a></li>
                                    <li><a href="#0" data-date="09/07/2014">10 - 12 Juli</a></li>
                                    <li><a href="#0" data-date="30/08/2014"></a></li>
                                    <li><a href="#0" data-date="15/09/2014"></a></li>
                                    <li><a href="#0" data-date="01/11/2014"></a></li>
                                    <li><a href="#0" data-date="10/12/2014"></a></li>
                                    <li><a href="#0" data-date="19/01/2015"></a></li>
                                    <li><a href="#0" data-date="03/03/2015"></a></li>
                                </ol>
                                <span class="filling-line" aria-hidden="true"></span>
                            </div>

                        </div>
                        <ul class="cd-timeline-navigation">
                            <li><a href="#0" class="prev inactive">Prev</a></li>
                            <li><a href="#0" class="next">Next</a></li>
                        </ul>

                    </div>

                    <div class="events-content">
                        <ol>
                            <li class="selected" data-date="16/01/2014">
                                <h3><small>Pendaftaran Online</small></h3>
                                <p class="m-t-40">
                                    Pendaftaran Siswa Baru MAN 2 Kota Cirebon merupakan proses penerimaan siswa baru yang dilakukan oleh Madrasah Aliyah Negeri 2 Kota Cirebon. Calon siswa baru dapat mendaftar dengan memenuhi persyaratan yang telah ditentukan, Pendaftaran dilakukan secara online melalui website resmi sekolah atau dapat datang langsung ke sekolah untuk mendaftar.
                                </p>
                            </li>
                            <li data-date="28/02/2014">
                                <h3> <small>Seleksi Tulis</small></h3>
                                <p class="m-t-40">
                                    Seleksi tulis skolastik dan literasi merupakan salah satu tahapan dalam proses penerimaan siswa baru di MAN 2 Kota Cirebon. Seleksi ini bertujuan untuk mengetahui kemampuan akademik dan literasi calon siswa sehingga dapat dijadikan acuan dalam penentuan kelulusan. Calon siswa akan diuji kemampuan membaca, menulis, dan berhitung, serta penguasaan materi pelajaran. Seleksi tulis skolastik dan literasi merupakan tahapan yang sangat penting dalam proses penerimaan siswa baru di MAN 2 Kota Cirebon, karena hasil dari seleksi ini akan menjadi salah satu penentu kelulusan calon siswa.
                                </p>
                            </li>
                            <li data-date="20/04/2014">
                                <h3><small>Pengumuman Penerimaan</small></h3>
                                <p class="m-t-40">
                                    Pengumuman penerimaan siswa baru MAN 2 Kota Cirebon akan segera diumumkan. Pastikan kamu telah melakukan pendaftaran dan mengikuti seleksi dengan baik.
                                </p>
                            </li>
                            <li data-date="20/05/2014">
                                <h3><small>Lapor Diri & Pembagian Kelas</small></h3>
                                <p class="m-t-40">
                                    Setelah berhasil lolos seleksi, calon siswa baru harus melakukan Lapor Diri atau wawancara pengumpulan berkas untuk memastikan bahwa seluruh persyaratan pendaftaran sudah terpenuhi. Selama proses ini, calon siswa baru akan mendapatkan informasi tentang aturan dan ketentuan sekolah, serta pembagian kelas sesuai dengan kemampuan dan minat mereka. Oleh karena itu, diharapkan calon siswa baru dapat hadir tepat waktu dan membawa seluruh dokumen yang diperlukan untuk memperlancar proses administrasi dan memastikan kesuksesan awal dalam memulai pendidikan di sekolah.
                                </p>
                            </li>
                            <li data-date="09/07/2014">
                                <h3><small>MATSAMA</small></h3>
                                <p class="m-t-40">
                                    MATSAMA atau Masa Orientasi Siswa Madrasah adalah kegiatan yang dilakukan oleh Madrasah setiap tahunnya pada awal tahun ajaran baru. Kegiatan ini bertujuan untuk membantu siswa baru dalam beradaptasi dengan lingkungan Madrasah, mengenal teman sekelas dan guru, serta memperkenalkan budaya dan kegiatan-kegiatan di Madrasah. Selama MATSAMA, siswa baru akan diberikan pengenalan terhadap aturan dan kebiasaan yang berlaku di Madrasah, sehingga diharapkan dapat membantu mereka dalam menyesuaikan diri dengan lingkungan belajar yang baru.
                                </p>
                            </li>

                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>