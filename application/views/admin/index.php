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


	<!-- Form untuk memilih periode -->
	<form method="get" action="<?= base_url('home/index'); ?>">
		<label for="periode">Pilih Periode:</label>
		<select name="periode" id="periode">
			<option value="hari" <?= ($periode == 'hari') ? 'selected' : '' ?>>Harian</option>
			<option value="minggu" <?= ($periode == 'minggu') ? 'selected' : '' ?>>Mingguan</option>
			<option value="bulan" <?= ($periode == 'bulan') ? 'selected' : '' ?>>Bulanan</option>
		</select>
		<button type="submit">Lihat Grafik</button>
	</form>

	<canvas id="grafikKehadiran"></canvas>

	<h2>Grafik Pembayaran Payroll</h2>
	<canvas id="grafikPayroll"></canvas>

	<script>
		// Data Kehadiran
		var kehadiranLabels = <?= json_encode(array_column($grafik_kehadiran, 'tanggal')) ?>;
		var kehadiranData = <?= json_encode(array_column($grafik_kehadiran, 'jumlah_kehadiran')) ?>;

		// Grafik Kehadiran
		var ctxKehadiran = document.getElementById('grafikKehadiran').getContext('2d');
		var grafikKehadiran = new Chart(ctxKehadiran, {
			type: 'bar',
			data: {
				labels: kehadiranLabels,
				datasets: [{
					label: 'Jumlah Kehadiran',
					data: kehadiranData,
					backgroundColor: 'rgba(54, 162, 235, 0.5)',
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

		// Data Payroll
		var payrollLabels = <?= json_encode(array_column($grafik_payroll, 'tanggal')) ?>;
		var payrollData = <?= json_encode(array_column($grafik_payroll, 'total_payroll')) ?>;

		// Grafik Payroll
		var ctxPayroll = document.getElementById('grafikPayroll').getContext('2d');
		var grafikPayroll = new Chart(ctxPayroll, {
			type: 'bar',
			data: {
				labels: payrollLabels,
				datasets: [{
					label: 'Total Payroll (Rp)',
					data: payrollData,
					backgroundColor: 'rgba(255, 99, 132, 0.5)',
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
