<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB MAN 2 Kota Cirebon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/home.css">

    <style>
        .qr {
            display: none;
        }

        @media print {

            button,
            .btn,
            .bb,
            .text-end {
                display: none !important;
            }

            .qr {
                display: block !important;
                text-align: center;
                margin-top: 20px;
            }

            body {
                margin: 0;
                padding: 0;
            }

            .card {
                border: none !important;
                box-shadow: none !important;
            }
        }
    </style>

</head>

<body>
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">PENGUMUMAN HASIL SELEKSI</h1>
                <h4 class="text-center">PPDB MAN 2 KOTA CIREBON</h4>
                <h6 class="text-center mb-3">TAHUN PELAJARAN 2025/2026</h6>
                <div class="card p-3 shadow">
                    <h2 class="text-success">Selamat Anda Lulus!</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">NISN</th>
                                    <td>: <?= $hasil['NISN'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">No PPDB</th>
                                    <td>: <?= $hasil['PPDB'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td>: <?= $hasil['Nama Siswa'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Sekolah Asal</th>
                                    <td>: <?= $hasil['Asal Sekolah'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jadwal Lapor Diri</th>
                                    <td>: <?= $hasil['tgl'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jam</th>
                                    <td>: <?= $hasil['jam'] ?> WIB</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ruangan</th>
                                    <td>: <?= $hasil['ruangan'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center">
                        Silakan datang <b>Sesuai Jadwal yang sudah di tentukan</b> menghindari Antrian Panjang.
                        Harap membawa tanda bukti kelulusan seleksi untuk keperluan lapor diri dan <b>Wajib di Dampingi Orang Tua atau Wali</b>.
                    </p>

                    <div class="text-center bb mb-3">
                        Tanda bukti kelulusan dapat diunduh melalui tautan berikut: <br>
                        <button class="btn btn-sm mt-3 btn-block w-50 text-white" type="submit" style="border-radius: 2em; background-color:green" onclick="window.print()">Download</button>
                    </div>

                    <div class="qr text-center">
                        <img src="<?= $hasil['QR'] ?>" alt="QR Code" width="150">
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>