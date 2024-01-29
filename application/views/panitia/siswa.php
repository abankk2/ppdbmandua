<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

<div class="row justify-content-center">
    <h1 class="text-center">DATA PENDAFTAR</h1>
    <h4 class="text-center mb-3">PPDB MAN 2 KOTA CIREBON TAHUN 2024/2025</h4>
    <div class="col-md-8">
        <div class="dropdown mb-3">
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter Capesdik
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url('panitia/wawancara'); ?>">Semua Data</a></li>
                <li><a class="dropdown-item" href="<?= base_url('panitia/sudah_wawancara'); ?>">Sudah Wawancara</a></li>
                <li><a class=" dropdown-item" href="<?= base_url('panitia/bl_wawancara'); ?>">Belum Wawancara</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-4 mb-3">
    </div>
    <div class="col-md-12">
        <div class="shadow p-3 card">
            <div class="table-responsive">
                <table id="example" class="table">
                    <thead class="bg-success text-white">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">No Peserta</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Sekolah Asal</th>
                            <th scope="col" class="text-center">Waktu Pendaftaran</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; ?>
                        <?php foreach ($siswa as $sis) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i; ?></th>
                                <td><?= $sis['no_daftar']; ?></td>
                                <td><?= $sis['nama_siswa']; ?></td>
                                <td><?= $sis['nisn']; ?></td>
                                <td><?= $sis['asal_sekolah']; ?></td>
                                <td class="text-center"><?= date('d F Y | H : m', $sis['date_created']); ?> WIB</td>
                                <td>
                                    <a href="<?= base_url() ?>panitia/Dsiswa/<?php echo $sis['nisn']; ?>" class="btn btn-sm btn-info text-white"><i class="fa-solid fa-circle-info"></i></a>

                                    <?php if ($sis['kunci'] == 1) { ?>
                                        <a href="<?= base_url() ?>panitia/input/<?php echo $sis['nisn']; ?>" class="btn btn-sm btn-danger text-white"><i class="fa-solid fa-headset"></i></a>
                                    <?php } else if ($sis['kunci'] == 2) { ?>
                                        <a href="<?= base_url() ?>panitia/input/<?php echo $sis['nisn']; ?>" class="btn btn-sm btn-success text-white"><i class="fa-solid fa-headset"></i></a>
                                    <?php } else if ($sis['kunci'] == 0) { ?>
                                        <a href="<?= base_url() ?>panitia/input/<?php echo $sis['nisn']; ?>" class="btn btn-sm btn-danger text-white"><i class="fa-solid fa-headset"></i></a>
                                    <?php } ?>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>



<script>
    $('#example').DataTable({
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });
</script>