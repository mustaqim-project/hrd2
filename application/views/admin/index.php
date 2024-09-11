<!-- Begin Page Content -->
<div class="container-fluid">

	<style>
		.card {
			margin-bottom: 20px;
		}

		.card-body canvas {
			width: 300px;
			/* Atur lebar sesuai kebutuhan */
			height: 200px;
			/* Atur tinggi sesuai kebutuhan */
		}

		/* Untuk memastikan grafik menyesuaikan dengan ukuran kontainer */
		.card-body {
			display: flex;
			justify-content: center;
		}
	</style>

	<!-- Content Row -->
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Karyawan ALL</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?=
								$karyawanALL;
								?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-city fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Karyawan ACC & Blok BL</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?=
								$karyawanAccounting;
								?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-city fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Karyawan BSD</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
										<?=
										$karyawanBSD;
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-city fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Karyawan PDC</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?=
								$karyawanPDC;
								?>
							</div>
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

	<form method="get" action="<?= base_url('home/index') ?>">
		<div class="form-group">
			<label for="periode">Pilih Periode:</label>
			<select name="periode" id="periode" class="form-control">
				<option value="hari" <?= $periode == 'hari' ? 'selected' : '' ?>>Harian</option>
				<option value="minggu" <?= $periode == 'minggu' ? 'selected' : '' ?>>Mingguan</option>
				<option value="bulan" <?= $periode == 'bulan' ? 'selected' : '' ?>>Bulanan</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Tampilkan</button>
	</form>


	<div class="card">
		<div class="card-header">
			Grafik Kehadiran Karyawan
		</div>
		<div class="card-body">
			<canvas id="grafikKehadiran" width="300" height="200"></canvas>
		</div>
	</div>

	<!-- Grafik Payroll -->
	<div class="card">
		<div class="card-header">
			Grafik Pembayaran Payroll
		</div>
		<div class="card-body">
			<canvas id="grafikPayroll" width="300" height="200"></canvas>
		</div>
	</div>

	<!-- Grafik Status Pernikahan Karyawan -->
	<div class="card">
		<div class="card-header">
			Grafik Status Pernikahan Karyawan
		</div>
		<div class="card-body">
			<canvas id="grafikStatusNikah" width="300" height="200"></canvas>
		</div>
	</div>

	<!-- Grafik Jenis Kelamin -->
	<div class="card">
		<div class="card-header">
			Grafik Jenis Kelamin Karyawan
		</div>
		<div class="card-body">
			<canvas id="grafikJenisKelamin" width="300" height="200"></canvas>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Grafik Kehadiran
		document.addEventListener('DOMContentLoaded', function() {
			// Grafik Kehadiran
			var ctx1 = document.getElementById('grafikKehadiran').getContext('2d');
			new Chart(ctx1, {
				type: 'bar',
				data: {
					labels: <?= json_encode(array_column($grafik_kehadiran, 'tanggal')) ?>,
					datasets: [{
						label: 'Jumlah Kehadiran',
						data: <?= json_encode(array_column($grafik_kehadiran, 'jumlah_kehadiran')) ?>,
						backgroundColor: 'rgba(54, 162, 235, 0.2)',
						borderColor: 'rgba(54, 162, 235, 1)',
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});

			// Grafik Payroll
			var ctx2 = document.getElementById('grafikPayroll').getContext('2d');
			new Chart(ctx2, {
				type: 'bar',
				data: {
					labels: <?= json_encode(array_column($grafik_payroll, 'tanggal')) ?>,
					datasets: [{
						label: 'Total Pembayaran Payroll',
						data: <?= json_encode(array_column($grafik_payroll, 'total_payroll')) ?>,
						backgroundColor: 'rgba(255, 99, 132, 0.2)',
						borderColor: 'rgba(255, 99, 132, 1)',
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});
		});

		// Grafik Status Pernikahan
		var ctx3 = document.getElementById('grafikStatusNikah').getContext('2d');
		new Chart(ctx3, {
			type: 'bar',
			data: {
				labels: <?= json_encode(array_column($status_nikah, 'status_nikah')) ?>,
				datasets: [{
					label: 'Jumlah Karyawan',
					data: <?= json_encode(array_column($status_nikah, 'jumlah')) ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna latar belakang bar
					borderColor: 'rgba(255, 99, 132, 1)', // Warna border bar
					borderWidth: 1
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});

		// Grafik Jenis Kelamin
		var ctx4 = document.getElementById('grafikJenisKelamin').getContext('2d');
		new Chart(ctx4, {
			type: 'bar',
			data: {
				labels: <?= json_encode(array_column($jenis_kelamin, 'jenis_kelamin')) ?>,
				datasets: [{
					label: 'Jumlah Karyawan',
					data: <?= json_encode(array_column($jenis_kelamin, 'jumlah')) ?>,
					backgroundColor: 'rgba(153, 102, 255, 0.2)',
					borderColor: 'rgba(153, 102, 255, 1)',
					borderWidth: 1
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});
	});
</script>
<!-- Chart -->
<!-- Bar Chart -->
<!-- Jangan Dihapus -->
<!-- <div id="graph"></div> -->
<!-- Jangan Dihapus -->

<!-- Donut Chart -->
<div class="row">
	<div class="col-md-6 mb-4">
		<div class="chart" id="penempatan-chart"></div>
	</div>
	<div class="col-md-6 mb-4">
		<div class="chart" id="perusahaan-chart"></div>
	</div>
</div>

<!-- Donut Chart -->
<div class="row">
	<div class="col-md-6 mb-4">
		<div class="chart" id="jeniskelamin-chart"></div>
	</div>
	<div class="col-md-6 mb-4">
		<div class="chart" id="agama-chart"></div>
	</div>
</div>

<!-- Donut Chart -->
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


</div>
<!-- End of Main Content -->
