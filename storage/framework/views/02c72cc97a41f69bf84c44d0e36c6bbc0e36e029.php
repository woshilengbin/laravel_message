
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Static Top Navbar Example for Bootstrap@yield('title')</title>
    <link href="<?php echo e(asset('static/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('static/layout/css/layout.css')); ?>" rel="stylesheet">
    <?php $__env->startSection('css'); ?>
    <?php echo $__env->yieldSection(); ?>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php $__env->startSection('header'); ?>
                    <li><a href="<?php echo e(url('Message/index')); ?>">首页</a></li>
                    <li><a href="<?php echo e(url('Login/login')); ?>">登陆</a></li>
                    <li><a href="<?php echo e(url('Login/registered')); ?>">注册</a></li>
                <?php echo $__env->yieldSection(); ?>
            </ul>
        </div>
    </div>
</nav>


<div class="content">
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php $__env->startSection('footer'); ?>
                    <span>Copyright © Leng</span>
                <?php echo $__env->yieldSection(); ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('static/jquery/jquery-3.1.1.js')); ?>"></script>
<script src="<?php echo e(asset('static/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script>
    function is_logout() {
        return  window.confirm('sure？')?true:false;
    }

</script>
<?php $__env->startSection('js'); ?>
<?php echo $__env->yieldSection(); ?>
</body>
</html>
