@extends('layouts.app')
@section('title', 'Citra Satelit')
@section('content')
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Prakiraan <span>Cuaca Bandara</span></h2>

			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('welcome')}}">Home</a></li>
					<li>Meteo</li>
					<li>Prakiraan Cuaca Bandara</li>
				</ul>
			</nav>

		</div>

	</div>
	<!-- 960 Container / End -->

	<!-- Page Content -->
	<div class="page-content">

		<!-- 960 Container -->
		<div class="container">
			<div class="sixteen columns">
				<!-- Filters -->
				<select id="filters" onChange="window.document.location.href=this.options[this.selectedIndex].value;" style="padding: 10px; background-color: #F2F2F2; width: 200px;">
					<option selected disabled>Forecast</option>
					@for($i=1; $i<=12; $i++)
						@if($i == $get)
							<option value="{{url('prakiraan-cuaca-bandara').'/'.$i}}" selected>{{$i}} jam yang akan datang</option>
						@else
							<option value="{{url('prakiraan-cuaca-bandara').'/'.$i}}">{{$i}} jam yang akan datang</option>
						@endif
					@endfor
				</select>
			</div>
		</div>
		<!-- 960 Container / End -->

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
							<th>Waktu Prakiraan</th>
							<th>Arah (dari)</th>
							<th>Kecepatan (km/jam)</th>
							<th>Jarak Pandang (km)</th>
							<th>Cuaca</th>
							<th>Probabilitas</th>
						</tr>

						@foreach($forecast as $key => $attr)
							<?php
								$time = explode(" ", $attr['time']);
							?>
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$key}}</td>
								<td>{{$time[1]}} {{$attr['time_zone']}}</td>
								<td>{{$attr['wind_direction']}}</td>
								<td>{{$attr['wind_speed']}}</td>
								<td>{{$attr['visibility']}}</td>
								<td>{{$attr['weather']}}</td>
								<td>{{$attr['probability']}}</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- 960 Container / End -->
@endsection