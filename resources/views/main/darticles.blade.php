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

		<!-- Post -->
		<article class="post">

			<figure class="post-img picture">
				<a href="images/blog-01-large.jpg" rel="fancybox" title="First Light on the Lake"><img src="images/blog-01.jpg" alt="" /></a>
			</figure>

			<section class="date">
				<span class="day">{{$art->last()->created_at->format('d')}}</span>
				<span class="month">{{$art->last()->created_at->format('M')}}</span>
			</section>

			<section class="post-content">

				<header class="meta">
					<h2><a href="#">{{$art->last()->title}}</a></h2>
					<span><i class="halflings user"></i>By <a href="#">admin</a></span>
					<span><i class="halflings tag"></i><a href="#">Boating</a>, <a href="#">Recreation</a></span>
				</header>

				<p>{{$art->last()->description}}</p>

			</section>

		</article>
		<!-- Divider -->
		<div class="clearfix"></div>

	<!-- Content / End -->
	</div>
	<!-- Content / End -->
	<!-- Sidebar -->
		<div class="four floated sidebar right">
			@include('parts.right-sidebar')
		</div>
	</div>
	<!-- 960 Container / End -->
@endsection