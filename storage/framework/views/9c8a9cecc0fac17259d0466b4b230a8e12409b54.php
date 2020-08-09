
<?php $__env->startSection('title', 'Citra Satelit'); ?>
<?php $__env->startSection('content'); ?>
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Citra Satelit</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo e(route('welcome')); ?>">Home</a></li>
					<li>Meteo</li>
					<li>Citra Radar Ternate</li>
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
					<a href="https://dataweb.bmkg.go.id/MEWS/Radar/TERN_SingleLayerCRefQC.png" rel="fancybox" title="Citra Radar Ternate"><img src="https://dataweb.bmkg.go.id/MEWS/Radar/TERN_SingleLayerCRefQC.png" alt="" /></a>
				</figure>
			</article>

			<!-- About Author -->
			<section class="about-author">
				<img src="images/about.jpg" alt="" />
				<div class="about-description">
					<h4>Title</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</section>

			<!-- Divider -->
			<div class="line"></div>
		</div>
		<!-- Page Content / End -->

		<!-- Sidebar -->
		<div class="four floated sidebar right">
			<?php echo $__env->make('parts.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
	<!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/citra-radar.blade.php ENDPATH**/ ?>