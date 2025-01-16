<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/76a945766d.js' crossorigin='anonymous'></script>
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/icon.png">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/home.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/'); ?>">
                <img src="<?= base_url('assets/'); ?>img/logoppdb1.png" alt="Bootstrap" width="250">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('home'); ?>">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" aria-current="page" href="<?= base_url('home/data'); ?>">Data Pendaftar</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" aria-current="page" href="<?= base_url('home/kontak'); ?>">Kontak</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <a class="btn btn-outline-success" href="<?= base_url('daftar/registration'); ?>" style="border-radius: 2em; padding-left:30px; padding-right:30px">Pendaftaran</a>
                </form>
            </div>
        </div>
    </nav>