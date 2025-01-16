<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery-ui.css">


<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="login-right">
                            <div class="login-right-wrap">
                                <div class="text-center mb-4">
                                    <h1 class="text-gray-900">SELAMAT DATANG</h1>
                                    <h4>Di Web PPDB MAN 2 Kota Cirebon</h4>
                                    <h5>Tahun Pelajaran 2025/2026</h5>
                                    <p>Silahkan Ketikan NPSN sekolah Asal Anda</p>
                                    <small class="text-danger">Klik <a href="https://referensi.data.kemdikbud.go.id/pendidikan/dikdas/020000/1" target="_blank" class="badge rounded-pill bg-primary">disini</a> Jika tidak mengetahui NPSN Sekolah Asal Anda</small>

                                    <form action="<?= site_url('auth/submit_npsn'); ?>" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">NPSN SEKOLAH ASAL</label>
                                            <input type="number" id="title" name="title" class="form-control" required placeholder="NPSN">
                                        </div>
                                        <!-- <div class="mb-3">
                                        <label class="form-label">NAMA SEKOLAH</label>
                                        <input type="text" name="description" class="form-control" readonly>
                                    </div> -->
                                        <button type="submit" class="btn btn-success mt-3">Lanjutkan Untuk Mengisi Formulir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/'); ?>js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-ui.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#title').autocomplete({
            source: "<?= site_url('auth/get_autocomplete'); ?>",

            select: function(event, ui) {
                $('[name="title"]').val(ui.item.label);
                $('[name="description"]').val(ui.item.description);
            }
        });

    });
</script>