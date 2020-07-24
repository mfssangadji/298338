
<?php $__env->startSection('title', 'Citra Satelit'); ?>
<?php $__env->startSection('content'); ?>
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Prakiraan <span>Cuaca Bandara</span></h2>

			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo e(route('welcome')); ?>">Home</a></li>
					<li>Meteo</li>
					<li>Prakiraan Cuaca Bandara</li>
				</ul>
			</nav>

		</div>

	</div>
	<!-- 960 Container / End -->

	<!-- Page Content -->
	<div class="page-content">

		<!-- 960 Container -->
		<div class="container">
			<div class="sixteen columns">
				<!-- Filters -->
				<select id="filters" onChange="window.document.location.href=this.options[this.selectedIndex].value;" style="padding: 10px; background-color: #F2F2F2; width: 200px;">
					<option selected disabled>Forecast</option>
					<?php for($i=1; $i<=12; $i++): ?>
						<?php if($i == $get): ?>
							<option value="<?php echo e(url('prakiraan-cuaca-bandara').'/'.$i); ?>" selected><?php echo e($i); ?> jam yang akan datang</option>
						<?php else: ?>
							<option value="<?php echo e(url('prakiraan-cuaca-bandara').'/'.$i); ?>"><?php echo e($i); ?> jam yang akan datang</option>
						<?php endif; ?>
					<?php endfor; ?>
				</select>
			</div>
		</div>
		<!-- 960 Container / End -->

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
							<th>Waktu Prakiraan</th>
							<th>Arah (dari)</th>
							<th>Kecepatan (km/jam)</th>
							<th>Jarak Pandang (km)</th>
							<th>Cuaca</th>
							<th>Probabilitas</th>
						</tr>

						<?php $__currentLoopData = $forecast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$time = explode(" ", $attr['time']);
							?>
							<tr>
								<td><?php echo e($loop->iteration); ?></td>
								<td><?php echo e($key); ?></td>
								<td><?php echo e($time[1]); ?> <?php echo e($attr['time_zone']); ?></td>
								<td><?php echo e($attr['wind_direction']); ?></td>
								<td><?php echo e($attr['wind_speed']); ?></td>
								<td><?php echo e($attr['visibility']); ?></td>
								<td><?php echo e($attr['weather']); ?></td>
								<td><?php echo e($attr['probability']); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/pcuaca-bandara.blade.php ENDPATH**/ ?>