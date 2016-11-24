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
    <?php echo $__env->make('Common.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3>用户信息</h3>
                <table class="table table-hover">
                    <tr>
                        <th>用户</th>
                        <th>密码</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($userInfoes as $user): ?>
                        <tr>
                            <td><?php echo e($user->username); ?></td>
                            <td><?php echo e($user->password); ?></td>
                            <td><?php echo e(date("Y-m-d H:i:s",$user->created_at)); ?></td>
                            <td><?php echo e(date("Y-m-d H:i:s",$user->updated_at)); ?></td>
                            <td>
                                <a href="<?php echo e(url('Login/isSureStatus',['id'=>$user->id])); ?>" onclick="return is_logout()">
                                    <?php if($user['status'] == 1): ?>
                                        禁止使用
                                    <?php else: ?>
                                        启动使用
                                    <?php endif; ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="pull-right">
                    <?php echo e($userInfoes->render()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Common.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>