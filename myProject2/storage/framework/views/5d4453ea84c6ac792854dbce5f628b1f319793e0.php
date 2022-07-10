<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/css.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/checkbox.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/header.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/css/font-awesome.min.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        
<!--*************************************************************************-->
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
        <div class="topnav navbar-fixed-top" id="myTopnav">
          <a href="/" ><i class="fa fa-fw fa-home"></i></a>
          <a id="notifications" href="requests" class="active"><i class="fa fa-fw fa-bell"></i><sup class="badge"><?php echo e(app('nots')); ?></sup>
              Notifications
          </a>
          <?php if(auth()->guard()->check()): ?>
          <a href="<?php echo e(url('logout')); ?>"><i class="fa fa-fw fa-power-off"></i> U-Logout</a>
          <?php endif; ?>
          <?php if(auth()->guard('webAdmin')->check()): ?>
          <a href="<?php echo e(url('logout/admin')); ?>"><i class="fa fa-fw fa-power-off"></i> A-Logout</a>
          <?php endif; ?>
          <?php if(auth()->guard('webDoctor')->check()): ?>
          <a href="<?php echo e(url('logout/doctor')); ?>"><i class="fa fa-fw fa-power-off"></i> D-logout</a>
          <?php endif; ?>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
        <script src="<?php echo e(asset('js/header.js')); ?>"></script>
<!--*************************************************************************-->

        <?php echo $__env->yieldContent('content'); ?>
        <!-- Start Scroll To Top-->
        <div id="scroll-top" class="fa fa-chevron-up"></div>
    <!-- End Scroll To Top-->
    <div title="Dashboard" class="thenav visible-xs-block fa fa-caret-right"></div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/actions.js')); ?>"></script>
    <script src="<?php echo e(asset('js/header.js')); ?>"></script>
    <script src="<?php echo e(asset('js/notifications.js')); ?>"></script>
    <script src="<?php echo e(asset('js/js.js')); ?>"></script>
    <script src="<?php echo e(asset('js/tables_ajax.js')); ?>"></script>
</body>
</html>
