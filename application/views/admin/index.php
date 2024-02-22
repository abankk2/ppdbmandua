<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<div class="row">
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-1">
                        <i class="fa-solid fa-user-gear"></i>
                    </span>
                    <div class="dash-count">
                        <div class="dash-title">Admn PPDB</div>
                        <div class="dash-counts">
                            <p><?= $admin; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-2">
                        <i class="fa-solid fa-user-graduate"></i>
                    </span>
                    <div class="dash-count">
                        <div class="dash-title">Siswa PPDB</div>
                        <div class="dash-counts">
                            <p><?= $siswa; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-3">
                        <i class="fa-solid fa-school"></i>
                    </span>
                    <div class="dash-count">
                        <div class="dash-title">Jumlah Sekolah</div>
                        <div class="dash-counts">
                            <p><?= $sekolah; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card p-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col" class="text-center">Jumlah</th>
                        <th scope="col" class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Laki - Laki</td>
                        <td class="text-center"><?= $laki; ?></td>
                        <td rowspan="2" class="text-center"><?= $laki + $perempuan; ?></td>
                    </tr>
                    <tr>
                        <td>Perempuan</td>
                        <td class="text-center"><?= $perempuan; ?></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-3">
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sekolah</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1; ?>
                    <?php foreach ($rank_sekolah as $rank) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $rank['asal_sekolah']; ?></td>
                            <td><?= $rank['jumlah']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>