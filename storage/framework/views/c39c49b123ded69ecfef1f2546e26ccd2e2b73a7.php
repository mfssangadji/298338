
<?php $__env->startSection('title', 'Citra Satelit'); ?>
<?php $__env->startSection('content'); ?>
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Form Permintaan Data</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo e(route('welcome')); ?>">Home</a></li>
					<li>Pelayanan Data</li>
					<li>Form Permintaan Data</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- 960 Container / End -->

	<!-- 960 Container -->
	<div class="container floated">

		<!-- Sidebar -->
		<div class="four floated sidebar left">
			<?php echo $__env->make('parts.left-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
		<!-- Sidebar / End -->

		<!-- Page Content -->
		<div class="eleven floated right">
			<section class="page-content">
				<?php if($message = Session::get('success')): ?>
				    <div class="notification success closeable">
						<p><span>Success!</span> <?php echo e($message); ?></p>
					</div>
			    <?php endif; ?>
				<h3 class="margin-reset">Lokasi Kami</h3>
				<br />
				<!-- Google Maps -->
				<section class="google-map-container">
				    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.399175039276!2d127.3768723815885!3d0.8305144146166081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x329cb21ceec63dd1%3A0xa9ab47aa4924dba3!2sBandara%20Sultan%20Babullah%20Ternate!5e0!3m2!1sid!2sid!4v1576206825593!5m2!1sid!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</section>
				<!-- Google Maps / End -->


				<h3 class="margin">Form Permintaan Data</h3>
				<p class="margin">Lengkapi form dibawah ini untuk melakukan permintaan data</p>

					<!-- Contact Form -->
					<section id="contact">

						<!-- Success Message -->
						<mark id="message"></mark>

						<!-- Form -->
						<form method="POST" action="">
							<?php echo csrf_field(); ?>
							<fieldset>
								<div>
									<label for="name" accesskey="U">Name:</label>
									<input name="name" required type="text" id="name" />
								</div>

								<div>
									<label for="email" accesskey="E">Email:</label>
									<input name="email" required type="email" id="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" />
								</div>

								<div>
									<label for="no_telp" accesskey="U">No. Telp:</label>
									<input name="no_telp" required type="text" id="no_telp" />
								</div>

								<div>
									<label for="pesan" accesskey="C">Pesan: </label>
									<textarea name="pesan" required cols="40" rows="3" id="pesan" spellcheck="true"></textarea>
								</div>

							</fieldset>
							<input type="submit" class="submit" id="submit" value="Kirim" />
							<div class="clearfix"></div>
						</form>

					</section>
					<!-- Contact Form / End -->

			</section>
		</div>
		<!-- Page Content / End -->

	</div>
	<!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/main/permintaan-data.blade.php ENDPATH**/ ?>