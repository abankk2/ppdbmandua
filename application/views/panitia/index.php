<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-info">
                                <i class="fa-solid fa-user-graduate"></i>
                            </span>
                            <div class="dash-count">
                                <div class="dash-title">CAPSESDIK</div>
                                <div class="dash-counts">
                                    <h3><?= $siswa; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-success">
                                <i class="fa-solid fa-headset"></i>
                            </span>
                            <div class="dash-count">
                                <div class="dash-title">WAWANCARA</div>
                                <div class="dash-counts">
                                    <h3><?= $jm_wawancara; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-danger">
                                <i class="fa-solid fa-headset"></i>
                            </span>
                            <div class="dash-count">
                                <div class="dash-title">BELUM WAWANCARA</div>
                                <div class="dash-counts">
                                    <h3><?= $siswa - $jm_wawancara; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url('panitia/print'); ?>" class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                            <i class="fa-solid fa-print"></i>
                            </span>
                            <div class="dash-count">
                                <div class="dash-title text-dark">PRINT REKAP</div>
                                <div class="dash-counts">
                                    <h3>HARI INI</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <h5>Update Keterampilan</h5>
        <div class="table-responsive card p-3">
            <table class="table table-striped">
                <thead class="bg-dark text-white">
                    <tr class="text-center">
                        <th scope="col">KET</th>
                        <th scope="col">TBSM</th>
                        <th scope="col">TATA BOGA</th>
                        <th scope="col">MULTIMEDIA</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>KUOTA</td>
                        <td>70</td>
                        <td>105</td>
                        <td>105</td>
                    </tr>
                    <tr>
                        <td>TERDAFTAR</td>
                        <td id="tbsm"><?= $tbsm; ?></span></td>
                        <td id="tata"><?= $tata; ?></span></td>
                        <td id="multimedia"><?= $multimedia; ?></span></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

</div>



<script>
    $(document).ready(function() {
        // Fungsi untuk memperbarui jumlah siswa
        function updateTBSM() {
            $.ajax({
                url: '<?= base_url('panitia/get_tbsm') ?>', // Ganti dengan URL aksi CodeIgniter Anda untuk mengambil total siswa
                method: 'GET',
                success: function(response) {
                    $('#tbsm').text(response); // Memperbarui elemen dengan respons dari server
                }
            });
        }

        // Memperbarui jumlah siswa setiap 5 detik
        setInterval(updateTBSM, 100); // Ganti dengan interval yang Anda inginkan
    });
</script>

<script>
    $(document).ready(function() {
        // Fungsi untuk memperbarui jumlah siswa
        function updateTATABOGA() {
            $.ajax({
                url: '<?= base_url('panitia/get_tata') ?>', // Ganti dengan URL aksi CodeIgniter Anda untuk mengambil total siswa
                method: 'GET',
                success: function(response) {
                    $('#tata').text(response); // Memperbarui elemen dengan respons dari server
                }
            });
        }

        // Memperbarui jumlah siswa setiap 5 detik
        setInterval(updateTATABOGA, 100); // Ganti dengan interval yang Anda inginkan
    });
</script>

<script>
    $(document).ready(function() {
        // Fungsi untuk memperbarui jumlah siswa
        function updateMulti() {
            $.ajax({
                url: '<?= base_url('panitia/get_multi') ?>', // Ganti dengan URL aksi CodeIgniter Anda untuk mengambil total siswa
                method: 'GET',
                success: function(response) {
                    $('#multimedia').text(response); // Memperbarui elemen dengan respons dari server
                }
            });
        }

        // Memperbarui jumlah siswa setiap 5 detik
        setInterval(updateMulti, 100); // Ganti dengan interval yang Anda inginkan
    });
</script>