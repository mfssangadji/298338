
<?php $__env->startSection('title', 'Citra Satelit'); ?>
<?php $__env->startSection('content'); ?>
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Cuaca <span>Aktual Bandara</span></h2>

			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo e(route('welcome')); ?>">Home</a></li>
					<li>Meteo</li>
					<li>Cuaca Aktual Bandara</li>
				</ul>
			</nav>

		</div>

	</div>
	<!-- 960 Container / End -->

	<!-- Page Content -->
	<div class="page-content">
		<!-- 960 Container -->
		<div class="container">
		<!-- Regular Table
		================================================== -->
			<div class="sixteen columns">
				<!-- Headline -->
				<div class="small-table" style="overflow: scroll; height: 600px">
					<table>
						<tr>
							<th>No</th>
							<th>Bandara/Stasiun</th>
							<th>Waktu Pengamatan</th>
							<th>Arah (dari)</th>
							<th>Kecepatan (km/jam)</th>
							<th>Jarak Pandang (km)</th>
							<th>Cuaca</th>
							<th>Suhu (&deg;C)</th>
							<th>Titik Embun (&deg;C)</th>
							<th>Tekanan Udara (hPa)</th>
						</tr>

						<?php $__currentLoopData = $forecast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$time = explode(" ", $attr['observed_time']);
							?>
							<tr>
								<td><?php echo e($loop->iteration); ?></td>
								<td><?php echo e($key); ?></td>
								<td><?php echo e($time[1]); ?> <?php echo e($attr['time_zone']); ?></td>
								<td><?php echo e($attr['wind_direction']); ?></td>
								<td><?php echo e($attr['wind_speed']); ?></td>
								<td><?php echo e($attr['visibility']); ?></td>
								<td><?php echo e($attr['weather']); ?></td>
								<td><?php echo e($attr['temp']); ?></td>
								<td><?php echo e($attr['dew_point']); ?></td>
								<td><?php echo e($attr['pressure']); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/cuaca-aktual-bandara.blade.php ENDPATH**/ ?>