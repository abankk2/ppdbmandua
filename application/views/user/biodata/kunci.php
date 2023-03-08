<div class="row">
    <div class="col-md-6">
        <?= $this->session->flashdata('message'); ?>
        <?php if ($siswa['kunci'] == 0) { ?>
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading"><i class="fa-solid fa-triangle-exclamation fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25;"></i> Perhatian !!</h4>
                <p>Jika anda melakukan kunci biodata maka biodata tidak bisa di edit kembali, pastikan semua biodata anda sudah benar.</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?= base_url('user/bio_kunci'); ?>">
                        <input type="text" name="nisn" value="<?= $siswa['nisn']; ?>" class="form-control d-none" required>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="kunci" id="kunci" required>
                            <label class="form-check-label" for="kunci">
                                Saya dengan ini menyatakan bahwa saya telah mengisi biodata dengan sebenar-benarnya dan saya sepenuhnya membenarkan segala informasi yang terdapat di dalamnya. Saya bertanggung jawab atas kebenaran informasi tersebut dan siap menanggung akibat yang timbul apabila terdapat kesalahan atau ketidakbenaran dalam biodata saya. Oleh karena itu, saya menyetujui dan membenarkan biodata yang telah saya isi.
                            </label>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-lock-open"></i> Kunci Biodata</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php } else if ($siswa['kunci'] == 1) { ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading"><i class="fa-solid fa-lock fa-shake"></i> Biodata Anda Sudah di Kunci !!</h4>
                <p>Jika Masih ada Kesalahan silahkan datang ke Sekretariat PPDB MAN 2 Kota Cirebon, jika biodata anda sudah sesuai silahkan cetak Kartu Peserta Anda.</p>
                <a class="btn btn-outline-danger btn-sm" target="_blank" href="https://goo.gl/maps/g1NYRVBmf3snbtFg7"><i class="fa-solid fa-location-dot"></i> Lokasi</a>
            </div>
        <?php }  ?>

    </div>
</div>