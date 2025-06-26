<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB MAN 2 Kota Cirebon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/home.css">

    <style>
        @media print {

            button,
            .btn,
            .text-end {
                display: none !important;
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
                <h4 class="text-center mb-3">PPDB MAN 2 KOTA CIREBON TAHUN PELAJARAN 2025/2026</h4>
                <div class="card p-3 shadow text-center">
                    <h2 class="text-danger">NISN Tidak Terdaftar</h2>
                    <p>Silakan menghubungi Panitia PPDB dan tunjukkan Kartu Tes Tulis Anda pada tanggal 1 Juli 2025, pukul 08.00 s.d. 14.00 WIB.</p>
                    <div class="text-center mb-3">
                        <a href="<?= base_url('pengumuman'); ?>" class="btn btn-sm mt-3 btn-block w-50 text-white" style="border-radius: 2em; background-color:green">Cek NISN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>