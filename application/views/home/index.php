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
                <img src="<?= base_url('assets/'); ?>img/logoppdb.png" alt="Bootstrap" width="250">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('/'); ?>">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" aria-current="page" href="<?= base_url('/'); ?>">Data Pendaftar</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" aria-current="page" href="<?= base_url('/'); ?>">Kontak</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <a class="btn btn-outline-success" href="<?= base_url('auth/registration'); ?>" style="border-radius: 2em; padding-left:30px; padding-right:30px">Membuat Akun</a>
                </form>
            </div>
        </div>
    </nav>
    <section id="hero">
        <div class="container pt-3">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="350" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555" dy=".3em">First slide</text>
                                </svg>
                            </div>
                            <div class="carousel-item">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="350" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555" dy=".3em">First slide</text>
                                </svg>
                            </div>
                            <div class="carousel-item">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="350" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555" dy=".3em">First slide</text>
                                </svg>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form method="post" action="<?= base_url('auth'); ?>">
                                <div class="form-group">
                                    <label class="form-control-label">NISN</label>
                                    <input type="text" name="email" class="form-control">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <button class="btn btn-sm mt-3 btn-block w-100 text-white" type="submit" style="border-radius: 2em; background-color:green">L O G I N</button>


                                <div class="text-center mt-3">Belum Punya Akun? Daftar <a href="<?= base_url('auth/registration'); ?>" class="text-decoration-none">disini</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255, 255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255, 255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255, 255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#FFFFFF" />
            </g>
        </svg>
    </section>

    <section id="alur">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="shadow card">
                        <h3 class="card-header p-3 text-center">Alur Proses Pendaftaran</h3>
                        <p class="p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae ratione atque voluptas, exercitationem, consequuntur porro quis debitis ipsam architecto quisquam incidunt consectetur nostrum illo laborum sequi, perspiciatis id? Quo eius mollitia quae? Sed molestias ea vero neque in quam ducimus qui ipsam dolores eos nemo necessitatibus nisi nobis, vel illo ullam praesentium fugiat! Consectetur, assumenda! Similique alias nemo voluptas optio aliquam officia sequi, ab nesciunt. Perferendis quisquam dolorum voluptatibus hic quae commodi suscipit. Perferendis eaque odio architecto itaque repudiandae, esse cum eius recusandae, dolores blanditiis dolore illum saepe voluptas velit. Laboriosam veniam aut earum at libero officia natus debitis quo.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shadow card">
                        <h3 class="card-header p-3 text-center">Informasi Pendaftaran</h3>
                        <p class="p-3">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>List icons can</li>
                            <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>be used to</li>
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>replace bullets</li>
                            <li><span class="fa-li"><i class="fa-regular fa-square"></i></span>in lists</li>
                        </ul>

                        </p>
                    </div>
                </div>

            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#008000" fill-opacity="1" d="M0,96L60,106.7C120,117,240,139,360,138.7C480,139,600,117,720,101.3C840,85,960,75,1080,90.7C1200,107,1320,149,1380,170.7L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
        </svg>
    </section>
    <section id="data">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="shadow card">
                        <h3 class="card-header p-3 text-center">Data Pendaftar</h3>
                        <p class="p-3">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>List icons can</li>
                            <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>be used to</li>
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>replace bullets</li>
                            <li><span class="fa-li"><i class="fa-regular fa-square"></i></span>in lists</li>
                        </ul>

                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="shadow card">
                        <h3 class="card-header p-3 text-center">Data Diterima</h3>
                        <p class="p-3">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>List icons can</li>
                            <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>be used to</li>
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>replace bullets</li>
                            <li><span class="fa-li"><i class="fa-regular fa-square"></i></span>in lists</li>
                        </ul>

                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="shadow card">
                        <h3 class="card-header p-3 text-center">Quota Pendaftar</h3>
                        <p class="p-3">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>List icons can</li>
                            <li><span class="fa-li"><i class="fa-solid fa-check-square"></i></span>be used to</li>
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>replace bullets</li>
                            <li><span class="fa-li"><i class="fa-regular fa-square"></i></span>in lists</li>
                        </ul>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer class="text-center p-3">
        <div class="container text-center">Copyright ©2023 MAN 2 KOTA CIREBON </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>