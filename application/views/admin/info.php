<button type="button" class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Informasi
</button>

<div class="row">
    <?= $this->session->flashdata('message'); ?>
    <!-- <?php foreach ($informasi as $info) : ?>
        <div class="col-md-4">
            <div class="card">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-primary"><i class="fa-solid fa-triangle-exclamation"></i> 06 Maret 2023</div>
                        <h5><?= $info['judul']; ?></h5>
                        <p><?= $info['isi']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?> -->
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Informasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="user" method="post" action="<?= base_url('admin/aksi_info'); ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Isi Informasi</label>
                        <textarea class="form-control" name="isi" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="admin" value="<?= $user['name']; ?>" required readonly class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>