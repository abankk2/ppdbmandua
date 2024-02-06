<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Rekap Wawancara Siswa PPDB 2024</title>
    <meta content="" name="description">
    <meta content="Author" name="MJ Maraz">
    <link href="<?= base_url('assets/table/assets/'); ?>images/favicon.png" rel="icon">
    <link href="<?= base_url('assets/table/assets/'); ?>images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->


    <link rel="stylesheet" href="<?= base_url('assets/table/assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/table/assets/'); ?>css/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/table/assets/'); ?>css/style.css">

    <script src='https://kit.fontawesome.com/76a945766d.js' crossorigin='anonymous'></script>

</head>
<!-- =============== Design & Develop By = MJ MARAZ   ====================== -->

<body>

    <!-- =======  Data-Table  = Start  ========================== -->
    <div class="container-fluid">
        <a href="<?= base_url('admin/cetak'); ?>" class="btn btn-primary p-2">Kembali ke menu Cetak</a>
        <div class="row mt-3">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">NISN</th>
                                <th scope="col" class="text-center">NAMA</th>
                                <th scope="col" class="text-center">MAPEL 1</th>
                                <th scope="col" class="text-center">MAPEL 2</th>
                                <th scope="col" class="text-center">EKSKUL 1</th>
                                <th scope="col" class="text-center">EKSKUL 2</th>
                                <th scope="col" class="text-center">KETERAMPILAN 1</th>
                                <th scope="col" class="text-center">KETERAMPILAN 2</th>
                                <th scope="col" class="text-center">KETERAMPILAN 3</th>
                                <th scope="col" class="text-center">RENCANA</th>
                                <th scope="col" class="text-center">PTN 1</th>
                                <th scope="col" class="text-center">JURUSAN 1</th>
                                <th scope="col" class="text-center">PTN 2</th>
                                <th scope="col" class="text-center">JURUSAN 2</th>
                                <th scope="col" class="text-center">BACA</th>
                                <th scope="col" class="text-center">TULISA</th>
                                <th scope="col" class="text-center">OLEH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; ?>
                            <?php foreach ($siswa as $sis) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                    <td> <?= $sis['id_siswa']; ?></td>
                                    <td> <?= $sis['nama']; ?></td>
                                    <td> <?= $sis['mapel']; ?></td>
                                    <td> <?= $sis['mapel2']; ?></td>
                                    <td> <?= $sis['ekskul1']; ?></td>
                                    <td> <?= $sis['ekskul2']; ?></td>
                                    <td> <?= $sis['keterampilan1']; ?></td>
                                    <td> <?= $sis['keterampilan2']; ?></td>
                                    <td> <?= $sis['keterampilan3']; ?></td>
                                    <td> <?= $sis['rencana']; ?></td>
                                    <td> <?= $sis['ptn1']; ?></td>
                                    <td> <?= $sis['jurusan1']; ?></td>
                                    <td> <?= $sis['ptn2']; ?></td>
                                    <td> <?= $sis['jurusan2']; ?></td>
                                    <td> <?= $sis['baca']; ?></td>
                                    <td> <?= $sis['tulis']; ?></td>
                                    <td> <?= $sis['oleh']; ?></td>

                                </tr>

                                <?php $i++; ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- =======  Data-Table  = End  ===================== -->
    <!-- ============ Java Script Files  ================== -->


    <script src="<?= base_url('assets/table/assets/'); ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/table/assets/'); ?>js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/table/assets/'); ?>js/datatables.min.js"></script>
    <script src="<?= base_url('assets/table/assets/'); ?>js/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/table/assets/'); ?>js/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/table/assets/'); ?>js/custom.js"></script>




</body>

</html>