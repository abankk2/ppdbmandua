<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB MAN 2 Kota Cirebon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <style>
        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        h4 {
            text-align: center;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }

        .ttd {
            float: right;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <img src="<?= base_url('assets/'); ?>img/kop.png" alt="">
    <h4>Daftar Rekap Wawancara Siswa PPDB MAN 2 Kota Cirebon <br>Tahun 2023/2024</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Pendaftar</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Mapel</th>
                <th>Keterampilan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1; ?>
            <?php foreach ($siswa as $sis) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $sis['no_daftar']; ?></td>
                    <td><?= $sis['nisn']; ?></td>
                    <td><?= $sis['nama']; ?></td>
                    <td><?= $sis['mapel']; ?></td>
                    <td><?= $sis['keterampilan1']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </tbody>
    </table>


    <div class="container mt-5">
        <div class="row">
            <table class="table text-center">
                <tbody>
                    <tr>
                        <td rowspan="2" class="text-center">Jumlah Siswa</td>
                        <td colspan="6">Mapel</td>
                        <td colspan="3">Keterampilan</td>
                    </tr>
                    <tr>
                        <td>TekSa</td>
                        <td>Keag</td>
                        <td>Kes</td>
                        <td>Kegu</td>
                        <td>Hum</td>
                        <td>Kerja</td>
                        <td>TBSM</td>
                        <td>Tata Boga</td>
                        <td>Multi Media</td>
                    </tr>
                    <tr>
                        <td><b><?= $jml; ?></b></td>
                        <td><?= $teksan; ?></td>
                        <td><?= $agama; ?></td>
                        <td><?= $kes; ?></td>
                        <td><?= $guru; ?></td>
                        <td><?= $human; ?></td>
                        <td><?= $kerja; ?></td>
                        <td><?= $tbsm; ?></td>
                        <td><?= $tata; ?></td>
                        <td><?= $multi; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-4">
            <p>
                <br>Petugas PPDB 2023
            </p>
            <br><br><br>
            <p><b><?= $user['name']; ?></b>
                <br>
            </p>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <p>Cirebon, <?= date('d F Y'); ?>
                <br>Ketua PPDB 2023
            </p>
            <br><br><br>
            <p><b>H. M. SAEFUDIN, SH</b>
                <br>NIP. 19660609 200604 1 002
            </p>
        </div>
    </div>



    <!-- <script>
        window.print();
    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>