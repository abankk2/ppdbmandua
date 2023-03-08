<div class="row">
    <div class="col-md-6">
        <?= $this->session->flashdata('message'); ?>
        <?php if ($siswa['kunci'] == 0) { ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading"><i class="fa-solid fa-triangle-exclamation fa-shake"></i> Perhatian !!</h4>
                <p>Anda Belum Mengunci Biodata, kunci biodata Anda sebelum mencetak Kartu Peserta</p>
            </div>
        <?php } else if ($siswa['kunci'] == 1) { ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"><i class="fa-solid fa-bell fa-shake"></i> Selamat !!</h4>
                <p>Biodata Anda Sudah di Kunci, silahkan Download Kartu Peserta</p>
                <a href="<?= base_url('user/cetak_kartu'); ?>" target="_blank" class="btn btn-success"><i class="fa-solid fa-file-pdf fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25;"></i> Download</a>
            </div>

        <?php }  ?>

    </div>
</div>