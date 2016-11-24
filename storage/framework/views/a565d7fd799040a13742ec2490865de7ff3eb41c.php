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
<?php foreach($messageList as $message): ?>
    <p><?php echo e($message->username); ?>:</p>
    <p style="text-indent: 50px"><?php echo e($message->message); ?></p>
    <div class="pull-right">
        <a href="<?php echo e(url('Login/messageStatus',['id'=>$message->id])); ?>" onclick="return is_logout()">
            <?php if($message['status'] == 1): ?>
                禁用
            <?php else: ?>
                启用
            <?php endif; ?>
        </a>&nbsp;&nbsp;
        <a href="<?php echo e(url('Login/deleteMessage',['id'=>$message->id])); ?>" onclick="return is_logout()">删除</a>&nbsp;&nbsp;
    </div>
    <p class="pull-right"><?php echo e(date("Y-m-d H:i:s",$message->created_at)); ?>&nbsp;&nbsp;&nbsp;</p>
    <hr>
<?php endforeach; ?>
    <div class="pull-right">
        <?php echo e($messageList->render()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Common.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>