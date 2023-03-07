<div class="row justify-content-center">
    <h1 class="text-center">DATA PENDAFTAR</h1>
    <h4 class="text-center mb-3">PPDB MAN 2 KOTA CIREBON TAHUN 2023/2024</h4>
    <div class="col-md-8">
        <h5>Jumlah Pendaftar : <?= $daftar; ?> Siswa</h5>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-inline my-2 my-lg-0">
            <?= form_open('admin/cari'); ?>
            <div class="input-group">
                <input class="form-control mr-sm-2" name="keyword" type="text" placeholder="Nama Lengkap" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <a href="<?= base_url('admin/siswa'); ?>" class="btn btn-outline-warning">Reset</a>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="shadow p-3 card">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-success text-white">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Sekolah Asal</th>
                            <th scope="col" class="text-center">Waktu Pendaftaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; ?>
                        <?php foreach ($siswa as $sis) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i; ?></th>
                                <td><?= $sis['nama_siswa']; ?></td>
                                <td><?= $sis['nisn']; ?></td>
                                <td><?= $sis['asal_sekolah']; ?></td>
                                <td class="text-center"><?= date('d F Y | H : m', $sis['date_created']); ?> WIB</td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>