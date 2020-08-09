@extends('layouts.app')
@section('title', 'Flyer')
@section('content')
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Flyer</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('welcome')}}">Home</a></li>
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
			@foreach($var as $var)
				<div class="eight columns isotope-item photography architecture technology">
					<a href="{{'docs/'.$var->file}}" class="portfolio-item isotope">
						<figure>
							<img src="{{'docs/'.$var->file}}" style="width: 500px; height: 330px;" alt=""/>
							<!-- <figcaption class="item-description">
								<h5>Time Is Running Out</h5>
								<span>Photography</span>
							</figcaption> -->
						</figure>
					</a>	
				</div>
			@endforeach

		</div>
		<!-- Portfolio Content / End -->
	</div>
	<!-- 960 Container / End -->
@endsection