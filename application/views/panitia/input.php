<div class="row">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-body">
                <small><i>Nama Lengkap :</i></small>
                <h4><?= $siswa['nama']; ?></h4>
                <small><i>NISN :</i></small>
                <h4><?= $siswa['slug']; ?></h4>
                <small><i>Asal Sekolah :</i></small>
                <h4><?= $siswa['sekolah']; ?></h4>
                <small><i>Asal Sekolah :</i></small>
                <h4><?= $siswa['no_ppdb']; ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card shadow">
            <form action="">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>