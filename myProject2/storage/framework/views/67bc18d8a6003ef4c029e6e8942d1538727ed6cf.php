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
<div style="margin-top:70px" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-heading"><?php echo e(session()->get('success')); ?></div>
                <div class="panel-body">
                <form class="form-horizontal" method="POST" action="<?php echo e(url('login/doctor')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a class="btn btn-link" href="<?php echo e(url('register/doctor')); ?>">Register</a>
                                <a class="btn btn-link" href="<?php echo e(url('login/admin')); ?>">Admin</a>
                                <a class="btn btn-link" href="<?php echo e(url('login')); ?>">Student</a>
                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/actions.js')); ?>"></script>
    <script src="<?php echo e(asset('js/header.js')); ?>"></script>
    <script src="<?php echo e(asset('js/notifications.js')); ?>"></script>
    <script src="<?php echo e(asset('js/js.js')); ?>"></script>
  </body>
</html>
