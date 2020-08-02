<section class="sidebar">
  <div class="user-panel">

    <div class="pull-left image">
      <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle">
    </div>

    <div class="pull-left info">
      <p>Administrator</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>

  </div>

  <ul class="sidebar-menu" data-widget="tree">

    <li class="header">NAVIGASI MENU</li>
    @if(auth()->user()->status == 1)
      <li class="treeview {{active('users')}}">
        <a href="#">
          <i class="fa fa-gears text-red"></i> <span>Pengaturan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{active('users')}}">
            <a href="{{ route('users') }}"><i class="fa fa-circle"></i> Pengguna</a>
          </li>
        </ul>
      </li>
      <li class="treeview {{active('pdce')}}">
        <a href="#">
          <i class="fa fa-sun-o"></i>
          <span>Meteo Public</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{active('pdce')}}">
            <a href="{{ route('pdce') }}"><i class="fa fa-circle"></i> Cuaca Ekstrim</a>
          </li>
        </ul>
      </li>

      <li class="treeview {{active('veaer')}} {{active('flightdoc')}} {{active('aerodrom')}}">
        <a href="#">
          <i class="fa fa-plane"></i>
          <span>Meteo Penerbangan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{active('veaer')}}">
            <a href="{{ route('veaer') }}"><i class="fa fa-circle"></i> VAR</a>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle"></i> <i>Fligth Document</i>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('flightdoc-users')}}"><i class="fa fa-users text-blue"></i> Pengguna</a></li>
              <li class="">
                <a href="{{route('flightdoc')}}"><i class="fa fa-circle"></i>
                  Dokumen
                </a>
              </li>
            </ul>
          </li>
          <li class="{{active('aerodrom')}}">
            <a href="{{ route('aerodrom') }}"><i class="fa fa-circle"></i> Aerodrom WSW</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-database"></i>
          <span>Pelayanan Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ route('permintaan-data') }}"><i class="fa fa-circle"></i> Permintaan Data</a>
          </li>
          <li>
            <a href="{{ route('catalog-data') }}"><i class="fa fa-circle"></i> Katalog Data</a>
          </li>
        </ul>
      </li>

      <li class="treeview {{active('pcwp')}} {{active('pcp')}} {{active('pdgt')}}">
        <a href="#">
          <i class="fa fa-anchor"></i>
          <span>Meteo Maritim</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{active('pcwp')}}">
            <a href="{{ route('pcwp') }}">
              <i class="fa fa-circle"></i> Cuaca Wilayah Pelayaran
            </a>
          </li>
          <li class="{{active('pcp')}}">
            <a href="{{ route('pcp') }}">
              <i class="fa fa-circle"></i> Cuaca Pelabuhan</a>
            </li>
          <li class="{{active('pdgt')}}">
            <a href="{{ route('pdgt') }}">
              <i class="fa fa-circle"></i> Gelombang Tinggi</a>
            </li>
        </ul>
      </li>

      <li class="treeview {{active('buletin')}} {{active('infografis')}} {{active('flyer')}} {{active('articles')}}">
        <a href="#">
          <i class="fa fa-tags"></i>
          <span>Publikasi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{active('buletin')}}">
            <a href="{{ route('buletin') }}">
              <i class="fa fa-circle"></i> Buletin
            </a>
          </li>
          <li class="{{active('infografis')}}">
            <a href="{{ route('infografis') }}">
              <i class="fa fa-circle"></i> Infografis
            </a>
          </li>
          
          <li><a href="{{ route('flyer') }}"><i class="fa fa-circle"></i> Flyer</a></li>
          <li><a href="{{ route('articles') }}"><i class="fa fa-circle"></i> Artikel</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-cloud"></i>
          <span>Klimatologi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('pahb') }}"><i class="fa fa-circle"></i> Analisis Hujan Bulanan</a></li>
          <li><a href="{{ route('pm') }}"><i class="fa fa-circle"></i> Prakiraan Musim</a></li>
          <li><a href="{{ route('ihth') }}"><i class="fa fa-circle"></i> Hari Tanpa Hujan</a></li>
          <li><a href="{{ route('ipt') }}"><i class="fa fa-circle"></i> Presipitasi Terstandarisasi</a></li>
          <li><a href="{{ route('kalei') }}"><i class="fa fa-circle"></i> Keleidoskop Iklim</a></li>
        </ul>
      </li>

      <li>
        <a href="{{ url(config('app.root').'/album') }}">
          <i class="fa fa-camera"></i>
          <span>Gallery Kegiatan</span>
        </a>
      </li>
    @elseif(auth()->user()->status == 2)
      <li class="treeview {{active('pdce')}}">
        <a href="#">
          <i class="fa fa-sun-o"></i>
          <span>Meteo Public</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{active('pdce')}}">
            <a href="{{ route('pdce') }}"><i class="fa fa-circle"></i> Cuaca Ekstrim</a>
          </li>
        </ul>
      </li>

      <li class="treeview {{active('veaer')}} {{active('flightdoc')}} {{active('aerodrom')}}">
        <a href="#">
          <i class="fa fa-plane"></i>
          <span>Meteo Penerbangan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{active('veaer')}}">
            <a href="{{ route('veaer') }}"><i class="fa fa-circle"></i> VAR</a>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle"></i> <i>Fligth Document</i>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('flightdoc-users')}}"><i class="fa fa-users text-blue"></i> Pengguna</a></li>
              <li class="">
                <a href="{{route('flightdoc')}}"><i class="fa fa-circle"></i>
                  Dokumen
                </a>
              </li>
            </ul>
          </li>
          <li class="{{active('aerodrom')}}">
            <a href="{{ route('aerodrom') }}"><i class="fa fa-circle"></i> Aerodrom WSW</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-database"></i>
          <span>Pelayanan Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ route('permintaan-data') }}"><i class="fa fa-circle"></i> Permintaan Data</a>
          </li>
          <li>
            <a href="{{ route('catalog-data') }}"><i class="fa fa-circle"></i> Katalog Data</a>
          </li>
        </ul>
      </li>

      <li class="treeview {{active('pcwp')}} {{active('pcp')}} {{active('pdgt')}}">
        <a href="#">
          <i class="fa fa-anchor"></i>
          <span>Meteo Maritim</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{active('pcwp')}}">
            <a href="{{ route('pcwp') }}">
              <i class="fa fa-circle"></i> Cuaca Wilayah Pelayaran
            </a>
          </li>
          <li class="{{active('pcp')}}">
            <a href="{{ route('pcp') }}">
              <i class="fa fa-circle"></i> Cuaca Pelabuhan</a>
            </li>
          <li class="{{active('pdgt')}}">
            <a href="{{ route('pdgt') }}">
              <i class="fa fa-circle"></i> Gelombang Tinggi</a>
            </li>
        </ul>
      </li>

      <li class="treeview {{active('buletin')}} {{active('infografis')}} {{active('flyer')}} {{active('articles')}}">
        <a href="#">
          <i class="fa fa-tags"></i>
          <span>Publikasi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{active('buletin')}}">
            <a href="{{ route('buletin') }}">
              <i class="fa fa-circle"></i> Buletin
            </a>
          </li>
          <li class="{{active('infografis')}}">
            <a href="{{ route('infografis') }}">
              <i class="fa fa-circle"></i> Infografis
            </a>
          </li>
          
          <li><a href="{{ route('flyer') }}"><i class="fa fa-circle"></i> Flyer</a></li>
          <li><a href="{{ route('articles') }}"><i class="fa fa-circle"></i> Artikel</a></li>
        </ul>
      </li>

      <li>
        <a href="{{ url(config('app.root').'/album') }}">
          <i class="fa fa-camera"></i>
          <span>Gallery Kegiatan</span>
        </a>
      </li>
    @elseif(auth()->user()->status == 3)
      <li class="treeview">
        <a href="#">
          <i class="fa fa-database"></i>
          <span>Pelayanan Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ route('permintaan-data') }}"><i class="fa fa-circle"></i> Permintaan Data</a>
          </li>
          <li>
            <a href="{{ route('catalog-data') }}"><i class="fa fa-circle"></i> Katalog Data</a>
          </li>
        </ul>
      </li>

      <li class="treeview {{active('buletin')}} {{active('infografis')}} {{active('flyer')}} {{active('articles')}}">
        <a href="#">
          <i class="fa fa-tags"></i>
          <span>Publikasi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{active('buletin')}}">
            <a href="{{ route('buletin') }}">
              <i class="fa fa-circle"></i> Buletin
            </a>
          </li>
          <li class="{{active('infografis')}}">
            <a href="{{ route('infografis') }}">
              <i class="fa fa-circle"></i> Infografis
            </a>
          </li>
          
          <li><a href="{{ route('flyer') }}"><i class="fa fa-circle"></i> Flyer</a></li>
          <li><a href="{{ route('articles') }}"><i class="fa fa-circle"></i> Artikel</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-cloud"></i>
          <span>Klimatologi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('pahb') }}"><i class="fa fa-circle"></i> Analisis Hujan Bulanan</a></li>
          <li><a href="{{ route('pm') }}"><i class="fa fa-circle"></i> Prakiraan Musim</a></li>
          <li><a href="{{ route('ihth') }}"><i class="fa fa-circle"></i> Hari Tanpa Hujan</a></li>
          <li><a href="{{ route('ipt') }}"><i class="fa fa-circle"></i> Presipitasi Terstandarisasi</a></li>
          <li><a href="{{ route('kalei') }}"><i class="fa fa-circle"></i> Keleidoskop Iklim</a></li>
        </ul>
      </li>

      <li>
        <a href="{{ url(config('app.root').'/album') }}">
          <i class="fa fa-camera"></i>
          <span>Gallery Kegiatan</span>
        </a>
      </li>
    @endif
    <li class="header">LAINNYA</li>
    <li><a href="{{ route('welcome') }}" target="_blank"><i class="fa fa-circle-o text-info"></i> <span>Kunjungi Situs</span></a></li>
    <li><a href="{{ route('logout') }}" onclick="return confirm('Are you sure?')"><i class="fa fa-sign-out text-danger"></i> <span>Logout</span></a></li>
  </ul>
</section>