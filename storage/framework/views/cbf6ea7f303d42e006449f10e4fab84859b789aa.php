
<?php $__env->startSection('title', 'Flyer'); ?>
<?php $__env->startSection('content'); ?>
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Flyer</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo e(route('welcome')); ?>">Home</a></li>
					<li>Publikasi</li>
					<li>Flyer</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- 960 Container / End -->

	<!-- 960 Container -->
	<div class="container">

		<!-- Portfolio Content -->
		<div id="portfolio-wrapper">

			<!-- 1/2 Column -->
			<?php $__currentLoopData = $var; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="eight columns isotope-item photography architecture technology">
					<a href="<?php echo e('docs/'.$var->file); ?>" class="portfolio-item isotope">
						<figure>
							<img src="<?php echo e('docs/'.$var->file); ?>" style="width: 500px; height: 330px;" alt=""/>
							<!-- <figcaption class="item-description">
								<h5>Time Is Running Out</h5>
								<span>Photography</span>
							</figcaption> -->
						</figure>
					</a>	
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</div>
		<!-- Portfolio Content / End -->
	</div>
	<!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/flyer.blade.php ENDPATH**/ ?>