@extends('layouts.app')
@section('title', 'Kaleidoskop Iklim')
@section('content')
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Kaleidoskop Iklim</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('welcome')}}">Home</a></li>
					<li>Meteo</li>
					<li>Var</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- 960 Container / End -->

	<!-- 960 Container -->
	<div class="container">

		<div class="sixteen columns" style="overflow: scroll;">
			<!-- Headline -->
			<div style="padding-bottom: 10px;"></div>
			<table class="standard-table">
				<tr>
					<th>No</th>
					<th>Jam</th>
					<th>Tanggal</th>
					<th>Documents</th>
				</tr>
				@foreach($var as $var) 
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$var->created_at->format('h:i A')}}</td>
						<td>{{$var->created_at->format('d F Y')}}</td>
						<td>
							<a href="{{'docs/'.$var->file}}" title="Download" target="_blank">
								<i class="halflings dark search"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</table>

		</div>
	</div>
	<!-- 960 Container / End -->
@endsection