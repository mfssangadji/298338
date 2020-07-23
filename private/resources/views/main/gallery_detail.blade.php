@extends('layouts.app')
@section('title', 'Citra Satelit')
@section('content')
	<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>{{$album->name}}</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="{{url('/')}}">Home</a></li>
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
			@foreach($album->gallery as $g)
				<!-- 1/4 Column -->
				<div class="four columns isotope-item photography architecture technology">
					<a href="{{url('gallery/'.$album->id.'/image/'.$g->id)}}" class="portfolio-item isotope">
						<figure>
							<img src="/images/{{$g->file}}" style="height: 150px !important; width: 100%; object-fit: cover;" alt=""/>
							<figcaption class="item-description">
								<h5>{{strip_tags(substr($g->description, 0, 20))}}..</h5>
							</figcaption>
						</figure>
					</a>
				</div>
			@endforeach
		</div>
		<!-- Portfolio Content / End -->

	</div>
	<!-- 960 Container / End -->
@endsection