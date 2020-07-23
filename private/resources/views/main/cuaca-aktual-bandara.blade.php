@extends('layouts.app')
@section('title', 'Citra Satelit')
@section('content')
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Cuaca <span>Aktual Bandara</span></h2>

			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('welcome')}}">Home</a></li>
					<li>Meteo</li>
					<li>Cuaca Aktual Bandara</li>
				</ul>
			</nav>

		</div>

	</div>
	<!-- 960 Container / End -->

	<!-- Page Content -->
	<div class="page-content">
		<!-- 960 Container -->
		<div class="container">
		<!-- Regular Table
		================================================== -->
			<div class="sixteen columns">
				<!-- Headline -->
				<div class="small-table" style="overflow: scroll; height: 600px">
					<table>
						<tr>
							<th>No</th>
							<th>Bandara/Stasiun</th>
							<th>Waktu Pengamatan</th>
							<th>Arah (dari)</th>
							<th>Kecepatan (km/jam)</th>
							<th>Jarak Pandang (km)</th>
							<th>Cuaca</th>
							<th>Suhu (&deg;C)</th>
							<th>Titik Embun (&deg;C)</th>
							<th>Tekanan Udara (hPa)</th>
						</tr>

						@foreach($forecast as $key => $attr)
							<?php
								$time = explode(" ", $attr['observed_time']);
							?>
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$key}}</td>
								<td>{{$time[1]}} {{$attr['time_zone']}}</td>
								<td>{{$attr['wind_direction']}}</td>
								<td>{{$attr['wind_speed']}}</td>
								<td>{{$attr['visibility']}}</td>
								<td>{{$attr['weather']}}</td>
								<td>{{$attr['temp']}}</td>
								<td>{{$attr['dew_point']}}</td>
								<td>{{$attr['pressure']}}</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- 960 Container / End -->
@endsection