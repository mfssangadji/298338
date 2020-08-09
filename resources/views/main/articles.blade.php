@extends('layouts.app')
@section('title', 'Artikel')
@section('content')
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Artikel</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('welcome')}}">Home</a></li>
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

		@foreach($art as $art)
			<!-- Post -->
			<article class="post medium">

			<div class="medium-image">
				<figure class="post-img picture">
					<a href="blog-post.html"><img src="images/blog-01-medium.jpg" alt="" /></a>
				</figure>
			</div>

			<section class="date">
				<span class="day">{{$art->created_at->format('d')}}</span>
				<span class="month">{{$art->created_at->format('M')}}</span>
			</section>

			<div class="medium-content">

				<header class="meta">
					<h2><a href="blog-post.html">{{$art->title}}</a></h2>
					<span><i class="halflings user"></i>By <a href="#">admin</a></span>
					<span><i class="halflings comments"></i>With <a href="#">12 Comments</a></span>
				</header>

				<p>{{strip_tags(substr($art->description, 0, 150))}}..</p>

				<a href="{{url('article/'.$art->id)}}" class="button color">Read More</a>

			</div>

			</article>
		@endforeach

		<!-- Divider -->
		<div class="line"></div>

		<!-- Pagination -->
		<nav class="pagination">
			<ul>
				<li><a href="#" class="current">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">Next</a></li>
			</ul>
			<div class="clearfix"></div>
		</nav>

	</div>
	<!-- Content / End -->
	<!-- Sidebar -->
		<div class="four floated sidebar right">
			@include('parts.right-sidebar')
		</div>
	</div>
	<!-- 960 Container / End -->
@endsection