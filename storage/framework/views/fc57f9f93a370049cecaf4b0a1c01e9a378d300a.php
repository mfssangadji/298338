
<?php $__env->startSection('title', 'Artikel'); ?>
<?php $__env->startSection('content'); ?>
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Artikel</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo e(route('welcome')); ?>">Home</a></li>
					<li>Publikasi</li>
					<li>Artikel</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- 960 Container / End -->

	<!-- 960 Container -->
	<div class="container floated">

		<!-- Page Content -->
	<div class="eleven floated">

		<!-- Post -->
		<article class="post">

			<figure class="post-img picture">
				<a href="images/blog-01-large.jpg" rel="fancybox" title="First Light on the Lake"><img src="images/blog-01.jpg" alt="" /></a>
			</figure>

			<section class="date">
				<span class="day"><?php echo e($art->last()->created_at->format('d')); ?></span>
				<span class="month"><?php echo e($art->last()->created_at->format('M')); ?></span>
			</section>

			<section class="post-content">

				<header class="meta">
					<h2><a href="#"><?php echo e($art->last()->title); ?></a></h2>
					<span><i class="halflings user"></i>By <a href="#">admin</a></span>
					<span><i class="halflings tag"></i><a href="#">Boating</a>, <a href="#">Recreation</a></span>
				</header>

				<p><?php echo e($art->last()->description); ?></p>

			</section>

		</article>
		<!-- Divider -->
		<div class="clearfix"></div>

	<!-- Content / End -->
	</div>
	<!-- Content / End -->
	<!-- Sidebar -->
		<div class="four floated sidebar right">
			<?php echo $__env->make('parts.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
	<!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/darticles.blade.php ENDPATH**/ ?>