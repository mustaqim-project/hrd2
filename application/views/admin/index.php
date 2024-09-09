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

	<canvas id="kehadiranChart"></canvas>
	<canvas id="payrollChart"></canvas>

	<script>
		var ctx1 = document.getElementById('kehadiranChart').getContext('2d');
		var kehadiranChart = new Chart(ctx1, {
			type: 'bar',
			data: {
				labels: [ /* Data tanggal atau bulan dari PHP */ ],
				datasets: [{
					label: 'Kehadiran',
					data: [ /* Data jumlah kehadiran dari PHP */ ],
					backgroundColor: 'rgba(75, 192, 192, 0.2)',
					borderColor: 'rgba(75, 192, 192, 1)',
					borderWidth: 1
				}]
			}
		});

		var ctx2 = document.getElementById('payrollChart').getContext('2d');
		var payrollChart = new Chart(ctx2, {
			type: 'bar',
			data: {
				labels: [ /* Data tanggal atau bulan dari PHP */ ],
				datasets: [{
					label: 'Total Gaji',
					data: [ /* Data jumlah gaji dari PHP */ ],
					backgroundColor: 'rgba(153, 102, 255, 0.2)',
					borderColor: 'rgba(153, 102, 255, 1)',
					borderWidth: 1
				}]
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
