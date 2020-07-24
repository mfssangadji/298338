
<?php $__env->startSection('title', 'Gallery'); ?>
<?php $__env->startSection('content'); ?>
	<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>Gallery</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
				<li>Gallery</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->

<!-- Page Content -->
<div class="page-content portfolio">

	<!-- 960 Container -->
	<div class="container">

		<!-- Portfolio Content -->
		<div id="portfolio-wrapper">
			<?php $__currentLoopData = $album; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<!-- 1/4 Column -->
				<div class="four columns isotope-item photography architecture technology">
					<a href="<?php echo e(url('gallery/'.$album->id)); ?>" class="portfolio-item isotope">
						<figure>
							<img src="docs/<?php echo e($album->gallery->first()->file); ?>" style="height: 150px !important; width: 100%; object-fit: cover;" alt=""/>
							<figcaption class="item-description">
								<h5><?php echo e($album->name); ?></h5>
							</figcaption>
						</figure>
					</a>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<!-- Portfolio Content / End -->

	</div>
	<!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/gallery.blade.php ENDPATH**/ ?>