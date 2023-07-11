<div class="row">
    <div class="col-md-4">
        <h4 class="text-center">REKAP PPDB</h4>
        <div class="card">
            <div class="card-body text-center">
                <a class="btn btn-primary mx-3" href="<?= base_url('admin/export'); ?>" role="button">Export Excl</a>
                <a class="btn btn-success mx-3" href="<?= base_url('admin/pdf'); ?>" role="button">Export PDF</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <h4 class="text-center">REKAP WAWANCARA</h4>
        <div class="card">
            <div class="card-body text-center">
                <a class="btn btn-primary mx-3" href="<?= base_url('panitia/export'); ?>" role="button">Export Excl</a>
                <a class="btn btn-success my-1" href="<?= base_url('panitia/pdf'); ?>" role="button">Sudah Wawancara Export PDF</a>
                <a class="btn btn-danger my-1" href="<?= base_url('panitia/pdf2'); ?>" role="button">Belum Wawancara Export PDF</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <h4 class="text-center">REKAP PRESTASI</h4>
        <div class="card">
            <div class="card-body text-center">
                <a class="btn btn-primary mx-3" href="<?= base_url('panitia/rekapprestasi'); ?>" role="button">Export Excl</a>
            </div>
        </div>
    </div>
</div>