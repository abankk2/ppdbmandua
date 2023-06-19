<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB MAN 2 Kota Cirebon</title>

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

        h2 {
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
    <h2>Daftar Rekap Siswa Belum Wawancara PPDB MAN 2 Kota Cirebon <br>Tahun 2023/2024</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Pendaftar</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Asal Sekolah</th>
                <th>Whatsapp</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1; ?>
            <?php foreach ($siswa as $sis) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?php echo $sis['no_daftar']; ?></td>
                    <td><?php echo $sis['nisn']; ?></td>
                    <td><?php echo $sis['nama_siswa']; ?></td>
                    <?php if ($sis['jk'] == 1) { ?>
                        <td> Laki - Laki</td>
                    <?php } else if ($sis['jk'] == 2) { ?>
                        <td>Perempuan</td>
                    <?php } ?>
                    <td><?php echo $sis['asal_sekolah']; ?></td>
                    <td><?php echo $sis['no_hp']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </tbody>
    </table>

    <div class="ttd">
        <p>Cirebon, <?= date('d F Y' . ' | ' . 'H:s'); ?> WIB
            <br>Ketua PPDB 2023
        </p>
        <br><br><br>
        <p><b>H. MUHAMMAD SAEFUDIN, SH</b>
            <br>NIP. 19660609 200604 1 002
        </p>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>