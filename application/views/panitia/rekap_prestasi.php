<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Rekap Prestasi</title>
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
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">No PPDB</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Peringkat</th>
                                <th scope="col" class="text-center">Tingkat</th>
                                <th scope="col" class="text-center">Tahun</th>
                                <th scope="col" class="text-center">Link Sertifikat</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; ?>
                            <?php foreach ($siswa as $sis) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                    <td class="text-center"><?= $sis['no_daftar']; ?></td>
                                    <td><?= $sis['nama_siswa']; ?></td>
                                    <td><?= $sis['kegiatan']; ?></td>
                                    <td><?= $sis['tingkat']; ?></td>
                                    <td><?= $sis['peringkat']; ?></td>
                                    <td><?= $sis['tahun']; ?></td>
                                    <td>https://drive.google.com/file/d/<?= $sis['oleh']; ?>/preview</td>


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