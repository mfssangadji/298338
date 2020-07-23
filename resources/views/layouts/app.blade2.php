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
					<li><a href="about-us.html">Prakiraan Cuaca</a></li>
					<li><a href="flexslider.html">Peringatan Dini</a></li>
				</ol>
			</li>
			<li class="col1">
				<h5>Penerbangan</h5>
				<ol>
					<li><a href="{{route('cuaca-aktual-bandara')}}">Cuaca Aktual Bandara</a></li>
					<li><a href="{{url('prakiraan-cuaca-bandara')}}" style="width: 300px;">Prakiraan Cuaca Bandara</a></li>
					<li><a href="http://aviation.bmkg.go.id/web/sigmet.php" target="_blank">Sigmet</a></li>
					<li><a href="right-sidebar.html">Var</a></li>
					<li><a href="right-sidebar.html">Flight Document</a></li>
					<li><a href="{{route('sigwx')}}">Sigwx</a></li>
					<li><a href="http://www.bom.gov.au/aviation/charts/wind-temperature/" target="_blank">Wind Temp</a></li>
					<li><a href="right-sidebar.html" style="width: 300px;">Aerodrome & Wind Shear Warning</a></li>
				</ol>
			</li>
			<li class="col1">
				<h5>Maritim</h5>
				<ol>
					<li><a href="faq.html">Prakiraan Cuaca</a></li>
					<li class="longli"><a href="{{route('ptinggi-gelombang')}}">Prakiraan Tinggi Gelombang</a></li>
					<li><a href="faq.html">Peringatan Dini</a></li>
				</ol>
			</li>
		</ul>
		<!-- Mega Menu / End -->
	</li>

	<li><a href="#"><i class="halflings white tags"></i> Pelayanan Data</a>
		<!-- Second Level / Start -->
		<ul>
			<li><a href="{{route('permintaan-data')}}">Form Permintaan Data</a></li>
			<li><a href="icons.html">Katalog Data</a></li>
			<li><a href="http://dataonline.bmkg.go.id/home" target="_blank">Pusat Data Online</a></li>
		</ul>
		<!-- Second Level / End -->
	</li>

	<li><a href="#"><i class="halflings white pushpin"></i> Publikasi</a>
		<!-- Second Level / Start -->
		<ul>
			<li><a href="portfolio-2.html">Buletin</a></li>
			<li><a href="single-project.html">Artikel</a></li>
			<li><a href="portfolio-3.html">Infografis</a></li>
			<li><a href="portfolio-4.html">Flyer</a></li>
		</ul>
		<!-- Second Level / End -->
	</li>
	
	<li><a href="#"><i class="halflings white certificate"></i> Klimatologi</a>
		<!-- Second Level / Start -->
		<ul>
			<li class="longli"><a href="shop.html">Prakiraan & Analisis Hujan Bulanan</a></li>
			<li class="longli"><a href="product-page.html">Prakiraan Musim</a></li>
			<li class="longli"><a href="product-page.html">Informasi Hari Tanpa Hujan</a></li>
			<li class="longli"><a href="product-page.html">Indeks Presipitasi Terstandarisasi</a></li>
			<li class="longli"><a href="product-page.html">Kaleidoskop Iklim</a></li>
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


<!-- Style Switcher
================================================== -->

<!-- <section id="style-switcher">
	<h2>Style Switcher <a href="#"></a></h2>
	<div>
	<h3>Predefined Colors</h3>
		<ul class="colors" id="color1">
			<li><a href="#" class="blue" title="Blue"></a></li>
			<li><a href="#" class="green" title="Green"></a></li>
			<li><a href="#" class="orange" title="Orange"></a></li>
			<li><a href="#" class="navy" title="Navy"></a></li>
			<li><a href="#" class="yellow" title="Yellow"></a></li>
			<li><a href="#" class="peach" title="Peach"></a></li>
			<li><a href="#" class="beige" title="Beige"></a></li>
			<li><a href="#" class="purple" title="Purple"></a></li>
			<li><a href="#" class="red" title="Red"></a></li>
			<li><a href="#" class="pink" title="Pink"></a></li>
			<li><a href="#" class="celadon" title="Celadon"></a></li>
			<li><a href="#" class="brown" title="Brown"></a></li>
			<li><a href="#" class="cherry" title="Cherry"></a></li>
			<li><a href="#" class="gray" title="Gray"></a></li>
			<li><a href="#" class="dark" title="Dark"></a></li>
			<li><a href="#" class="cyan" title="Cyan"></a></li>
			<li><a href="#" class="olive" title="Olive"></a></li>
			<li><a href="#" class="dirty-green" title="Dirty Green"></a></li>
		</ul>

	<h3>Menu Style</h3>
	<select id="menu-style">
		<option value="1">Style 1</option>
		<option value="2">Style 2</option>
	</select>

	<h3>Background Image</h3>
		 <ul class="colors bg" id="bg">
			<li><a href="#" class="bg1"></a></li>
			<li><a href="#" class="bg2"></a></li>
			<li><a href="#" class="bg3"></a></li>
			<li><a href="#" class="bg4"></a></li>
			<li><a href="#" class="bg5"></a></li>
			<li><a href="#" class="bg6"></a></li>
			<li><a href="#" class="bg7"></a></li>
			<li><a href="#" class="bg8"></a></li>
			<li><a href="#" class="bg9"></a></li>
			<li><a href="#" class="bg10"></a></li>
			<li><a href="#" class="bg11"></a></li>
			<li><a href="#" class="bg12"></a></li>
			<li><a href="#" class="bg13"></a></li>
			<li><a href="#" class="bg14"></a></li>
			<li><a href="#" class="bg15"></a></li>
			<li><a href="#" class="bg16"></a></li>
			<li><a href="#" class="bg17"></a></li>
			<li><a href="#" class="bg18"></a></li>
		</ul>
	</div>

	<div id="reset"><a href="#" class="button color blue">Reset</a></div>

</section> -->
<!-- Style Switcher / End -->


</body>
</html>