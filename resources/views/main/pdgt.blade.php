@extends('layouts.app')
@section('title', 'Gelombang Tinggi')
@section('content')
	<!-- 960 Container -->
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Gelombang Tinggi</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('welcome')}}">Home</a></li>
					<li>Meteo</li>
					<li>Gelombang Tinggi</li>
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
		<section class="comments-sec">
			<ol class="commentlist">
				<?php $i=1; ?>
				@foreach($pdgt as $pdgt)
					@if($i==1)
						<li>
							<div class="comment">
								<div class="avatar">
									<img src="{{asset('images/attent.png')}}" style="width: 61px;" alt="" />
								</div>
								<div class="comment-des">
									<div class="comment-by"><strong>{{$pdgt->created_at->format("d F Y")}} ({{$pdgt->created_at->format("h:i A")}})</strong>
										<span class="reply">
											<a href="#">Share</a>
										</span>
									</div>
									<p>{{$pdgt->content}}</p>
								</div>
							</div>
						</li>
						<?php $i++; ?>
					@else
						<?php
							$arr[] = array(
								'content' => $pdgt->content,
								'created_at' => $pdgt->created_at,
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