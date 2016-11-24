<?php $__env->startSection('css'); ?>
    <style>
        .del{
            display: none;
        }
        #message_div:hover .del{
            display: block;
            cursor: pointer;
        }
    </style>
<?php $__env->stopSection(); ?>
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
<?php echo $__env->make('Common.validate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<form action="<?php echo e(url('Message/addMessage')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="message">发表你的留言</label>
        <textarea class="form-control" id="message" name="message[message]" rows="1"></textarea>
    </div>
    <input type="hidden" name="message[user_id]" value="<?php echo e(session('user.id')); ?>">
    <span class="pull-right">
        <span id="word_limit" class="hide">0/140
        <button id="button" type="submit" class="btn btn-success btn-md" disabled>发表</button>
        </span>
    </span>
</form>
<br>
<hr>
<?php foreach($messages as $message): ?>
    <div id="message_div">
        <a class="del pull-right" onclick="hideMessage(this)">隐藏</a>
        <h5><?php echo e($message->username); ?>：<small>第<?php echo e($message->id); ?>楼</small></h5>
        <p style="text-indent: 50px"><?php echo e($message->message); ?></p>
        <a href=""><span class="glyphicon glyphicon-thumbs-up"></span></a>
        <a href=""><span class="glyphicon glyphicon-thumbs-down"></span></a>
        <div class="reply_message">
            <textarea name="reply_message" class="form-control" rows="1" placeholder="我也说一句！"></textarea>
            <br>
            <span class="pull-right hide">
                <span  class="word_limit_reply_message ">0/140
                </span>
                <button type="submit" class="btn btn-success btn-md button_reply " disabled>回复</button>
            </span>
        </div>
        <p style="margin-left: 15px"><?php echo e(date("Y-m-d H:i:s",$message->created_at)); ?></p>
        <hr>
    </div>
<?php endforeach; ?>
<?php /*//分页*/ ?>
    <div class="pull-right">
        <?php echo e($messages->render()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script  language="javascript">
        var message = $("#message");
        var timer;
        message.focus(function () {
            message.attr("rows","3");
            $("#word_limit").removeClass("hide");
        });
        message.keyup(function () {
            var word_len = message.val().length;
            if(word_len == 0 || word_len>10){
                $("#button").attr({"disabled":"disabled"});
            }else{
                $("#button").removeAttr('disabled');
                $("#word_limit").html(word_len+'/140');
            }
        });
        message.blur(function () {
            if(message.val() == ''){
                timer = setTimeout(function () {
                    message.attr("rows", "1");
                    $("#word_limit").addClass("hide");
                },100);
            }
        });
        var reply_messages = $(".reply_message");
        reply_messages.each(function (i) {
            var textarea = $(this).find("textarea[name=reply_message]");
            textarea.focus(function () {
               $(this).attr("rows","3");
               $(this).next().next().removeClass("hide");
           });
            textarea.blur(function () {
               if( $(this).val() == ''){
                   $(this).attr("rows", "1");
                   $(this).next().next().addClass("hide");
               }
           });
            textarea.keyup(function () {
                var word_len = textarea.val().length;
                if(word_len == 0 || word_len>10){
                    $(this).next().next().children(".button_reply").attr({"disabled":"disabled"});
                }else{
                    $(this).next().next().children(".button_reply").removeAttr('disabled');
                    $(this).next().next().children('.word_limit_reply_message').html(word_len+'/140');
                }
            })
        });
        function hideMessage(node) {
            $(node).parent().hide();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Common.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>