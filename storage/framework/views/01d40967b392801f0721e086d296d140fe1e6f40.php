
<?php $__env->startSection('title', 'Aerodrom Wind Shear Warning'); ?>
<?php $__env->startSection('content'); ?>
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Aerodrom Wind Shear Warning</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo e(route('welcome')); ?>">Home</a></li>
					<li>Meteo</li>
					<li>Aerodrom Wind Shear Warning</li>
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
		<section class="comments-sec" style="width: 100% !important">
			<ol class="commentlist" >
				<?php $i=1; ?>
				<?php $__currentLoopData = $aerodrome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aerodrome): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($i==1): ?>
						<li>
							<div class="comment" >
								<div class="avatar">
									<img src="<?php echo e(asset('images/attent.png')); ?>" style="width: 61px;" alt="" />
								</div>
								<div class="comment-des">
									<div class="comment-by"><strong><?php echo e($aerodrome->created_at->format("d F Y")); ?> (<?php echo e($aerodrome->created_at->format("h:i A")); ?>)</strong>
										<span class="reply">
											<a href="#">Share</a>
										</span>
									</div>
									<p><?php echo e($aerodrome->content); ?></p>
								</div>
							</div>
						</li>
						<?php $i++; ?>
					<?php else: ?>
						<?php
							$arr[] = array(
								'content' => $aerodrome->content,
								'created_at' => $aerodrome->created_at,
							);
						?>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			 </ol>
		</section>
		<div class="clearfix"></div>
		<!-- Divider -->
		<div class="eight columns" style="width: 100% !important; text-align: justify;">
			<h3 class="margin">Peringatan <span>Sebelumnya</span></h3>
			<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="four" style="margin-bottom: 2px;">
					<article class="recent-blog" style="margin-bottom: 50px;">
						<section class="date">
							<span class="day"><?php echo e($arr['created_at']->format('d')); ?></span>
							<span class="month"><?php echo e($arr['created_at']->format('M')); ?></span>
						</section>
						<p><?php echo e($arr['content']); ?></p>
					</article>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<!-- Sidebar -->
		<div class="four floated sidebar right">
			<?php echo $__env->make('parts.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
	<!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/aerodrome.blade.php ENDPATH**/ ?>