<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>Cpanel - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/css/css.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/toast/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global.css') }}">
    <script src="{{ asset('lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('lte/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('lte/dist/js/demo.js') }}"></script>
    <script src="{{ asset('lte/dist/js/sweetalert/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('jquery.media.js') }}"></script>
    <script src="../js/modernizr.js?v=1.4.16-1"></script>
    
    <link rel="stylesheet" href="{{ asset('lte/dist/js/sweetalert/sweetalert2.min.css') }}">
  </head>
  <body class="hold-transition skin-blue layout-boxed sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        @include('298338.parts.header')
      </header>
      <aside class="main-sidebar">
        @include('298338.parts.sidebar')
      </aside>
      <div class="content-wrapper">
          <section class="content">
              @yield('content')
          </section>
      </div>
      <footer class="main-footer">
        @include('298338.parts.footer')
      </footer>
      <div class="control-sidebar-bg"></div>
    </div>
  </body>
  <script src="{{ asset('lte/plugins/toast/toastr.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('global.js') }}"></script>
  @yield('scripts')
</html>