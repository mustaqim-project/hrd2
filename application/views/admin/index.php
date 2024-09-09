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


	<div class="container-fluid">
		<!-- Filter Periode -->
		<form method="get" action="<?= site_url('home') ?>">
			<div class="form-group">
				<label for="periode">Pilih Periode:</label>
				<select name="periode" id="periode" class="form-control" onchange="this.form.submit()">
					<option value="bulan" <?= $periode == 'bulan' ? 'selected' : '' ?>>Bulan</option>
					<option value="minggu" <?= $periode == 'minggu' ? 'selected' : '' ?>>Minggu</option>
					<option value="hari" <?= $periode == 'hari' ? 'selected' : '' ?>>Hari</option>
				</select>
			</div>
		</form>

		<!-- Grafik Kehadiran -->
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-chart-bar"></i> Grafik Kehadiran Karyawan
			</div>
			<div class="card-body">
				<canvas id="grafikKehadiran"></canvas>
			</div>
		</div>

		<!-- Grafik Payroll -->
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-chart-bar"></i> Grafik Pembayaran Payroll
			</div>
			<div class="card-body">
				<canvas id="grafikPayroll"></canvas>
			</div>
		</div>
	</div>

	<!-- Script untuk grafik menggunakan Chart.js -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		const kehadiranData = <?= json_encode($grafik_kehadiran) ?>;
		const payrollData = <?= json_encode($grafik_payroll) ?>;

		function generateLabels(data) {
			return data.map(item => {
				const date = new Date(item.tanggal);
				if ('bulan' === '<?= $periode ?>') {
					return `${date.getMonth() + 1}/${date.getFullYear()}`;
				} else if ('minggu' === '<?= $periode ?>') {
					return `Minggu ${date.getWeek()} ${date.getFullYear()}`;
				} else {
					return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;
				}
			});
		}

		function generateData(data) {
			return data.map(item => item.jumlah_kehadiran || item.total_payroll);
		}

		// Grafik Kehadiran
		const ctxKehadiran = document.getElementById('grafikKehadiran').getContext('2d');
		new Chart(ctxKehadiran, {
			type: 'bar',
			data: {
				labels: generateLabels(kehadiranData),
				datasets: [{
					label: 'Jumlah Kehadiran',
					data: generateData(kehadiranData),
					backgroundColor: 'rgba(75, 192, 192, 0.2)',
					borderColor: 'rgba(75, 192, 192, 1)',
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
		const ctxPayroll = document.getElementById('grafikPayroll').getContext('2d');
		new Chart(ctxPayroll, {
			type: 'bar',
			data: {
				labels: generateLabels(payrollData),
				datasets: [{
					label: 'Total Pembayaran Payroll',
					data: generateData(payrollData),
					backgroundColor: 'rgba(153, 102, 255, 0.2)',
					borderColor: 'rgba(153, 102, 255, 1)',
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
