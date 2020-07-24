<section class="sidebar">
  <div class="user-panel">

    <div class="pull-left image">
      <img src="<?php echo e(asset('lte/dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
    </div>

    <div class="pull-left info">
      <p>Administrator</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>

  </div>

  <ul class="sidebar-menu" data-widget="tree">

    <li class="header">NAVIGASI MENU</li>
    <li class="treeview <?php echo e(active('users')); ?>">
      <a href="#">
        <i class="fa fa-gears"></i> <span>Pengaturan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo e(active('users')); ?>">
          <a href="<?php echo e(route('users')); ?>"><i class="fa fa-circle"></i> Pengguna</a>
        </li>
      </ul>
    </li>
    <li class="treeview <?php echo e(active('pdce')); ?>">
      <a href="#">
        <i class="fa fa-sun-o"></i>
        <span>Meteo Public</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo e(active('pdce')); ?>">
          <a href="<?php echo e(route('pdce')); ?>"><i class="fa fa-circle"></i> Cuaca Ekstrim</a>
        </li>
      </ul>
    </li>

    <li class="treeview <?php echo e(active('veaer')); ?> <?php echo e(active('flightdoc')); ?> <?php echo e(active('aerodrom')); ?>">
      <a href="#">
        <i class="fa fa-plane"></i>
        <span>Meteo Penerbangan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo e(active('veaer')); ?>">
          <a href="<?php echo e(route('veaer')); ?>"><i class="fa fa-circle"></i> VAR</a>
        </li>
        <li class="<?php echo e(active('flightdoc')); ?>">
          <a href="<?php echo e(route('flightdoc')); ?>"><i class="fa fa-circle"></i> Flight Document</a>
        </li>
        <li class="<?php echo e(active('aerodrom')); ?>">
          <a href="<?php echo e(route('aerodrom')); ?>"><i class="fa fa-circle"></i> Aerodrom WSW</a>
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
          <a href="<?php echo e(url('catalog-data')); ?>"><i class="fa fa-circle"></i> Permintaan Data</a>
        </li>
        <li>
          <a href="<?php echo e(url('catalog-data')); ?>"><i class="fa fa-circle"></i> Katalog Data</a>
        </li>
      </ul>
    </li>

    <li class="treeview <?php echo e(active('pcwp')); ?> <?php echo e(active('pcp')); ?> <?php echo e(active('pdgt')); ?>">
      <a href="#">
        <i class="fa fa-anchor"></i>
        <span>Meteo Maritim</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo e(active('pcwp')); ?>">
          <a href="<?php echo e(route('pcwp')); ?>">
            <i class="fa fa-circle"></i> Cuaca Wilayah Pelayaran
          </a>
        </li>
        <li class="<?php echo e(active('pcp')); ?>">
          <a href="<?php echo e(route('pcp')); ?>">
            <i class="fa fa-circle"></i> Cuaca Pelabuhan</a>
          </li>
        <li class="<?php echo e(active('pdgt')); ?>">
          <a href="<?php echo e(route('pdgt')); ?>">
            <i class="fa fa-circle"></i> Gelombang Tinggi</a>
          </li>
      </ul>
    </li>

    <li class="treeview <?php echo e(active('buletin')); ?> <?php echo e(active('infografis')); ?> <?php echo e(active('flyer')); ?> <?php echo e(active('articles')); ?>">
      <a href="#">
        <i class="fa fa-tags"></i>
        <span>Publikasi</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo e(active('buletin')); ?>">
          <a href="<?php echo e(route('buletin')); ?>">
            <i class="fa fa-circle"></i> Buletin
          </a>
        </li>
        <li class="<?php echo e(active('infografis')); ?>">
          <a href="<?php echo e(route('infografis')); ?>">
            <i class="fa fa-circle"></i> Infografis
          </a>
        </li>
        
        <li><a href="<?php echo e(route('flyer')); ?>"><i class="fa fa-circle"></i> Flyer</a></li>
        <li><a href="<?php echo e(route('articles')); ?>"><i class="fa fa-circle"></i> Artikel</a></li>
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
        <li><a href="<?php echo e(route('pahb')); ?>"><i class="fa fa-circle"></i> Analisis Hujan Bulanan</a></li>
        <li><a href="<?php echo e(route('pm')); ?>"><i class="fa fa-circle"></i> Prakiraan Musim</a></li>
        <li><a href="<?php echo e(route('ihth')); ?>"><i class="fa fa-circle"></i> Hari Tanpa Hujan</a></li>
        <li><a href="<?php echo e(route('ipt')); ?>"><i class="fa fa-circle"></i> Presipitasi Terstandarisasi</a></li>
        <li><a href="<?php echo e(route('kalei')); ?>"><i class="fa fa-circle"></i> Keleidoskop Iklim</a></li>
      </ul>
    </li>
    <li>
      <a href="<?php echo e(url(config('app.root').'/album')); ?>">
        <i class="fa fa-camera"></i>
        <span>Gallery Kegiatan</span>
      </a>
    </li>
    <li class="header">LAINNYA</li>
    <li><a href="<?php echo e(route('welcome')); ?>" target="_blank"><i class="fa fa-circle-o text-info"></i> <span>Kunjungi Situs</span></a></li>
    <li><a href="<?php echo e(url('logout')); ?>"><i class="fa fa-sign-out text-danger"></i> <span>Logout</span></a></li>
  </ul>
</section><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/298338/parts/sidebar.blade.php ENDPATH**/ ?>