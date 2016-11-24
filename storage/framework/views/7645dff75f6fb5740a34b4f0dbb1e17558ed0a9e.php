<?php $__env->startSection('header'); ?>
    <li><a href="<?php echo e(url('Message/index')); ?>">首页</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('Common.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('Common.validate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <form class="form-signin"  action="<?php echo e(url('Login/doRegistered')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <h3 class="form-signin-heading">Please registered</h3>
            <div class="form-group">
                <label for="username">请输入用户名</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Email address" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">请输入密码</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="repassword">请再次确认密码</label>
                <input type="password" id="repassword" name="repassword" class="form-control" placeholder="RePassword" required>
            </div>
            <a href="<?php echo e(url('Login/login')); ?>">已有账号，直接登陆</a>
            <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Common.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>