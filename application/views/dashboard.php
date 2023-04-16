<hr>
<div class="card-header bg-white">
	<h5 class="text-black op-7 mb-2"><img src="assets/img/2.png" width="37px"> Hallo, <b class="text-info"><?= userdata('nama'); ?></b></h5>
	<h4 class="h5 align-middle m-0 font-weight-bold text-danger">
		<marquee>Selamat Datang di Aplikasi Pengelolaan Aset</marquee>
	</h4>
</div>

<br>
<div class="row col-lg-12 mb-4">
	<div class="card border-left-info h-100 py-2">
		<div class="card-body">
			<div class="row no-gutters align-items-center">
				<div class="col mr-2">
					<p class="mb-0"><span id="tanggalwaktu"></span></p>
					<script>
						var tw = new Date();
						if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
						else(a = tw.getTime());
						tw.setTime(a);
						var tahun = tw.getFullYear();
						var hari = tw.getDay();
						var bulan = tw.getMonth();
						var tanggal = tw.getDate();
						var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
						var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
						document.getElementById("tanggalwaktu").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun;
					</script>
				</div>
				<div class="col-auto">
					<i class="fas fa-calendar fa-2x text-gray-300"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Total Transaksi Barang Perbulan pada Tahun <?= date('Y'); ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myAreaChart" width="669" height="320" class="chartjs-render-monitor" style="display: block; width: 669px; height: 320px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

		<!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Transaksi Barang</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myPieChart" width="302" height="245" class="chartjs-render-monitor" style="display: block; width: 302px; height: 245px;"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Barang Masuk
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Barang Keluar
                        </span>
                    </div>
                </div>
            </div>
        </div>

		
		<?php
		if ($gudang) :
			foreach ($gudang as $g) :
		?>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white"><?= $g['nama_gudang'] ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="<?= $g['id_gudang']; ?>" width="302" height="245" class="chartjs-render-monitor" style="display: block; width: 302px; height: 245px;"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Baik
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Rusak
                        </span>
						<span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Afkir
                        </span>
                    </div>
                </div>
            </div>
        </div>
		<?php endforeach; ?>
		<?php else : ?>
		<?php endif; ?>
    </div>

	<div class="row col-lg-12">
	<div class="bar-chart-container">
      <canvas id="bar-chart"></canvas>
    </div>
	</div>
