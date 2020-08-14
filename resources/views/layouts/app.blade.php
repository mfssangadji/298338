<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<!-- Basic Page Needs 
================================================== -->
<meta charset="utf-8">
<title>BMKG - @yield('title')</title>

<!-- Mobile Specific Metas
================================================== -->

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/colors/navy.css') }}" id="colors">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Java Script
================================================== -->
<script src="{{ asset('jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.flexslider.js') }}"></script>
<script src="{{ asset('scripts/jquery.selectnav.js') }}"></script>
<script src="{{ asset('scripts/jquery.twitter.js') }}"></script>
<script src="{{ asset('scripts/jquery.modernizr.js') }}"></script>
<script src="{{ asset('scripts/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('scripts/jquery.contact.js') }}"></script>
<script src="{{ asset('scripts/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.jcarousel.js') }}"></script>
<script src="{{ asset('scripts/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.transit-modified.js') }}"></script>
<script src="{{ asset('scripts/layerslider.transitions.js') }}"></script>
<script src="{{ asset('scripts/layerslider.kreaturamedia.jquery.js') }}"></script>
<script src="{{ asset('scripts/greensock.js') }}"></script>
<script src="{{ asset('scripts/jquery.shop.js') }}"></script>
<script src="{{ asset('scripts/custom.js') }}"></script>
</head>
<body style="background-color: #f5f5f5 !important">
<div id="wrapper">
<!-- Header
================================================== -->
<div id="top-line"></div>
<!-- 960 Container -->
<div class="container">

	<!-- Header -->
	<header id="header">

		<!-- Logo -->
		<div class="ten columns">
			<div id="logo">
				<h1><a href="#"><img src="{{asset('logo.png')}}" /></a></h1>
				<div id="tagline"><strong>STASIUN METEOROLOGI KELAS I BAABULLAH TERNATE</strong> <br>
					<small>Cepat, Tepat, Akurat, Luas, dan Mudah Dipahami</small></div>
				<div class="clearfix"></div>
			</div>
		</div>

		<!-- Social / Contact -->
		<div class="six columns">

			<!-- Social Icons -->
			<ul class="social-icons">
				<li class="twitter"><a href="#">Twitter</a></li>
				<li class="facebook"><a href="#">Facebook</a></li>
				<li class="dribbble"><a href="#">Dribbble</a></li>
				<li class="linkedin"><a href="#">LinkedIn</a></li>
				<li class="rss"><a href="#">RSS</a></li>
			</ul>

			<div class="clearfix"></div>

			<!-- Contact Details -->
			<div class="contact-details">Contact: 0921 3127902</div>

			<div class="clearfix"></div>

			<!-- Search -->
			<nav class="top-search">
				<form action="404-page.html" method="get">
					<button class="search-btn"></button>
					<input class="search-field" type="text" onblur="if(this.value=='')this.value='Search';" onfocus="if(this.value=='Search')this.value='';" value="Search" />
				</form>
			</nav>

		</div>
	</header>
	<!-- Header / End -->

	<div class="clearfix"></div>

</div>
<!-- 960 Container / End -->


<!-- Navigation
================================================== -->
<nav id="navigation" class="style-1">

<div class="left-corner"></div>
<div class="right-corner"></div>

<ul class="menu" id="responsive">

	<li><a href="{{route('welcome')}}" id="current"><i class="halflings white home"></i> Home</a></li>

	<li><a href="#"><i class="halflings white list"></i> Meteo</a>
		<!-- Mega Menu / Start -->
		<ul class="cols3">
			<li class="col3">
				<h4>Informasi Cuaca dan Prakiraan</h4>
			</li>
			<li class="col1">
				<h5>Public</h5>
				<ol>
					<li><a href="{{route('citra-satelit')}}">Citra Satelit</a></li>
					<li><a href="{{route('citra-radar')}}">Citra Radar Ternate</a></li>
					<li><a href="#">Prakiraan Cuaca</a></li>
					<li><a href="{{route('cuaca-ekstrim')}}">Peringatan Dini</a></li>
				</ol>
			</li>
			<li class="col1">
				<h5>Penerbangan</h5>
				<ol>
					<li><a href="{{route('cuaca-aktual-bandara')}}">Cuaca Aktual Bandara</a></li>
					<li><a href="{{url('prakiraan-cuaca-bandara')}}" style="width: 300px;">Prakiraan Cuaca Bandara</a></li>
					<li><a href="http://aviation.bmkg.go.id/web/sigmet.php" target="_blank">Sigmet</a></li>
					<li><a href="{{route('var')}}">Var</a></li>
					<li><a href="right-sidebar.html">Flight Document</a></li>
					<li><a href="{{route('sigwx')}}">Sigwx</a></li>
					<li><a href="http://www.bom.gov.au/aviation/charts/wind-temperature/" target="_blank">Wind Temp</a></li>
					<li><a href="{{route('aerodrome')}}" style="width: 300px;">Aerodrome & Wind Shear Warning</a></li>
				</ol>
			</li>
			<li class="col1">
				<h5>Maritim</h5>
				<ol>
					<li><a href="{{route('ppcwp')}}">Prakiraan Cuaca</a></li>
					<li class="longli"><a href="{{route('ppcp')}}">Prakiraan Cuaca Pelabuhan</a></li>
					<li class="longli"><a href="{{route('ptinggi-gelombang')}}">Prakiraan Tinggi Gelombang</a></li>
					<li><a href="{{route('ppdgt')}}">Peringatan Dini</a></li>
				</ol>
			</li>
		</ul>
		<!-- Mega Menu / End -->
	</li>

	<li><a href="#"><i class="halflings white tags"></i> Pelayanan Data</a>
		<!-- Second Level / Start -->
		<ul>
			<li><a href="{{route('ppermintaan-data')}}">Form Permintaan Data</a></li>
			<li><a href="{{route('pcatalog-data')}}">Katalog Data</a></li>
			<li><a href="http://dataonline.bmkg.go.id/home" target="_blank">Pusat Data Online</a></li>
		</ul>
		<!-- Second Level / End -->
	</li>

	<li><a href="#"><i class="halflings white pushpin"></i> Publikasi</a>
		<!-- Second Level / Start -->
		<ul>
			<li><a href="{{route('pbuletin')}}">Buletin</a></li>
			<li><a href="{{route('pinfografis')}}">Infografis</a></li>
			<li><a href="{{route('pflyer')}}">Flyer</a></li>
			<li><a href="{{route('particle')}}">Artikel</a></li>
		</ul>
		<!-- Second Level / End -->
	</li>
	
	<li><a href="#"><i class="halflings white certificate"></i> Klimatologi</a>
		<!-- Second Level / Start -->
		<ul>
			<li class="longli"><a href="{{route('ppahb')}}">Prakiraan & Analisis Hujan Bulanan</a></li>
			<li class="longli"><a href="{{route('ppm')}}">Prakiraan Musim</a></li>
			<li class="longli"><a href="{{route('pihth')}}">Informasi Hari Tanpa Hujan</a></li>
			<li class="longli"><a href="{{route('pipt')}}">Indeks Presipitasi Terstandarisasi</a></li>
			<li class="longli"><a href="{{route('pkalei')}}">Kaleidoskop Iklim</a></li>
		</ul>
		<!-- Second Level / End -->
	</li>

	<li><a href="{{url('gallery')}}"><i class="halflings white picture"></i> Gallery Kegiatan</a></li>
</ul>
</nav>
<div class="clearfix"></div>


<!-- Content
================================================== -->
<div id="content">

	@yield('content')

</div>
<!-- Content / End -->

</div>
<!-- Wrapper / End -->


<!-- Footer
================================================== -->

<!-- Footer / Start -->
<footer id="footer">
	<!-- 960 Container -->
	<div class="container">

		<!-- About -->
		<div class="four columns">
			
			<p>Badan Meteorologi, Klimatologi dan Geofisika Stasiun Meteorologi Kelas I Sultan Babullah Ternate</p>

		</div>

		<!-- Contact Details -->
		<div class="four columns">
			<h4>Contact Details</h4>
			<ul class="contact-details-alt">
				<li><i class="halflings white map-marker"></i> <p><strong>Address:</strong> Jln. Bandara Ternate</p></li>
				<li><i class="halflings white user"></i> <p><strong>Phone:</strong> 0921 3127902 <br> 0921 3110430</p></li>
				<li><i class="halflings white envelope"></i> <p><strong>Email:</strong> <a href="#">babullah@bmkg.go.id</a> <br> <a href="#">stamet-ternate@gmail.com</a></p></li>
			</ul>
		</div>

		<!-- Photo Stream -->
		<div class="four columns">
			<h4>Photo Stream</h4>
			<div class="flickr-widget">
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=6&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=72179079@N00"></script>
				<div class="clearfix"></div>
			</div>
		</div>
		
		<!-- Twitter -->
		<div class="four columns">
			<h4>Twitter</h4>
			<ul id="twitter"></ul>
				<script type="text/javascript">
					jQuery(document).ready(function($){
					$.getJSON('twitter.php?url='+encodeURIComponent('statuses/user_timeline.json?screen_name=Vasterad&count=1'), function(tweets){
						$("#twitter").html(tz_format_twitter(tweets));
					}); });
				</script>
			<div class="clearfix"></div>
		</div>

	</div>
	<!-- 960 Container / End -->

</footer>
<!-- Footer / End -->


<!-- Footer Bottom / Start  -->
<footer id="footer-bottom">

	<!-- 960 Container -->
	<div class="container">

		<!-- Copyrights -->
		<div class="eight columns">
			<div class="copyright">
				© Copyright <?php echo date("Y"); ?> <a href="#">BMKG Ternate</a>. All Rights Reserved.
			</div>
		</div>

		<!-- Menu -->
		<div class="eight columns">
			<nav id="sub-menu">
				<ul>
					<li><a href="#">FAQ's</a></li>
					<li><a href="#">Sitemap</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</nav>
		</div>

	</div>
	<!-- 960 Container / End -->
</footer>
<!-- Footer Bottom / End -->
</body>
</html>