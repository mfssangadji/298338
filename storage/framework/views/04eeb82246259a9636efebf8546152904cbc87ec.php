
<?php $__env->startSection('title', 'Prakiraan Musim'); ?>
<?php $__env->startSection('content'); ?>
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Prakiraan Musim</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo e(route('welcome')); ?>">Home</a></li>
					<li>Meteo</li>
					<li>Var</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- 960 Container / End -->

	<!-- 960 Container -->
	<div class="container">

		<div class="sixteen columns" style="overflow: scroll;">
			<!-- Headline -->
			<div style="padding-bottom: 10px;"></div>
			<table class="standard-table">
				<tr>
					<th>No</th>
					<th>Jam</th>
					<th>Tanggal</th>
					<th>Documents</th>
				</tr>
				<?php $__currentLoopData = $var; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
					<tr>
						<td><?php echo e($loop->iteration); ?></td>
						<td><?php echo e($var->created_at->format('h:i A')); ?></td>
						<td><?php echo e($var->created_at->format('d F Y')); ?></td>
						<td>
							<a href="<?php echo e('docs/'.$var->file); ?>" title="Download" target="_blank">
								<i class="halflings dark search"></i>
							</a>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>

		</div>
	</div>
	<!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/pm.blade.php ENDPATH**/ ?>