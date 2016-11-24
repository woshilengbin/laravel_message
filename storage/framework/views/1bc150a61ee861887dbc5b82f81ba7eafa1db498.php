<?php $__env->startSection('header'); ?>
    <li><a href="<?php echo e(url('Message/index')); ?>">首页</a></li>
    <?php if(session('user')): ?>
        <li><a href="<?php echo e(url('Login/userInfo')); ?>">个人中心</a></li>
        <?php if(session('user.is_root') ==1): ?>
            <li><a href="<?php echo e(url('Login/userManagement')); ?>">用户管理</a></li>
            <li><a href="<?php echo e(url('Login/messageManagement')); ?>">留言管理</a></li>
        <?php endif; ?>
        <li><a href="<?php echo e(url('Login/logout')); ?>" onclick="return is_logout()">退出</a></li>
    <?php else: ?>
        <li><a href="<?php echo e(url('Login/login')); ?>">登陆</a></li>
        <li><a href="<?php echo e(url('Login/registered')); ?>">注册</a></li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>我的信息</h3>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>用户名</th>
                        <th><?php echo e(session('user.username')); ?>

                            <?php if(session('user.is_root') ==1): ?>
                               <small>超级管理员</small>
                            <?php endif; ?>
                        </th>
                    </tr>
                    <tr>
                        <td>密码</td>
                        <td><?php echo e(session('user.password')); ?></td>
                    </tr>
                    <tr>
                        <td>创建时间</td>
                        <td><?php echo e(date("Y-m-d H:i:s",session('user.created_at'))); ?></td>
                    </tr>
                    <tr>
                        <td>修改时间</td>
                        <td><?php echo e(date("Y-m-d H:i:s",session('user.updated_at'))); ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-8 col-md-offset-1">
                <h3>我的留言</h3>
                <br>
                <?php foreach($userMessage as $message): ?>
                    <p style="text-indent: 50px"><?php echo e($message->message); ?></p>
                    <p class="pull-right"><?php echo e(date("Y-m-d H:i:s",$message->created_at)); ?></p>
                    <hr>
                <?php endforeach; ?>
                <div class="pull-right">
                    <?php echo e($userMessage->render()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Common.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>