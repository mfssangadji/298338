
<?php $__env->startSection('title', 'Peringatan Dini'); ?>
<?php $__env->startSection('content'); ?>
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Peringatan Dini</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo e(route('welcome')); ?>">Home</a></li>
					<li>Meteo</li>
					<li>Peringatan Dini</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- 960 Container / End -->

	<!-- 960 Container -->
	<div class="container floated">

		<!-- Page Content -->
		<div class="eleven floated">

			<!-- Comments -->
		<section class="comments-sec">
			<ol class="commentlist">
				<li>
					<div class="comment">
						<div class="avatar"><img src="<?php echo e(asset('images/attent.png')); ?>" style="width: 61px;" alt="" /> </div>
						<div class="comment-des"><div class="arrow-comment"></div>
							<div class="comment-by"><strong>John Doe</strong>
								<span class="reply">
									<a href="#">Share</a>
								</span>
							</div>
							<p>Maecenas dignissim euismod nunc, in commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</li>
			 </ol>

		</section>
		<div class="clearfix"></div>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/peringatan-dini.blade.php ENDPATH**/ ?>