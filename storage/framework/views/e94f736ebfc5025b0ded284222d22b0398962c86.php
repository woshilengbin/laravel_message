<?php if(Session::has("success")): ?>
<div class="alert alert-success alet-dismissible" role="alert">
    <strong><?php echo e(Session::get('success')); ?></strong>
</div>
<?php endif; ?>
<?php if(Session::has("error")): ?>
<div class="alert alert-danger alet-dismissible" role="alert">
    <strong><?php echo e(Session::get('error')); ?></strong>
</div>
<?php endif; ?>