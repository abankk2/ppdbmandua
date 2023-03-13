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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart" style="width:100%;"></canvas>
            </div>
        </div>
    </div>
</div>


<?php
foreach ($rank_sekolah as $rs) {
    $asal_sekolah[] = $rs['asal_sekolah'];
    $jumlah[] = intval($rs['jumlah']);
}
// echo json_encode($jumlah);
?>
<script>
    var xValues = <?php
                    echo json_encode($asal_sekolah)
                    ?>;
    var yValues = <?php
                    echo json_encode($jumlah)
                    ?>;
    var barColors = "rgba(21,155,0,0.7)"

    new Chart("myChart", {
        type: "horizontalBar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Laporan Jumlah Siswa PPDB 2023/2024 Persekolah"
            },
            scales: {
                xAxes: [{
                    ticks: {
                        min: 0,
                        max: 50,
                    }
                }]
            }
        }
    });
</script>