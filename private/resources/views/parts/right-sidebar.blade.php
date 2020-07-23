<aside class="sidebar">
	<!-- Search -->
	<nav class="widget-search">
		<form action="404-page.html" method="get">
			<button class="search-btn-widget"></button>
			<input class="search-field" type="text" onblur="if(this.value=='')this.value='Search';" onfocus="if(this.value=='Search')this.value='';" value="Search" />
		</form>
	</nav>
	<div class="clearfix"></div>
	
	<!-- Tweets-->
	<div class="widget">
		<h4>Twitter</h4>
		<ul id="twitter-blog"></ul>
			<script type="text/javascript">
				jQuery(document).ready(function($){
				$.getJSON('twitter.php?url='+encodeURIComponent('statuses/user_timeline.json?screen_name=Vasterad&count=2'), function(tweets){
					$("#twitter-blog").html(tz_format_twitter(tweets));
				}); });
			</script>
		<div class="clearfix"></div>
	</div>

	<!-- Public -->
	<nav class="widget">
		<h4>Public</h4>
		<ul class="categories">
			<li><a href="{{route('citra-satelit')}}">Citra Satelit</a></li>
			<li><a href="#">Perkiraan Cuaca</a></li>
			<li><a href="#">Peringatan Dini</a></li>
		</ul>
	</nav>

	<!-- Public -->
	<nav class="widget">
		<h4>Penerbangan</h4>
		<ul class="categories">
			<li><a href="#">Var</a></li>
			<li><a href="#">Sigwx</a></li>
			<li><a href="#">Sigmet</a></li>
			<li><a href="#">Cuaca Aktual Bandara</a></li>
			<li><a href="#">Perkiraan Cuaca Bandara</a></li>
			<li><a href="#">Flight Document</a></li>
			<li><a href="#">Wind Temp</a></li>
			<li><a href="#">Aerodrome & WSW</a></li>
		</ul>
	</nav>

	<!-- Public -->
	<nav class="widget">
		<h4>Maritim</h4>
		<ul class="categories">
			<li><a href="#">Perkiraan Cuaca</a></li>
			<li><a href="#">Tinggi Gelombang</a></li>
			<li><a href="#">Peringatan Dini</a></li>
		</ul>
	</nav>


	<!-- Tags -->
	<!-- <div class="widget">
		<h4>Tags</h4>
		<nav class="tags">
			<a href="#">Mountains</a>
			<a href="#">Winter Sports</a>
			<a href="#">Boating</a>
			<a href="#">Recreation</a>
			<a href="#">Skiing</a>
			<a href="#">Tourism</a>
			<a href="#">Nature</a>
			<a href="#">Alps</a>
		</nav>
	</div> -->

	<!-- Archives -->
	<!-- <nav class="widget">
		<h4>Archives</h4>
		<ul class="categories">
			<li><a href="#">October 2012</a></li>
			<li><a href="#">November 2012</a></li>
			<li><a href="#">December 2012</a></li>
		</ul>
	</nav> -->
</aside>