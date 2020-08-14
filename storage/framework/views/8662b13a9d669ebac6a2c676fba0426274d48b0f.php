
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

		<?php $__currentLoopData = $art; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<!-- Post -->
			<article class="post medium">

			<div class="medium-image">
				<figure class="post-img picture">
					<a href="blog-post.html"><img src="<?php echo e($img[$art->id]); ?>" alt="" /></a>
				</figure>
			</div>

			<section class="date">
				<span class="day"><?php echo e($art->created_at->format('d')); ?></span>
				<span class="month"><?php echo e($art->created_at->format('M')); ?></span>
			</section>

			<div class="medium-content">

				<header class="meta">
					<h2><a href="blog-post.html"><?php echo e($art->title); ?></a></h2>
					<!-- <span><i class="halflings user"></i>By <a href="#">admin</a></span> -->
					<!-- <span><i class="halflings comments"></i>With <a href="#">12 Comments</a></span> -->
				</header>

				<p><?php echo e(strip_tags(substr($art->description, 0, 150))); ?>..</p>

				<a href="<?php echo e(url('article/'.$art->id)); ?>" class="button color">Read More</a>

			</div>

			</article>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<!-- Divider -->
		<!-- <div class="line"></div> -->

		<!-- Pagination -->
		<!-- <nav class="pagination">
			<ul>
				<li><a href="#" class="current">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">Next</a></li>
			</ul>
			<div class="clearfix"></div>
		</nav> -->

	</div>
	<!-- Content / End -->
	<!-- Sidebar -->
		<div class="four floated sidebar right">
			<?php echo $__env->make('parts.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
	<!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/articles.blade.php ENDPATH**/ ?>