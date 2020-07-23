@extends('layouts.app')
@section('title', 'Citra Satelit')
@section('content')
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Form Permintaan Data</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('welcome')}}">Home</a></li>
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
			@include('parts.left-sidebar')
		</div>
		<!-- Sidebar / End -->

		<!-- Page Content -->
		<div class="eleven floated right">
			<section class="page-content">
				<h3 class="margin-reset">Our Location</h3>
				<br />
				<!-- Google Maps -->
				<section class="google-map-container">
				    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.399175039276!2d127.3768723815885!3d0.8305144146166081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x329cb21ceec63dd1%3A0xa9ab47aa4924dba3!2sBandara%20Sultan%20Babullah%20Ternate!5e0!3m2!1sid!2sid!4v1576206825593!5m2!1sid!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</section>
				<!-- Google Maps / End -->


				<h3 class="margin">Form Permintaan Data</h3>
				<p class="margin">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

					<!-- Contact Form -->
					<section id="contact">

						<!-- Success Message -->
						<mark id="message"></mark>

						<!-- Form -->
						<form method="post" action="contact.php" name="contactform" id="contactform">
							<fieldset>
								<div>
									<label for="name" accesskey="U">Name:</label>
									<input name="name" type="text" id="name" />
								</div>

								<div>
									<label for="email" accesskey="E">Email: <span>*</span></label>
									<input name="email" type="email" id="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" />
								</div>

								<div>
									<label for="comments" accesskey="C">Message: <span>*</span></label>
									<textarea name="comments" cols="40" rows="3" id="comments" spellcheck="true"></textarea>
								</div>

							</fieldset>
							<input type="submit" class="submit" id="submit" value="Send Message" />
							<div class="clearfix"></div>
						</form>

					</section>
					<!-- Contact Form / End -->

			</section>
		</div>
		<!-- Page Content / End -->

	</div>
	<!-- 960 Container / End -->
@endsection