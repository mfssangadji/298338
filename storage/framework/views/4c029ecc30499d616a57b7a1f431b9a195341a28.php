<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <title>Cpanel - <?php echo $__env->yieldContent('title'); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo e(asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lte/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lte/bower_components/Ionicons/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lte/dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lte/dist/css/skins/_all-skins.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lte/css/css.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lte/plugins/toast/toastr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('global.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('lte/plugins/summernote/summernote-bs4.css')); ?>">
    <script src="<?php echo e(asset('lte/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lte/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lte/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lte/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
    <script src="<?php echo e(asset('lte/dist/js/adminlte.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lte/dist/js/demo.js')); ?>"></script>
    <script src="<?php echo e(asset('lte/dist/js/sweetalert/sweetalert2.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('jquery.media.js')); ?>"></script>
    <script src="../js/modernizr.js?v=1.4.16-1"></script>
    
    <link rel="stylesheet" href="<?php echo e(asset('lte/dist/js/sweetalert/sweetalert2.min.css')); ?>">
  </head>
  <body class="hold-transition skin-blue layout-boxed sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <?php echo $__env->make('298338.parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </header>
      <aside class="main-sidebar">
        <?php echo $__env->make('298338.parts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </aside>
      <div class="content-wrapper">
          <section class="content">
              <?php echo $__env->yieldContent('content'); ?>
          </section>
      </div>
      <footer class="main-footer">
        <?php echo $__env->make('298338.parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </footer>
      <div class="control-sidebar-bg"></div>
    </div>
  </body>
  <!-- Summernote -->
  <script src="<?php echo e(asset('lte/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lte/plugins/summernote/summernote-cleaner.js')); ?>"></script>
  <script src="<?php echo e(asset('lte/plugins/toast/toastr.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('global.js')); ?>"></script>
  <?php echo $__env->yieldContent('scripts'); ?>
</html><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/298338/layouts/app.blade.php ENDPATH**/ ?>