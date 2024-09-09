<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Karyawan ALL</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $karyawanALL; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-city fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Cards for other categories -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Karyawan ACC & Blok BL</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $karyawanAccounting; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-city fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Karyawan BSD</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $karyawanBSD; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-city fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Karyawan PDC</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $karyawanPDC; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-city fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row -->

    <!-- Form Filter -->
    <form method="get" action="<?= base_url('home/index') ?>">
        <div class="form-group">
            <label for="periode">Pilih Periode:</label>
            <select name="periode" id="periode" class="form-control">
                <option value="hari" <?= $periode == 'hari' ? 'selected' : '' ?>>Harian</option>
                <option value="minggu" <?= $periode == 'minggu' ? 'selected' : '' ?>>Mingguan</option>
                <option value="bulan" <?= $periode == 'bulan' ? 'selected' : '' ?>>Bulanan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="grafik">Pilih Grafik:</label>
            <select name="grafik" id="grafik" class="form-control">
                <option value="kehadiran" <?= $grafik == 'kehadiran' ? 'selected' : '' ?>>Grafik Kehadiran</option>
                <option value="payroll" <?= $grafik == 'payroll' ? 'selected' : '' ?>>Grafik Payroll</option>
                <!-- Add other options if needed -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>

    <!-- Grafik Kehadiran atau Payroll -->
    <div class="card mt-4">
        <div class="card-header">
            Grafik <?= $grafik == 'payroll' ? 'Pembayaran Payroll' : 'Kehadiran Karyawan' ?>
        </div>
        <div class="card-body">
            <canvas id="grafikChart"></canvas>
        </div>
    </div>

    <!-- Grafik Donut -->
    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <div class="chart" id="penempatan-chart"></div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="chart" id="perusahaan-chart"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="chart" id="jeniskelamin-chart"></div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="chart" id="agama-chart"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="chart" id="statuskerja-chart"></div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="chart" id="statusmenikah-chart"></div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Grafik Bar (Kehadiran atau Payroll)
        var ctx = document.getElementById('grafikChart').getContext('2d');

        var grafikData = <?= json_encode($grafik == 'payroll' ? $grafik_payroll : $grafik_kehadiran) ?>;
        var labels = grafikData.map(item => item.tanggal);
        var data = grafikData.map(item => $grafik == 'payroll' ? item.total_payroll : item.jumlah_kehadiran);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: $grafik == 'payroll' ? 'Total Pembayaran Payroll' : 'Jumlah Kehadiran',
                        data: data,
                        backgroundColor: $grafik == 'payroll' ? 'rgba(255, 99, 132, 0.2)' : 'rgba(54, 162, 235, 0.2)',
                        borderColor: $grafik == 'payroll' ? 'rgba(255, 99, 132, 1)' : 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Grafik Donut
        var donutCharts = [
            { id: 'penempatan-chart', data: <?= json_encode($donut_penempatan) ?> },
            { id: 'perusahaan-chart', data: <?= json_encode($donut_perusahaan) ?> },
            { id: 'jeniskelamin-chart', data: <?= json_encode($donut_jeniskelamin) ?> },
            { id: 'agama-chart', data: <?= json_encode($donut_agama) ?> },
            { id: 'statuskerja-chart', data: <?= json_encode($donut_statuskerja) ?> },
            { id: 'statusmenikah-chart', data: <?= json_encode($donut_statusmenikah) ?> },
        ];

        donutCharts.forEach(function (chart) {
            var ctxDonut = document.getElementById(chart.id).getContext('2d');
            new Chart(ctxDonut, {
                type: 'doughnut',
                data: {
                    labels: chart.data.map(item => item.label),
                    datasets: [{
                        data: chart.data.map(item => item.value),
                        backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                        borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });
        });
    });
</script>
