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
    </style>
</head>

<body>
    <h2>Daftar Siswa PPDB MAN 2 Kota Cirebon <br>Tahun 2023/2024</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Pendaftar</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Asal Sekolah</th>
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
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </tbody>
    </table>


    <script>
        window.print();
    </script>
</body>

</html>