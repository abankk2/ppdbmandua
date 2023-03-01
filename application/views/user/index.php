<style>
    .form-control {
        border: 0;
    }
</style>

<div class="row justify-content-lg-center">
    <div class="col-lg-10">

        <div class="profile-cover">
            <div class="profile-cover-wrap">
                <img class="profile-cover-img" src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" alt=" Profile Cover">

                <div class="cover-content">

                </div>

            </div>
        </div>
        <div class="text-center mb-5">
            <label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
                <img class="avatar-img" src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" alt="Profile Image">
            </label>
            <h2><?= $user['name']; ?></h2>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <i class="fa-solid fa-user-graduate"></i> <?= $user['email']; ?>
                </li>
                <li class="list-inline-item">
                    <i class="fa-regular fa-address-book"></i> <span>0012</span>
                </li>
                <li class="list-inline-item">
                    <i class="far fa-calendar-alt"></i> <span>Daftar <?= date('d F Y', $user['date_created']); ?></span>
                </li>
            </ul>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-1">Nama Lengkap</p>
                        <h5><?= $user['name']; ?></h5>
                        <p class="mb-1">NISN</p>
                        <h5><?= $user['email']; ?></h5>
                        <p class="mb-1">No. Registrasi</p>
                        <h5>0012</h5>
                        <p class="mb-1">Tgl. Registrasi</p>
                        <h5><?= date('d F Y', $user['date_created']); ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h4>Biodata</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <label class="col-lg-3 col-form-label">Tempat Lahir</label>
                            <div class="col-lg-9">
                                <div class="form-control">Majalengka</div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-lg-3 col-form-label">Tgl. Lahir</label>
                            <div class="col-lg-9">
                                <div class="form-control">16 November 1992</div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-lg-3 col-form-label">Tgl Lahir</label>
                            <div class="col-lg-9">
                                <div class="form-control">16 November 1992</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>