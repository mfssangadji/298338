@extends('layouts.app')
@section('title', 'Citra Satelit')
@section('content')
	<!-- 960 Container -->
	<div class="container floated">

		<div class="sixteen floated page-title">

			<h2>{{$img->album->name}}</h2>

			<!-- Portfolio Navi -->
			<!-- <div id="portfolio-navi">
				<ul>
					<li><a class="prev" href="#"><b>←</b> Previous</a></li>
					<li><a class="next" href="#">Next <b>→</b></a></li>
				</ul>
			</div>
			<div class="clearfix"></div> -->

		</div>

	</div>
	<!-- 960 Container / End -->

	<!-- Page Content -->
	<div class="page-content">

	<div class="container">
		<div class="sixteen columns">

			<!-- Slider  -->
			<section class="flexslider">
				<ul class="slides">
					<li>
						<a href="/images/{{$img->file}}" rel="fancybox-gallery" title="{{$img->description}}">
							<img src="/images/{{$img->file}}" alt="" style="height: 500px !important; width: 100% !important; object-fit: cover" />
						</a>
					</li>
				</ul>
			</section>
			<!-- Slider / End -->

		</div>
	</div>


	<!-- 960 Container -->
	<div class="container" style="margin-top: 30px;">

		<div class="twelve columns">
			<p>{{strip_tags($img->description)}}</p>
		</div>

		<!-- <div class="four columns">
			<div class="project-info-container">
					<ul class="project-info">
					<li><strong>Client:</strong> Google</li>
					<li><strong>Date:</strong> December 2012</li>
					<li><a href="#" class="button color launch"> View Project</a></li>
				</ul>
			</div>
		</div> -->

	</div>
	<!-- End 960 Container -->


	<div class="line" style="margin: 20px 0 37px 0;"></div>

	<!-- Related Works -->
	<div class="related-works">

		<!-- 960 Container -->
		<div class="container" style="margin-bottom: -10px;">

				<div class="sixteen columns">
					<h3 class="margin">Related Works</h3>
				</div>

					<div class="four columns">
						<a href="#" class="portfolio-item isotope">
							<figure>
								<div class="picture"><img src="images/portfolio/portfolio-04.jpg" alt=""/><div class="image-overlay-link"></div></div>
								<figcaption class="item-description">
									<h5>Poppy Flower</h5>
									<span>Identity</span>
								</figcaption>
							</figure>
						</a>
					</div>

					<div class="four columns">
						<a href="#" class="portfolio-item isotope">
							<figure>
								<div class="picture"><img src="images/portfolio/portfolio-05.jpg" alt=""/><div class="image-overlay-link"></div></div>
								<figcaption class="item-description">
									<h5>Death Valley</h5>
									<span>Photography</span>
								</figcaption>
							</figure>
						</a>
					</div>

					<!-- 1/4 Column -->
					<div class="four columns">
						<a href="#" class="portfolio-item isotope">
							<figure>
								<div class="picture"><img src="images/portfolio/portfolio-08.jpg" alt=""/><div class="image-overlay-link"></div></div>
								<figcaption class="item-description">
									<h5>Casual Shoes</h5>
									<span>Identity</span>
								</figcaption>
							</figure>
						</a>
					</div>

					<!-- 1/4 Column -->
					<div class="four columns">
						<a href="#" class="portfolio-item isotope">
							<figure>
								<div class="picture"><img src="images/portfolio/portfolio-12.jpg" alt=""/><div class="image-overlay-link"></div></div>
								<figcaption class="item-description">
									<h5>Mountain Biking</h5>
									<span>Photography</span>
								</figcaption>
							</figure>
						</a>
					</div>
		</div>
		<!-- End 960 Container -->

	</div>
	<!-- Related Works / End -->

	</div>
	<!-- Page Content / End -->
@endsection