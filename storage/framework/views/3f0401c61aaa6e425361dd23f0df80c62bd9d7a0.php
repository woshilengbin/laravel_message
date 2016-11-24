<?php $__env->startSection('header'); ?>
    <li><a href="<?php echo e(url('Message/index')); ?>">首页</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('Common.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <form class="form-signin"  action="<?php echo e(url('Login/doLogin')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <h3 class="form-signin-heading">Please sign in</h3>
            <div class="form-group">
                <input type="email" name="username" class="form-control" placeholder="Email address" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <a href="<?php echo e(url('Login/registered')); ?>">还没有账号，注册</a>
            <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Common.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>