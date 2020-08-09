@extends('layouts.app')
@section('title', 'Aerodrom Wind Shear Warning')
@section('content')
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Aerodrom Wind Shear Warning</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('welcome')}}">Home</a></li>
					<li>Meteo</li>
					<li>Aerodrom Wind Shear Warning</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- 960 Container / End -->

	<!-- 960 Container -->
	<div class="container floated">

		<!-- Page Content -->
		<div class="eleven floated">

			<!-- Comments -->
		<section class="comments-sec" style="width: 100% !important">
			<ol class="commentlist" >
				<?php $i=1; ?>
				@foreach($aerodrome as $aerodrome)
					@if($i==1)
						<li>
							<div class="comment" >
								<div class="avatar">
									<img src="{{asset('images/attent.png')}}" style="width: 61px;" alt="" />
								</div>
								<div class="comment-des">
									<div class="comment-by"><strong>{{$aerodrome->created_at->format("d F Y")}} ({{$aerodrome->created_at->format("h:i A")}})</strong>
										<span class="reply">
											<a href="#">Share</a>
										</span>
									</div>
									<p>{{$aerodrome->content}}</p>
								</div>
							</div>
						</li>
						<?php $i++; ?>
					@else
						<?php
							$arr[] = array(
								'content' => $aerodrome->content,
								'created_at' => $aerodrome->created_at,
							);
						?>
					@endif
				@endforeach
			 </ol>
		</section>
		<div class="clearfix"></div>
		<!-- Divider -->
		<div class="eight columns" style="width: 100% !important; text-align: justify;">
			<h3 class="margin">Peringatan <span>Sebelumnya</span></h3>
			@foreach($arr as $arr)
				<div class="four" style="margin-bottom: 2px;">
					<article class="recent-blog" style="margin-bottom: 50px;">
						<section class="date">
							<span class="day">{{$arr['created_at']->format('d')}}</span>
							<span class="month">{{$arr['created_at']->format('M')}}</span>
						</section>
						<p>{{$arr['content']}}</p>
					</article>
				</div>
			@endforeach
		</div>

		<!-- Sidebar -->
		<div class="four floated sidebar right">
			@include('parts.right-sidebar')
		</div>
	</div>
	<!-- 960 Container / End -->
@endsection