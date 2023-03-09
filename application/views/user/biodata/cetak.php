<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Kartu Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/home.css">

    <style>
        .line {
            border-style: double;
            border-radius: 1em;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="row justify-content-center mt-3">
            <div class="card mb-3 col-lg-6">
                <div class="row line">
                    <div class="col-4">
                        <img src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" class="card-img my-3">
                        </small>
                        <small class="text-muted">Tgl. Daftar : <?= date('d M Y', $siswa['date_created']); ?> <br> Tgl. Cetak : <?= date("d M Y") . " JAM : " . date("H:i"); ?></small>
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <small class="mb-0">No. Peserta</small>
                            <h5 class="card-title"><?= $siswa['no_daftar']; ?></h5>

                            <small class="mb-0 mt-3">Nama</small>
                            <h3 class="card-title"><?= $siswa['nama_siswa']; ?></h3>

                            <small class="mb-0 mt-3">Jenis Kelamin</small>
                            <?php if ($siswa['jk'] == 1) { ?>
                                <h3 class="card-title">Laki - Laki</h3>
                            <?php } else if ($siswa['jk'] == 2) { ?>
                                <h3 class="card-title">Perempuan</h3>
                            <?php } ?>



                            <small class="mb-0">Asal Sekolah</small>
                            <h5 class="card-title"><?= $siswa['asal_sekolah']; ?> <br><small><?= $siswa['npsn_sekolah']; ?></small>
                            </h5>

                            <small class="mb-0">Jalur Pendaftaran</small>
                            <?php if ($siswa['jalur'] == 1) { ?>
                                <h5 class="card-title">Prestasi</h5>
                            <?php } else if ($siswa['jalur'] == 2) { ?>
                                <h5 class="card-title">Reguler</h5>
                            <?php } ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>