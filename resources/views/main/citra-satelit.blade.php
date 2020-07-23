@extends('layouts.app')
@section('title', 'Citra Satelit')
@section('content')
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Citra Satelit</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('welcome')}}">Home</a></li>
					<li>Meteo</li>
					<li>Citra Satelit</li>
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
					<a href="http://202.90.198.22/IMAGE/ANIMASI/H08_EH_Malut_m18.gif" rel="fancybox" title="First Light on the Lake"><img src="http://202.90.198.22/IMAGE/ANIMASI/H08_EH_Malut_m18.gif" alt="" /></a>
				</figure>
			</article>

			<!-- About Author -->
			<section class="about-author">
				<img src="images/about.jpg" alt="" />
				<div class="about-description">
					<h4>Title</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</section>

			<!-- Divider -->
			<div class="line"></div>
		</div>
		<!-- Page Content / End -->

		<!-- Sidebar -->
		<div class="four floated sidebar right">
			@include('parts.right-sidebar')
		</div>
	</div>
	<!-- 960 Container / End -->
@endsection